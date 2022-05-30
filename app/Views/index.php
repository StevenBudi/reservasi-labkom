<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>

<h1>Dashboard</h1>
<?php
if (isset($_COOKIE['logged_in'])) {
?>
    <a href="#" class="btn btn-success" id="reser-button" data-target="reservation-modal" data-toggle="modal">Pesan Labkom</a>
    <div id="reser-data" style="display: none;"></div>
    <div id="labkom-data"></div>
<?php
}
?>
<script>
    $('#reser-button').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url('/reservation') ?>",
            // dataType : "json",
            success: function(response) {
                $('#reser-data').html(response.data).show();
                $('#reservation-modal').modal('show');
            }
        })
    })
</script>
<?= $this->endSection() ?>