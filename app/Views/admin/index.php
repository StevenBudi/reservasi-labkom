<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>
<?php
if (session()->get('status') == "admin") {
?>
<div class="card data shadow ">
    <div class="card-header ">
        <h5 class="text-center"><strong>Data User Menunggu Verifikasi</strong></h5>
    </div>
    <div id="unverif-user"></div>
</div>

<div class="card data shadow">
<div class="card-header ">
        <h5 class="text-center"><strong>Data Member Log</strong></h5>
    </div>
    <div id="member-log"></div>
</div>

<div class="card data shadow">
<div class="card-header ">
        <h5 class="text-center"><strong>Management Data Fasilitas Laboratorium</strong></h5>
    </div>
<div class="row mb-2 mt-2">
    <div class="col-2">
      Laboratorium
    </div>
    <div class="col-8">
    Software Engineering
    </div>
    <div class="col-2">
    <button class="btn btn-outline-success btn-circle" id="facility-button-1" data-target="facility-modal" data-toggle="modal" ><i class="fas fa-pencil-alt" ></i></button>
    </div>
  </div>
<div class="row mb-2 mt-2">
    <div class="col-2">
      Laboratorium
    </div>
    <div class="col-8">
    Multimedia Studio
    </div>
    <div class="col-2">
    <button class="btn btn-outline-success btn-circle" id="facility-button-2" data-target="facility-modal" data-toggle="modal" ><i class="fas fa-pencil-alt" ></i></button>
    </div>
  </div>
<div class="row mb-2 mt-2">
    <div class="col-2">
      Laboratorium
    </div>
    <div class="col-8">
    Computer Network and Instrumentation
    </div>
    <div class="col-2">
    <button class="btn btn-outline-success btn-circle " id="facility-button-3" data-target="facility-modal" data-toggle="modal" ><i class="fas fa-pencil-alt" ></i></button>
    </div>
  </div>
</div>
<div>
       <div id="facility-edit" style="display: hidden;"></div>
</div>
<?php
} else {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "You are not permitted to do this action !",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/";
            }
        });
    </script>
<?php
}
?>
<script>
    function unverifData() {
        $.ajax({
            url: "<?= base_url('/user/not-verif') ?>",
            dataType: "json",
            success: (response) => {
                $('#unverif-user').html(response.data)
            }
        })
    }

    function memberLog() {
        $.ajax({
            url: "<?= base_url('/admin/member_log') ?>",
            dataType: "json",
            success: (response) => {
                $("#member-log").html(response.data)
            }
        })
    }

    $('#facility-button-1').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url("/labkom/update_modal/1") ?>",
            success: function(response) {
                $("#facility-edit").html(response.data).show();
                $('#facility-modal').modal('show');
            }
        })
    });

    $('#facility-button-2').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url("/labkom/update_modal/2") ?>",
            success: function(response) {
                $("#facility-edit").html(response.data).show();
                $('#facility-modal').modal('show');
            }
        })
    });

    $('#facility-button-3').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url("/labkom/update_modal/3") ?>",
            success: function(response) {
                $("#facility-edit").html(response.data).show();
                $('#facility-modal').modal('show');
            }
        })
    });

    $(document).ready(() => {
        unverifData();
        memberLog();
    })
</script>
<?= $this->endSection() ?>