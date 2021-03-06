<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>
<div class="card data shadow ">
    <div class="card-header ">
        <h5 class="text-center"><strong>Managemnent Data User </strong></h5>
    </div>
<table class="table table-striped" id="user-table">
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
                        <a href="/user/<?= $item['id']?>" class="btn btn-outline-success btn-circle"><i class="fas fa-pencil-alt" ></i></a>
                        <button onclick="deleteUser(<?= $item['id'] ?>)" class="btn btn-outline-danger btn-circle"><i class="fa fa-times" ></i></button>
                    </td>
                </tr>
                <?php
                $no++;
            }
        
        ?>
    </tbody>
</table>
       
</div>
<script>
    $(document).ready(() => {
        $("#user-table").DataTable();
    })

    function deleteUser(id) {
        $.ajax({
            url: "/user/delete/".concat(id.toString()),
            dataType: "json",
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success !',
                    text: response.sukses
                });
                window.location = window.location;
            }
        });
    }
</script>
<?= $this->endSection() ?>