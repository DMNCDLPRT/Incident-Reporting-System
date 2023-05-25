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
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 20px;
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
        <div>
          <p>logo</p>
          {{-- <img src="{{ $imageSrc }}" alt="Logo 1" class="logo"> --}}
        </div>
        <div class="center-content">
          <h4 class="">Republic of The Philippines</h4>
          <h4 class="">Provicen of Bukidnon</h4>
          <h4 class="">Minicipality of Don Carlos</h4>
          <h4 class="bold">Municipal Disaster Risk Reduction Management Council Office</h4>
          <hr>
        </div>
        <div>
          <p>logo</p>
          {{-- <img src="src="{{ $imageSrc }}"" alt="Logo 2" class="logo"> --}}
        </div>
      </header>
      <main>
          <div class="from">
            <p>&nbsp;&nbsp;&nbsp;&nbsp;This crime report is based on the data collected by the Ubiquitous Incident Reporting System (UIRS). The data is used to identify patterns and trends in criminal activity, which can help law enforcement agencies to allocate resources more effectively and prevent future crimes. The UIRS system is essential in crime prevention and investigation, providing timely and accurate data to support law enforcement efforts.</p>
              <small class="pdf-fr">from: Incident Reporting System </small>
              </div>
        <table id="department" style="padding-top: 10px">
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