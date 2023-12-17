<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="<?= base_url() ?>/assets/icon/tabIcon.ico" rel="icon">
    <link href="<?= base_url() ?>/assets/css/styles.css" rel="stylesheet">
</head>

<body>

    <div class="bg-no-repeat bg-cover bg-center relative" style="background-image: url(https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1951&amp;q=80);">
        <div class="absolute bg-gradient-to-b from-green-500 to-green-400 opacity-75 inset-0 z-0"></div>
        <div class="min-h-screen flex justify-center sm:flex-row mx-0 gap-10">
            <div class="hidden lg:flex lg:flex-col self-center xl:justify-center w-full max-w-xl z-10">
                <div class=" flex flex-col text-white">
                    <img src="" class="mb-3">
                    <h1 class="mb-3 font-bold text-5xl">Hi!👋 Welcome Back </h1>
                    <p class="pr-3">Selamat datang kembali di Sistem Monitoring Tanaman Sayuran. Tanaman sehat, hasil melimpah – mari bersama mencapai sukses pertanian! Silakan login untuk akses ke dunia informasi pertanian yang inovatif dan solusi terkini. Bersama-sama, kita tumbuh dan panen kesuksesan!</p>
                </div>
            </div>
            <div class="flex justify-center self-center z-10">
                <div class="p-12 bg-white mx-auto rounded-2xl w-100 ">
                    <div class="mb-4">
                        <h3 class="font-semibold text-2xl text-gray-800">Sign In </h3>
                        <p class="text-gray-500">Please sign in to your Admin account.</p>
                    </div>
                    <div class="space-y-5 mt-5">
                        <!-- show errors -->
                        <?php if (session()->getFlashdata('error')) : ?>
                            <p class="text-red-500 text-xs -mb-5 text-center"><?= session()->getFlashdata('error') ?></p>
                        <?php endif; ?>
                        <form action="/login_action" method="POST" class="flex flex-col gap-3">
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-700 tracking-wide" for="email">Email</label>
                                <input class=" w-full text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="text" placeholder="email@gmail.com" name="email" id="email" required>
                            </div>
                            <div class="space-y-2">
                                <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide" for="password">
                                    Password
                                </label>
                                <input class="w-full content-center text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="password" placeholder="Enter your password" name="password" id="password" required>
                            </div>
                            <div class="mt-10">
                                <button type="submit" class="w-full flex justify-center bg-green-400  hover:bg-green-500 text-gray-100 p-3  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url() ?>/assets/js/main.js"></script>
</body>

</html>