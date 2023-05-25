<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Reports</title>

      <style>
        body{
            font-size: 12px;
        }
          
          header {
            justify-content: center;
            }
            .logo {
                height: 50px;
                width: 50px;
            }
            .center-content {
                text-align: center;
            }

          .bold {
              font-weight: bold;
          }

          h4{
              margin: 0px;
              font-weight: normal;
          }

          #department {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
          }
          
          #department td, #department th {
            border: 1px solid #ddd;
            padding: 8px;
          }
          
          #department th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
          }

          /* Set the footer position to fixed at the bottom of the page */
        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            padding: 10px;
            text-align: center;
        }
          </style>
  </head>

  <body>
      <header>
          <img src="{{ $imageSrc1 }}" alt="Logo 1" style="float: left; top: 0; width: 50px; height: 50px; margin: 0px;">
          <img src="{{ $imageSrc2 }}" alt="Logo 2" style="float: right; top: 0; height: 15px; width: 25px; padding-right: 60px; margin:0px;">
          <div class="center-content">
            <h4 class="">Republic of The Philippines
            <h4 style="margin-right: 60px;">Provicen of Bukidnon
            <h4 style="margin-right: 25px;">Minicipality of Don Carlos</h4>
            <h4 class="bold" >Municipal Disaster Risk Reduction Management Council Office</h4>
          </div>
          <hr>
      <main>
        <div class="from">
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This crime report is based on the data collected by the Ubiquitous Incident Reporting System (UIRS). The data is used to identify patterns and trends in incidents activity, which can help agencies to allocate resources more effectively and prevent future crimes. The UIRS system is essential in crime prevention and investigation, providing timely and accurate data to support law enforcement efforts.</p>
              <small class="pdf-fr">From: Ubiquitous Incident Reporting System</small>
              <br>
              <small class="pdf-fr">When: Incidnets from {{ $weekStart }} to {{ $endWeek }}</small>
        </div>
        <table id="department" style="padding-top: 10px">
          <tr>
            <th>Incident</th>
            <th>Number of Reports</th>
          </tr>
          @php($i = 0)
          @forelse (array_unique($incident) as $incident)
            <tr>
                <td>{{ $incident[0]->report_name }}</td>
                <td>{{ $count[$i] }}</td>
            </tr>
            @php($i++)
          @endforeach 
          
        </table>
      </main>
      
      <footer>
        <p>&copy; 2023 | Ubiquitous Incident Reporting System</p>
        <p>Generated on: April 25, 2023</p>
      </footer>
  </body>
</html>