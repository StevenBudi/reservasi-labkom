<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>
<div id="labkom-data"></div>


<?php
if (isset($_COOKIE['logged_in'])) {
?>

    <a href="#" class="btn <?= isset($_COOKIE['verif']) && $_COOKIE['verif'] == 1 ? "btn-outline-success mb-2" : "disabled" ?>" id="reser-button" data-target="reservation-modal" data-toggle="modal">Pesan Labkom</a>
    <div id="reser-data" style="display: none;"></div>
    <div id="reser-update" style="display: none;"></div>
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