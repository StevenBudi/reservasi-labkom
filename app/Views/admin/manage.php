<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>
<h1>User Management</h1>
<table class="table" id="user-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Avatar</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $no = 1;
            foreach ($list as $item) {
                ?>
                <tr>
                    <td><?= $no?></td>
                    <td><img src="/images/avatar/<?= $item['avatar']?>" alt="profil" width="100px"></td>
                    <td><?= $item['nama']?></td>
                    <td>
                        <a href="/user/<?= $item['id']?>" class="btn btn-primary"><i class="fas fa-pencil-alt" ></i></a>
                        <a href="/user/delete/<?= $item['id']?>" onclick="deleteReser(<?= $item['id'] ?>)" class="btn btn-danger"><i class="fa fa-times" ></i></a>
                    </td>
                </tr>
                <?php
                $no++;
            }
        
        ?>
    </tbody>
</table>
<script>
    $(document).ready(() => {
        $("#user-table").DataTable();
    })

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
</script>
<?= $this->endSection() ?>