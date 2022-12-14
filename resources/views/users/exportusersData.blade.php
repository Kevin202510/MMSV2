
    <table class="table table-striped">
        <thead>
            <tr>
                <th>fname</th>
                <th>mname</th>
                <th>lname</th>
                <th>address</th>
                <th>contact</th>
                <th>username</th>
                <th>isApproved</th>
            </tr>
        </thead>
        <tbody id="table-main">
        @foreach($users as $users)
            <tr>
            <td>{{$users->fname}}</td>
            <td>{{$users->mname}}</td>
            <td>{{$users->lname}}</td>
            <td>{{$users->address}}</td>
            <td>{{$users->contact}}</td>
            <td>{{$users->username}}</td>
            <td>{{$users->isApproved}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

