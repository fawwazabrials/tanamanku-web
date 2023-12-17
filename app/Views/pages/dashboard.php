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
      <div class="flex-1 flex gap-2 flex-col bg-gray-300 rounded-lg shadow-lg p-5">
        <h1 class="text-xl font-bold">Latest Request</h1>
        <div class="flex grow items-center justify-center">
          No Data
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>