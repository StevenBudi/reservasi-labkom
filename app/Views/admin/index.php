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

    <h2>Managemen Fasilitas Laboratorium</h2>
    <div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Software Engineering</td>
                    <td><a href="#" class="btn" id="facility-button-1" data-target="facility-modal" data-toggle="modal">Edit</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Multimedia Studio</td>
                    <td><a href="#" class="btn" id="facility-button-2" data-target="facility-modal" data-toggle="modal">Edit</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Computer Network and Instrumentation</td>
                    <td><a href="#" class="btn" id="facility-button-3" data-target="facility-modal" data-toggle="modal">Edit</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div id="facility-edit" style="display: hidden;"></div>
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