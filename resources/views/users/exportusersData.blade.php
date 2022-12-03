
    <table class="table table-striped">
        <thead>
            <tr>
                <th>role_id</th>
                <th>fname</th>
                <th>mname</th>
                <th>lname</th>
                <th>address</th>
                <th>contact</th>
                <th>isApproved</th>
                <th>username</th>
            </tr>
        </thead>
        <tbody id="table-main">
        @foreach($users as $users)
            <tr>
            <td>{{$users->role_id}}</td>
            <td>{{$users->fname}}</td>
            <td>{{$users->mname}}</td>
            <td>{{$users->lname}}</td>
            <td>{{$users->address}}</td>
            <td>{{$users->contact}}</td>
            <td>{{$users->isApproved}}</td>
            <td>{{$users->username}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

