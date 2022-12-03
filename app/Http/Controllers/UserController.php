<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Hash, Carbon\Carbon;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users=User::where('role_id' , '!=' , '1')
                    ->whereNull('deleted_at')->get();
        return response()->json($users);
    }

     public function save(Request $request)
    {
        $users=User::create([
          'fname'     => $request->fname,
          'lname'     => $request->lname,
          'address'     => $request->address,
          'contact'     => $request->contact,
          'username'    => $request->username,
          'role_id'  => $request->role_id,
      ]);

    //   dd(response()->json($users));
      return response()->json($users);
    }

    public function updateProfile(Request $request, User $user)
    {

      $profile = $request->file('pfImage');
        $input['pfImage'] = time().'.'.$profile->getClientOriginalExtension();
        $destinationPath = public_path('/profiles');
        $profile->move($destinationPath,$input['pfImage']);


        $updateuserdata = ["fname"=>$request->fname,
        "lname"=>$request->lname,
        "role_id"=>$request->role_id,
        "isApproved"=>$request->isApproved,
        "address"=>$request->address,
        "contact"=>$request->contact,
        "username"=>$request->username,
        "profile"=>$input['pfImage']];
        $user->update($updateuserdata);

        return response()->json($user, 200);
    }

    public function export()
    {
        $users = $users=User::where('role_id' , '!=' , '1')->get();
        return Excel::download(new UsersExport($users),'users.csv');
    }

    public function upload(Request $request)
    {

      // $validation = Validator::make($request->all(),[
      //   'upload-usersdata' =>'required|file|csv'
      // ]);
        //get file
        $upload=$request->file('upload_usersdata');
        $filePath=$upload->getRealPath();
        //open and read
        $file=fopen($filePath, 'r');

        $header= fgetcsv($file);

        // dd($header);
        $escapedHeader=[];
        //validate
        foreach ($header as $key => $value) {
            $lheader=$value;
            $escapedItem=preg_replace('/[^a-zA-Z0-9_]/', '', $lheader);
            array_push($escapedHeader, $escapedItem);
        }

        //looping through othe columns
        while($columns=fgetcsv($file))
        {
            if($columns[0]=="")
            {
                continue;
            }

           $data= array_combine($escapedHeader, $columns);

           // Table update
        //    $role_id=$data['role_id'];
           $fname=$data['fname'];
           $lname=$data['lname'];
           $address=$data['address'];
           $contact=$data['contact'];
           $username=$data['username'];
           $isApproved=$data['isApproved'];

           $users=User::create([
            // 'role_id'     => $role_id,
            'fname'     => $fname,
            'lname'     => $lname,
            'address'     => $address,
            'contact'     => $contact,
            'username'    => $username,
            'isApproved' => $isApproved,
          ]);

        }

        return response()->json($users);
    }

    public function list()
  { 
    $roles= Roles::where('display_name','!=', 'Developer')
                  ->whereNull('deleted_at')
                    ->orderby('id', 'desc')
                    ->get();
    return response()->json($roles);
  }

    public function update(Request $request, User $user)
    {
        $updateuserdata = ["fname"=>$request->fname,
        "lname"=>$request->lname,
        "role_id"=>$request->role_id,
        "address"=>$request->address,
        "contact"=>$request->contact,
        "username"=>$request->username,
        "password"=> Hash::make($request->password),];
        $user->update($updateuserdata);
        return response()->json($user, 200);
    }

    public function updatePassword(Request $request, User $user)
    {
        $user->password = Hash::make($request->password);
        $user->update();
        return response()->json($user, 200);
    }

    public function makeHashPass(Request $request){
      if (Hash::check($request->currentpassword, $request->password)) {
          return true;
      }else{
        return "0";
      }

    }

    public function updatestatus(Request $request,User $user)
    {
        $user->isApproved = $request->isApproved;
        $user->update();
        return response()->json(array('success'=>true));
    }

    public function updatestatusDisapproved(Request $request,User $user)
    {
        $user->isApproved = $request->isApproved;
        $user->deleted_at = $request->isApproved;
        $user->update();
        return response()->json(array('success'=>true));
    }


    public function destroy(User $user)
    {
        $user->deleted_at = Carbon::now();
        $user->update();
        return response()->json(array('success'=>true));
    }
}
