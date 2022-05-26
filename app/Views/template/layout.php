<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Labkom</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <link rel="stylesheet" href="<?=base_url('md5/css/mdb.min.css')?>" />
    <link rel="stylesheet" href="<?=base_url('md5/css/admin.css')?>" />
    <link href="<?= base_url('datatables/datatables.min.css'); ?>" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <?= $this->include('template/sidebar.php')?>
        <?= $this->include('template/navbar.php')?>
    </header>

    <main style="margin-top: 58px">
        <div class="container pt-4">
            <?= $this->renderSection('content')?>
            <div class="viewmodal" style="display: none;"></div>
        </div>
    </main>
    <script src="<?= base_url('md5/js/mdb.min.js'); ?>" crossorigin="anonymous"></script>
    <script src="<?= base_url('md5/js/admin.js'); ?>" crossorigin="anonymous"></script>
    <script src="<?= base_url('datatables/datatables.min.js'); ?>"></script>
</body>

</html>