<div class="bg-white shadow rounded-lg p-4 sm:p-6">
  <div class="grid justify-items-center">
    <h3 class="text-xl leading-none font-bold text-gray-900">Number of Incidents Reported this week</h3>
    <p class="align-middle text-sm font-normal whitespace-nowrap text-blue-400">Incidents Reported Per Department</p>
    <a class="align-middle text-sm font-normal whitespace-nowrap text-blue-400 hover:text-blue-600 mb-4" href="{{ route('download.pdf.reports') }}">Generate PDF</a>
  </div>
  <div class="rounded p-2 bg-slate-100 overflow-hidden">
    <canvas class="p-4" id="chartBar"></canvas>
  </div>
</div>
  
  <!-- Required chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Chart bar -->
  <script>
    const labelsBarChart = <?php echo '["' . implode('", "', $departments->toArray()) . '"]' ?>;
    const dataBarChart = {
      labels: labelsBarChart,
      datasets: [
        {
          label: "Nuumber of Reports",
          backgroundColor: "hsl(252, 82.9%, 67.8%)",
          borderColor: "hsl(252, 82.9%, 67.8%)",
          data:  <?php echo '["' . implode('", "', $count) . '"]' ?>,
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