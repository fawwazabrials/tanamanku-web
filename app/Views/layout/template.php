<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link href="<?= base_url() ?>/assets/icon/tabIcon.ico" rel="icon">
    <link href="<?= base_url() ?>/assets/css/styles.css" rel="stylesheet">
</head>

<body>

    <div class="flex">
        <?= $this->include('layout/sidebar') ?>
        <div class="w-full h-screen overflow-x-hidden bg-gray-100 overflow-y-scroll">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <script src="<?= base_url() ?>/assets/js/main.js"></script>

</body>

</html>