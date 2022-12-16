<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Temperature Monitoring Report</title>

  </head>
  <body>
    <div class="container-fluid" style="background-color:#025aa5;">
        <div class="card">
        <div class="card-header">
            <center>
                <h5 class="card-title" style="color:white;">Temperature Monitoring Report</h5>
            </center>
        </div>
            <div class="card-body">
                <table  class="table table-success table-striped-columns">
                    <thead>
                        <tr>
                            <th>Temperature</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody id="table-main">
                        @foreach($temperature as $temp)
                            <tr>
                                <td>{{$temp->temperature}}</td>
                                <td>{{$temp->statusName}}</td>
                                <td>{{$temp->date}}</td>
                                <td>{{$temp->time}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p style="float:right;">
                    Mushroom Monitoring System
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>