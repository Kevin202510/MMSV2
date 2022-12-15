<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\Humidity;
use App\Temperature;
use App\Models\Carbondioxide;
use App\Models\Lights;
use PDF;

class GlobalController extends Controller
{
    public function generateAllReports(Request $request){
        $datefrom = date('Y-m-d H:i:s',(strtotime ( '-1 day' , strtotime ( $request->datef) ) ));
        $dateto = date('Y-m-d H:i:s', strtotime($request->datet . ' +1 day'));
        $temperature=Temperature::whereBetween('created_at',[$datefrom,$dateto])->orderBy('created_at', 'ASC')->get();
        $humidity=Humidity::whereBetween('created_at',[$datefrom,$dateto])->orderBy('created_at', 'ASC')->get();
        $carbondioxide=Carbondioxide::whereBetween('created_at',[$datefrom,$dateto])->orderBy('created_at', 'ASC')->get();
        $lights=Lights::whereBetween('created_at',[$datefrom,$dateto])->orderBy('created_at', 'ASC')->get();
        $temperaturedata = PDF::loadView('SystemConfiguration.generateAllReport',compact('temperature','humidity','carbondioxide','lights'));
        return $temperaturedata->download('GeneratedMonitoringReport.pdf');
        // return view('SystemConfiguration.generateAllReport');
    }

    public function resetDB(){
        $exitCode = Artisan::call('migrate:fresh', [
            '--force' => true,
        ]);
  
        $exitCode1 = Artisan::call('db:seed', [
          '--force' => true,
        ]);
        
        return response()->json(array('success'=>true));
    }

    public function our_backup_database(){

        //ENTER THE RELEVANT INFO BELOW
        $mysqlHostName      = env('DB_HOST');
        $mysqlUserName      = env('DB_USERNAME');
        $mysqlPassword      = env('DB_PASSWORD');
        $DbName             = env('DB_DATABASE');
        $backup_name        = "mybackup.sql";
        $portnum = "6183";
        $tables             = array("roles","users","temperatures","humidities","carbondioxides","lights","notifications","sensorsconfigurations"); //here your tables...

        $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword",array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();


        $output = '';
        foreach($tables as $table)
        {
         $show_table_query = "SHOW CREATE TABLE " . $table . "";
         $statement = $connect->prepare($show_table_query);
         $statement->execute();
         $show_table_result = $statement->fetchAll();

         foreach($show_table_result as $show_table_row)
         {
          $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
         }
         $select_query = "SELECT * FROM " . $table . "";
         $statement = $connect->prepare($select_query);
         $statement->execute();
         $total_row = $statement->rowCount();

         for($count=0; $count<$total_row; $count++)
         {
          $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
          $table_column_array = array_keys($single_result);
          $table_value_array = array_values($single_result);
          $output .= "\nINSERT INTO $table (";
          $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
          $output .= "'" . implode("','", $table_value_array) . "');\n";
         }
        }
        $file_name = 'mms_db_backup' . date('y-m-d') . '.sql';
        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/sql');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        unlink($file_name);
        
        return download($file_name);
   

    }
}
