<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>
<?php
    if(session()->get('status') == "admin"){
        ?>
        <h1>Admin</h1>
        <?php
    }else{
        ?>
        <script>
            alert("403");
            window.location.href = "/";
        </script>
        <?php
    }
?>
<?= $this->endSection() ?>