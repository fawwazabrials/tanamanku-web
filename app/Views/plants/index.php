<?= $this->extend('layout/template') ?>


<?= $this->section('content') ?>

<div class="flex flex-col p-10 gap-8">
  <h1 class="text-2xl md:text-4xl font-bold">Plants List</h1>
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <?php if (session()->getFlashdata('message')) : ?>
        <div class="bg-green-500 text-white p-3 rounded-lg mb-3" role="alert">
          <?= session()->getFlashdata('message') ?>
        </div>
      <?php endif; ?>
      <div class="border rounded-lg divide-y divide-gray-200 ">
        <div class="py-3 px-4 flex justify-between">
          <div class="relative flex items-center max-w-xs h-auto">
            <label class="sr-only">Search</label>
            <input type="text" name="hs-table-with-pagination-search" id="hs-table-with-pagination-search" class="py-2 px-3 ps-9 block w-full border border-gray-300 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none " placeholder="Search for items" oninput="searchPlants()" />
            <div class="absolute top-0 bottom-0 start-0 flex items-center pointer-events-none ps-3">
              <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.3-4.3" />
              </svg>
            </div>
          </div>
          <div class="">
            <a href="/plant/create" class="btn btn-primary text-white">
              Add Plants
            </a>
          </div>
        </div>
        <div class="overflow-hidden">
          <table class="min-w-full divide-y divide-gray-200 " id="plantsTable">
            <thead class="bg-gray-50 ">
              <tr>
                <th scope="col" class="px-6 py-3 text-center font-bold text-gray-500 uppercase border w-2">
                  No
                </th>
                <th scope="col" class="px-6 py-3 font-bold text-start text-gray-500 uppercase border">
                  Name
                </th>
                <th scope="col" class="px-6 py-3 text-center font-bold text-gray-500 uppercase border w-10">
                  Action
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 ">
              <?php
              $i = 1;
              foreach ($plants as $plant) : ?>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap border text-sm font-medium text-gray-800 text-center">
                    <?= $i++ ?>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap border text-sm text-gray-800">
                    <?= $plant['namaTanaman'] ?>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap border text-center text-sm font-medium">
                    <!-- detail -->
                    <a class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-green-500 hover:bg-gray-900/10 active:bg-gray-900/20  " type="button" href="/plants/<?= $plant['id'] ?>">
                      <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                      </span>
                    </a>
                    <!-- edit -->
                    <a class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-blue-500 hover:bg-gray-900/10 active:bg-gray-900/20  " type="button" href="/plant/edit/<?= $plant['id'] ?>">
                      <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-4 w-4">
                          <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                        </svg>
                      </span>
                    </a>
                    <!-- delete -->
                    <form action="/plant/delete/<?= $plant['id'] ?>" method="POST" class="inline-block">
                      <?= csrf_field() ?>
                      <!-- Add a hidden input field to simulate the DELETE method - METHOD SPOOFING -->
                      <input type="hidden" name="_method" value="DELETE">
                      <button onclick="return confirm('Apakah anda yakin?')" class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-red-500 hover:bg-gray-900/10 active:bg-gray-900/20  " type="submit">
                        <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                          </svg>
                        </span>
                      </button>
                    </form>

                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>