<?= $this->extend("layout/template") ?>


<?= $this->section("content") ?>

<script src="/assets/js/Chart.bundle.min.js"></script>

<div class="p-10 h-full flex flex-col gap-5 overflow-y-scroll">
  <h1 class="text-2xl md:text-4xl font-bold gap-3">Dashboard</h1>
  <!-- row 1 -->
  <div class="flex flex-1 flex-row gap-5">
    <!-- grafik count Quality -->
    <div class=" bg-gray-300 rounded-lg shadow-lg p-5 w-3/4">
      <h1 class="text-xl font-bold">Grafik Quality</h1>
      <canvas id="qualityChart" class="h-full w-full" style="height: 100%; width: 100%;"></canvas>
      <?php
      $qualityPlant = "";
      $countPlant = "";

      foreach ($qualityCount as $row) :
        $qty = esc($row["quality"]);
        $qualityPlant .= "'$qty'" . ",";

        $cnt = esc($row["qualityCount"]);
        $countPlant .= "'$cnt'" . ",";
      endforeach;
      ?>

      <script>
        var ctx = document.getElementById('qualityChart').getContext('2d');
        var chart = new Chart(ctx, {
          type: 'bar',
          responsive: true,
          data: {
            labels: [<?= $qualityPlant ?>],
            datasets: [{
              label: 'Kualitas Tanaman',
              backgroundColor: ['rgb(255,99,132)', 'rgb(14,99,132)'],
              borderColor: ['rgb(255,991,130)'],
              data: [<?= $countPlant ?>]
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            },
            animation: {
              duration: 1000
            }
          }
        });
        // set height and width of chart fit to parent
      </script>
    </div>
    <!-- Top Three Penjualan -->
    <div class=" flex gap-2 flex-col bg-gray-300 rounded-lg shadow-lg p-5 w-1/4">
      <h1 class="text-xl font-bold">Top 3 Penjualan</h1>
      <div class="flex grow items-center justify-center">
        No Data
      </div>
    </div>
  </div>
  <!-- row 2 -->
  <div class="flex flex-1 flex-row gap-5">
    <!-- grafik count Status chart -->
    <div class=" bg-gray-300 rounded-lg shadow-lg p-5 w-3/4">
      <h1 class="text-xl font-bold">Grafik Status Requests</h1>
      <canvas id="statusChart" class="h-full w-full flex items-stretch justify-stretch" style="height: 100%; width: 100%;"></canvas>
      <?php
      $statusPlant = "";
      $countStatusPlant = "";

      foreach ($requestsCount as $row) :
        $sts = esc($row["status"]);
        $statusPlant .= "'$sts'" . ",";

        $cntStatus = esc($row["statusCount"]);
        $countStatusPlant .= "'$cntStatus'" . ",";
      endforeach;
      ?>

      <script>
        var ctx = document.getElementById('statusChart').getContext('2d');
        var chart = new Chart(ctx, {
          type: 'bar',
          responsive: true,
          data: {
            labels: [<?= $statusPlant ?>],
            datasets: [{
              label: 'Status Request Tanaman',
              backgroundColor: ['rgb(255,99,132)', 'rgb(14,99,132)'],
              borderColor: ['rgb(255,991,130)'],
              data: [<?= $countStatusPlant ?>]
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            },
            animation: {
              duration: 1000
            }
          }
        });
        // set height and width of chart fit to parent
      </script>
    </div>
    <!-- Latest Request -->
    <div class="flex gap-1 flex-col bg-gray-300 rounded-lg shadow-lg p-5 w-1/4 overflow-x-scroll">
      <h1 class="text-xl font-bold">Latest Request</h1>
      <div class="flex flex-col gap-3 mt-5 <?= $newestPendingRequests == null ? 'justify-center' : '' ?>">
        <?php if ($newestPendingRequests == null) : ?>
          <p class="text-center">No Data</p>
        <?php endif; ?>
        <?php foreach ($newestPendingRequests as $request) : ?>
          <?php
          $timestamp = strtotime($request['created_at']);
          $formattedDate = date('d-m-Y', $timestamp);
          $formattedTime = date('H:i:s', $timestamp);
          ?>
          <div class="flex justify-between items-stretch">
            <div class="flex gap-3 items-center">
              <img src="/img/plants/<?= $request['gambarTanaman'] ?>" alt="admin" class="w-16 h-16 object-cover rounded-lg">
              <div class="flex flex-col">
                <h1 class="font-semibold text-md"><?= $request['namaTanaman'] ?></h1>
                <p class="text-sm flex whitespace-nowrap">Requester: <?= $request['nama_requester'] ?></p>
                <p class="text-sm">Tanggal: <?= $formattedDate ?>, <?= $formattedTime ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>