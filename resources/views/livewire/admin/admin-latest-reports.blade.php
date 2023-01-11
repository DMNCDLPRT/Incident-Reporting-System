<div class="bg-white shadow rounded-lg p-4 sm:p-6">
   <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Reports this week</h3>
   <div class="rounded p-2 shadow-lg overflow-hidden">
      <canvas class="block w-full overflow-x-auto p-2" id="chartBar"></canvas>
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
      const labelsBarChart = [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursdat",
      "Friday",
      "Saturday",
      "Sunday",
      ];
      const dataBarChart = {
         labels: labelsBarChart,
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
      
         const configBarChart = {
         type: "bar",
         data: dataBarChart,
         options: {},
      };
   
      var chartBar = new Chart(
         document.getElementById("chartBar"),
         configBarChart
      );
   </script>
</div>

