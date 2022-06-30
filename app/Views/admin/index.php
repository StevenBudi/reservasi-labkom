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

<div class="row">
  <div class="col-sm-6">
    <div class="card bg-info text-white">
      <div class="card-body">
        <h5 class="card-title">Software Engineering</h5>
        <p class="card-text">Ini adalah ruangan Software Engineering</p>
        <button class="btn btn-outline-dark btn-circle" id="facility-button-1" data-target="facility-modal" data-toggle="modal" ><i class="fas fa-pencil-alt" ></i></button>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card bg-success text-white">
     <div class="card-body">
        <h5 class="card-title">Multimedia Studio</h5>
        <p class="card-text">Ini adalah Multimedia Studio</p>
        <button class="btn btn-outline-dark btn-circle" id="facility-button-2" data-target="facility-modal" data-toggle="modal" ><i class="fas fa-pencil-alt" ></i></button>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="card bg-danger text-white">
      <div class="card-body">
        <h5 class="card-title">Computer Network and Instrumentation</h5>
        <p class="card-text">Ini adalah ruangan Computer Network and Instrumentation.</p>
        <button class="btn btn-outline-dark btn-circle " id="facility-button-3" data-target="facility-modal" data-toggle="modal" ><i class="fas fa-pencil-alt" ></i></button>
      </div>
    </div>
  </div>
<div>
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