<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reports</title>

    <style>
        
        .header {
            text-align: center;
            margin-bottom: 50px;
        }

        .bold {
            font-weight: bold;
        }

        h4{
            margin: 0px;
            font-weight: normal;
        }

        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        #customers tr:nth-child(even){background-color: #f2f2f2;}
        
        #customers tr:hover {background-color: #ddd;}
        
        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }
        </style>

</head>
<body>
    <header >
        <div class="header">

            <h4 class="">Republic of The Philippines</h4>
            <h4 class="">Provicen of Bukidnon</h4>
            <h4 class="">Minicipality of Don Carlos</h4>
            <br>
            <h4 class="bold">Municipal Disaster Risk Reduction Management Council Office</h4>
            
            <hr>
        </div>
    </header>

    <main>
        <div class="logo">
            <small class="pdf-fr">from: Incident Reporting System<img src="{{ asset('images/report incident.png') }}" class="pdf-img"></small>
            </div>
<table id="customers" style="padding-top: 10px">
  <tr>
    <th>Department</th>
    <th>Number of Reports</th>
  </tr>
  @php($i = 0)
  @foreach ($count as $count)
  <tr>
    <td>{{$departments[$i]}}</td>
    <td>{{ $count }}</td>
  </tr>
  @php($i = $i + 1)
  @endforeach
  
</table>
    </main>
</body>
</html>