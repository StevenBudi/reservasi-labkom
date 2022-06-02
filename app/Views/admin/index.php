<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>
<?php
if (isset($_COOKIE['status']) && $_COOKIE['status'] == "admin") {
?>
    <h1>Admin</h1>
<?php
} else {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "You are not permitted to do this action !",
        }).then((result) => {
            if(result.isConfirmed){
                window.location.href = "/";
            }
        });
    </script>
<?php
}
?>
<?= $this->endSection() ?>