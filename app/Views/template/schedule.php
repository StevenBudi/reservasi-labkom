<?php
    if(session()->get('status') == 'admin'){
        ?>
        <a href="<?= base_url('/admin/export_schedule')?>" class="btn btn-primary">Download Data</a>
        <?php
    }
?>
<table id="labschedule" class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Peminjam</th>
            <th>Laboratorium</th>
            <th>Waktu Pemakaian</th>
            <?php
            if (session()->get('status') == 'admin') {
            ?>
                <th>Aksi</th>
            <?php
            }
            ?>
        </tr>
    <tbody>
        <?php
        $no = 1;
        foreach ($list as $item) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $item['peminjam'] ?></td>
                <td><?= $item['labkom'] == "rpl" ? "Laboratorium Software Engineering" : ($item['labkom'] == "mulmed" ? "Laboratorium Multimedia Studio" : "Laboratorium Computer Network and Instrumentation") ?></td>
                <td><?= $item['waktu_penggunaan'] . " - " . explode(" ", $item['waktu_akhir_penggunaan'])[1] ?></td>
                <?php
                if (session()->get('status') == 'admin') {
                ?>
                    <td>
                        <button class="btn btn-primary" onclick="updateReser(<?= $item['id'] ?>)" data-toggle="modal" data-target="reservation-update-modal">Edit</button>
                        <button class="btn btn-danger" onclick="deleteReser(<?= $item['id'] ?>)">Delete</button>
                    </td>
                <?php
                }
                ?>
            </tr>
        <?php
        }
        ?>
    </tbody>
    </thead>
</table>

<script>
    function deleteReser(id) {
        $.ajax({
            url: "labkom/delete_reser/".concat(id.toString()),
            dataType: "json",
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success !',
                    text: response.sukses
                });
                jadwalLabkom();
            }
        });
    }

    function updateReser(id) {
        $.ajax({
            url: "labkom/update_reser_modal/".concat(id.toString()),
            success: function(response) {
                $('#reser-update').html(response.data).show();
                $('#reservation-update-modal').modal('show');
            }
        });
    }

    $(document).ready(() => {
        $("#labschedule").DataTable();
    })
</script>