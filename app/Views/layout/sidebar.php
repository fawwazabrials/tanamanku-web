<nav>

  <!-- Component Start -->
  <div class="flex flex-col items-center w-16 lg:w-40 duration-300 min-h-screen overflow-hidden text-gray-700 bg-gray-100 rounded">
    <div class="flex items-center w-full px-3 mt-3">
      <img src="<?= base_url('assets/icon/tabIcon.ico') ?>" class="w-8 h-8" alt="logo">
      <span class="hidden lg:inline ml-2 text-sm font-bold">Tanamanku</span>
    </div>
    <div class="w-full px-2">
      <div class="flex flex-col items-center w-full mt-3 border-t border-gray-300">
        <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300 <?= current_url(true)->getPath() == '/index.php/' ? 'bg-gray-300 shadow-lg' : '' ?>" href="/">
          <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
          <span class="hidden lg:inline ml-2 text-sm font-medium">Dasboard</span>
        </a>
        <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300 <?= current_url(true)->getPath() == '/index.php/requests' ? 'bg-gray-300 shadow-lg' : '' ?>" href="/requests">
          <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
          </svg>
          <span class="hidden lg:inline ml-2 text-sm font-medium">Requests</span>
        </a>
      </div>
      <div class="flex flex-col items-center w-full mt-2 border-t border-gray-300">
        <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300 <?= current_url(true)->getPath() == '/index.php/plants' ? 'bg-gray-300 shadow-lg' : '' ?>" href="/plants">
          <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
          </svg>
          <span class="hidden lg:inline ml-2 text-sm font-medium">Plants</span>
        </a>
      </div>
    </div>
    <a class="flex items-center justify-center w-full h-16 mt-auto bg-gray-200 hover:bg-gray-300" href="/logout">
      <svg class="w-6 h-6 stroke-current text-gray-600 transform rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 4a6 6 0 100 12 6 6 0 000-12zM4 10a6 6 0 1112 0 6 6 0 01-12 0z" />
        <span class="hidden lg:inline ml-2 text-sm font-medium">Logout</span>
      </svg>
    </a>
  </div>
  <!-- Component End  -->


</nav>