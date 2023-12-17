<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="flex flex-col p-10 gap-8">
  <h1 class="text-2xl md:text-4xl font-bold">Requests List</h1>
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <?php if (session()->getFlashdata('message')) : ?>
        <div class="bg-green-500 text-white p-3 rounded-lg mb-3" role="alert">
          <?= session()->getFlashdata('message') ?>
        </div>
      <?php endif; ?>
      <div class="border rounded-lg divide-y divide-gray-200 ">
        <div class="py-3 px-4 flex justify-between">
          <div class="relative max-w-xs">
            <label class="sr-only">Search</label>
            <input type="text" name="hs-table-with-pagination-search" id="hs-table-with-pagination-search" class="py-2 px-3 ps-9 block w-full border border-gray-300 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none " placeholder="Search for items" oninput="searchRequests()" />
            <div class="absolute top-0 bottom-0 start-0 flex items-center pointer-events-none ps-3">
              <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.3-4.3" />
              </svg>
            </div>
          </div>
        </div>
        <div class="overflow-hidden">
          <table class="min-w-full divide-y divide-gray-200" id="requestsTable">
            <thead class="bg-gray-50 ">
              <tr>
                <th scope="col" class="px-6 py-3 text-center font-bold text-gray-500 uppercase border w-2">
                  No
                </th>
                <th scope="col" class="px-6 py-3 font-bold text-start text-gray-500 uppercase border">
                  Nama Requester
                </th>
                <th scope="col" class="px-6 py-3 font-bold text-start text-gray-500 uppercase border">
                  Nama Tanaman
                </th>
                <th scope="col" class="px-6 py-3 font-bold text-center text-gray-500 uppercase border">
                  Quantity
                </th>
                <th scope="col" class="px-6 py-3 font-bold text-center text-gray-500 uppercase border">
                  Status
                </th>
                <th scope="col" class="px-6 py-3 text-center font-bold text-gray-500 uppercase border w-10">
                  Action
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 ">
              <?php
              $i = 1;
              foreach ($requests as $request) : ?>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 border text-center">
                    <?= $i++ ?>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border">
                    <?= $request['nama_requester'] ?>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border">
                    <?= $request['namaTanaman'] ?>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border text-center">
                    <?= $request['quantity'] ?>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm border text-center
                    <?php $status_style = 'text-red-500' ?>
                    <?php if ($request['status'] == 'pending') : ?>
                      <?php $status_style = 'text-yellow-500 font-bold' ?>
                    <?php elseif ($request['status'] == 'accepted') : ?>
                      <?php $status_style = 'text-green-500' ?>
                    <?php endif; ?>
                    <?= $status_style ?>
                  ">
                    <?= $request['status'] ?>
                  </td>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium">
                    <?php if ($request['status'] == 'pending') : ?>
                      <!-- accept form -->
                      <form action="/requests/accept/<?= $request['id'] ?>" method="POST" class="inline-block">
                        <?= csrf_field() ?>
                        <!-- Add a hidden input field to simulate the PUT method - METHOD SPOOFING -->
                        <input type="hidden" name="_method" value="PUT">
                        <button class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-green-500 hover:bg-gray-900/10 active:bg-gray-900/20" type="submit">
                          <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                            <svg fill="#22C55E" width="22px" height="22px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                              <path d="M351.605 663.268l481.761-481.761c28.677-28.677 75.171-28.677 103.847 0s28.677 75.171 0 103.847L455.452 767.115l.539.539-58.592 58.592c-24.994 24.994-65.516 24.994-90.51 0L85.507 604.864c-28.677-28.677-28.677-75.171 0-103.847s75.171-28.677 103.847 0l162.25 162.25z" />
                            </svg>
                          </span>
                        </button>
                      </form>
                      <!-- reject form -->
                      <form action="/requests/reject/<?= $request['id'] ?>" method="POST" class="inline-block">
                        <?= csrf_field() ?>
                        <!-- Add a hidden input field to simulate the PUT method - METHOD SPOOFING -->
                        <input type="hidden" name="_method" value="PUT">
                        <button class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-red-500 hover:bg-gray-900/10 active:bg-gray-900/20" type="submit">
                          <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                            <svg fill="#EF4444" width="19px" height="19px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                              <path d="M512.481 421.906L850.682 84.621c25.023-24.964 65.545-24.917 90.51.105s24.917 65.545-.105 90.51L603.03 512.377 940.94 850c25.003 24.984 25.017 65.507.033 90.51s-65.507 25.017-90.51.033L512.397 602.764 174.215 940.03c-25.023 24.964-65.545 24.917-90.51-.105s-24.917-65.545.105-90.51l338.038-337.122L84.14 174.872c-25.003-24.984-25.017-65.507-.033-90.51s65.507-25.017 90.51-.033L512.48 421.906z" />
                            </svg>
                          </span>
                        </button>
                      </form>
                    <?php endif; ?>
                    <!-- delete form -->
                    <form action="/requests/delete/<?= $request['id'] ?>" method="POST" class="inline-block">
                      <?= csrf_field() ?>
                      <!-- Add a hidden input field to simulate the DELETE method - METHOD SPOOFING -->
                      <input type="hidden" name="_method" value="DELETE">
                      <button onclick="return confirm('Apakah anda yakin?')" class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-red-500 hover:bg-gray-900/10 active:bg-gray-900/20" type="submit">
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