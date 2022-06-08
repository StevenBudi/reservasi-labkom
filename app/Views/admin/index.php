<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>
<?php
if (session()->get('status') == "admin") {
?>
    <h1>Admin</h1>
    <h2>Data User Menunggu Verifikasi</h2>
    <div id="unverif-user"></div>

    <h2>Member Log</h2>
    <div id="member-log"></div>
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
<script>
    function unverifData(){
        $.ajax({
            url : "<?= base_url('/user/not-verif')?>",
            dataType : "json",
            success : (response) => {
                $('#unverif-user').html(response.data)
            }
        })
    }

    function memberLog(){
        $.ajax({
            url : "<?= base_url('/admin/member_log')?>",
            dataType : "json",
            success : (response) => {
                $("#member-log").html(response.data)
            }
        })
    }

    $(document).ready(() => {
        unverifData();
        memberLog();
    })
</script>
<?= $this->endSection() ?>