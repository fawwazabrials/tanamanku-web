<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="p-10 flex flex-col gap-8">
  <div class="flex gap-8">
    <!-- gambar -->
    <div class="flex-1">
      <img src="/img/plants/<?= $plant['image'] ?>" alt="<?= $plant['namaTanaman'] ?>" class=" rounded-lg shadow-lg object-cover h-[300px] w-full">
    </div>
    <!-- deskripsi -->
    <div class="rounded-lg bg-gray-100 p-5 flex flex-col gap-6 flex-[2] border border-gray-300">
      <div class="flex flex-col gap-3">
        <h1 class="text-3xl font-bold"><?= $plant['namaTanaman'] ?></h1>
        <p class="text-lg"><?= $plant['deskripsi'] ?></p>
      </div>
      <div class="flex flex-col gap-3">
        <h1 class="text-3xl font-bold">Quality</h1>
        <p class="text-lg"><?= $plant['quality'] ?></p>
      </div>
    </div>
  </div>
  <div class="flex gap-8 justify-between">
    <!-- details -->
    <div class="flex-[3] gap-4 flex flex-col rounded-lg bg-gray-100 p-5 border border-gray-300">
      <div class="flex justify-between">
        <p>Last Reading: <?= date('d-m-Y', strtotime($plant['last_reading'])) ?>, <?= date('H:i:s', strtotime($plant['last_reading'])) ?></p>
        <form action="/plant/generateSensorData/<?= $plant['id'] ?>" method="post">
          <?= csrf_field() ?>
          <input type="hidden" name="_method" value="PUT">
          <button type="submit" class="text-sm text-blue-700 hover:underline">
            Generate sensor data
          </button>
        </form>
      </div>
      <div class="grid gap-8 grid-cols-4 justify-between">
        <!-- soil_moisture -->
        <div class="rounded-lg bg-gray-300 p-5 flex flex-col justify-center">
          <img src="/assets/icon/soil.svg" alt="temperature" class="w-14 h-14">
          <div class="">
            <div class="flex justify-between items-center">
              <p class="font-bold text-[40px]">
                <?= $plant['soil_moisture'] ?> %
              </p>
            </div>
            <div class="flex flex-col">
              <h1 class="font-semibold text-xl">Soil Moisture</h1>
              <p>Soil Moisture Content</p>
            </div>
          </div>
        </div>
        <!-- temperature -->
        <div class="rounded-lg bg-gray-300 p-5 flex flex-col justify-center">
          <img src="/assets/icon/temperature.svg" alt="temperature" class="w-14 h-14">
          <div class="">
            <div class="flex justify-between items-center">
              <p class="font-bold text-[40px]">
                <?= $plant['temperature'] ?> &#8451;
              </p>
            </div>
            <div class="flex flex-col">
              <h1 class="font-semibold text-xl">Temperature</h1>
              <p>Air Temperature</p>
            </div>
          </div>
        </div>
        <!-- humidity -->
        <div class="rounded-lg bg-gray-300 p-5 flex flex-col justify-center">
          <img src="/assets/icon/humidity.svg" alt="temperature" class="w-14 h-14">
          <div class="">
            <div class="flex justify-between items-center">
              <p class="font-bold text-[40px]">
                <?= $plant['humidity'] ?> %
              </p>
            </div>
            <div class="flex flex-col">
              <h1 class="font-semibold text-xl">Humidity</h1>
              <p>Amout of Water on Air</p>
            </div>
          </div>
        </div>
        <!-- ph_level -->
        <div class="rounded-lg bg-gray-300 p-5 flex flex-col justify-center">
          <img src="/assets/icon/ph.svg" alt="temperature" class="w-14 h-14">
          <div class="">
            <div class="flex justify-between items-center">
              <p class="font-bold text-[40px]">
                <?= $plant['ph_level'] ?>
              </p>
            </div>
            <div class="flex flex-col">
              <h1 class="font-semibold text-xl">pH Level</h1>
              <p>Water pH Level</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- recently edit -->
    <div class="flex-1 flex flex-col rounded-lg bg-gray-100 p-5 border border-gray-300">
      <h1 class="text-3xl font-bold">Recently Edit</h1>
      <div class="flex flex-col gap-3 mt-5 flex-1 <?= $plantWithEditAndAdmin == null ? 'justify-center' : '' ?>">
        <?php if ($plantWithEditAndAdmin == null) : ?>
          <p class="text-center">No Data</p>
        <?php endif; ?>
        <?php foreach ($plantWithEditAndAdmin as $edit) : ?>
          <?php
          $timestamp = strtotime($edit->editCreatedAt);
          $formattedDate = date('d-m-Y', $timestamp);
          $formattedTime = date('H:i:s', $timestamp);
          ?>
          <div class="flex justify-between items-center">
            <div class="flex gap-3 items-center">
              <img src="/assets/icon/person.svg" alt="admin" class="w-10 h-10">
              <div class="flex flex-col">
                <h1 class="font-semibold text-xl"><?= $edit->adminNama ?></h1>
                <p class="text-sm">Tanggal: <?= $formattedDate ?></p>
                <p class="text-sm">Jam: <?= $formattedTime ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>