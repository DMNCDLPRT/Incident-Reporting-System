<div class="bg-white shadow rounded-lg p-4 sm:p-6">
   <div class="grid justify-items-center">
      <h3 class="text-gray-700 font-bold text-lg">Incidents Reported This Week</h3>
      <p class="align-middle text-sm font-normal whitespace-nowrap text-blue-400 mb-4">Total of reports this week by days</p>
   </div>
   <div class="rounded p-2 bg-slate-100 overflow-hidden shadow-lg ">
      <canvas class="block w-full overflow-x-auto p-2" id="chartLine"></canvas>
   </div>

   <?php
      $monday = $reports['monday'];
      $tuesday = $reports['tuesday'];
      $wednesday = $reports['wednesday'];
      $thursday = $reports['thursday'];
      $friday = $reports['friday'];
      $saturday = $reports['saturday'];
      $sunday = $reports['sunday'];
   ?>
   <!-- Required chart.js -->
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
   <!-- Chart bar -->
   <script>
      const labels = [
         "Monday",
         "Tuesday",
         "Wednesday",
         "Thursdat",
         "Friday",
         "Saturday",
         "Sunday",
      ];
      const data = {
         labels: labels,
         datasets: [
            {
               label: "Incident",
               backgroundColor: "hsl(252, 82.9%, 67.8%)",
               borderColor: "hsl(252, 82.9%, 67.8%)",
               data: [
                  {{ $monday }}, 
                  {{ $tuesday }},
                  {{ $wednesday }},
                  {{ $thursday }},
                  {{ $friday }},
                  {{ $saturday }},
                  {{ $sunday }},
                  ],
            },
         ],
         };
      
         const configLineChart = {
         type: "line",
         data,
         options: {},
      };
   
      var chartLine = new Chart(
         document.getElementById("chartLine"),
         configLineChart
      );
   </script>
</div>

