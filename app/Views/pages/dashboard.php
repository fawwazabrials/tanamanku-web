<?= $this->extend("layout/template") ?>


<?= $this->section("content") ?>

<div class="p-10 h-screen flex flex-col gap-10 grow">
  <div class="flex flex-col gap-5 grow h-full">
    <h1 class="text-2xl md:text-4xl font-bold gap-3">Dashboard</h1>
    <!-- row 1 -->
    <div class="flex flex-1 flex-row gap-5">
      <!-- grafik count Quality -->
      <div class="flex-[3] bg-gray-300 rounded-lg shadow-lg p-5">
        <h1 class="text-xl font-bold">Grafik Quality</h1>
        <canvas id="qualityChart"></canvas>
      </div>
      <!-- Top Three Penjualan -->
      <div class="flex-1 flex gap-2 flex-col bg-gray-300 rounded-lg shadow-lg p-5">
        <h1 class="text-xl font-bold">Top 3 Penjualan</h1>
        <div class="flex grow items-center justify-center">
          No Data
        </div>
      </div>
    </div>
    <!-- row 2 -->
    <div class="flex flex-1 flex-row gap-5">
      <!-- grafik count status request -->
      <div class="flex-[3] bg-gray-300 rounded-lg shadow-lg p-5">
        <h1 class="text-xl font-bold">Grafik Status Request</h1>
        <canvas id="statusChart"></canvas>
      </div>
      <!-- Latest Request -->
      <div class="flex-1 flex gap-1 flex-col bg-gray-300 rounded-lg shadow-lg p-5">
        <h1 class="text-xl font-bold">Latest Request</h1>
        <div class="flex flex-col gap-3 mt-5 overflow-x-hidden <?= $newestPendingRequests == null ? 'justify-center' : '' ?>">
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
</div>

<?= $this->endSection() ?>