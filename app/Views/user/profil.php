<?= $this->extend('/template/layout.php') ?>

<?= $this->section('content') ?>
<?php
// Fetch user data then check if session id match with user id
if (isset($_COOKIE['logged_in']) && $_SESSION['id'] == "") {
} else {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "You are not permitted to do this",
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