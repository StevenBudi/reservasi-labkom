<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>

<h1>Dashboard</h1>
<?php
if (isset($_COOKIE['logged_in'])) {
?>
    <a href="#" class="btn <?= isset($_COOKIE['verif']) && $_COOKIE['verif'] == 1 ? "btn-success" : "disabled" ?>" id="reser-button" data-target="reservation-modal" data-toggle="modal">Pesan Labkom</a>
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

    function jadwalLabkom() {
        $.ajax({
            url: "<?= base_url('/labkom/jadwal') ?>",
            dataType: "json",
            success: (response) => {
                $("#labkom-data").html(response.data)
            }
        })
    }

    $(document).ready(() => {
        jadwalLabkom();
    })
</script>
<?= $this->endSection() ?>