<table id="datatable" class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Avatar</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Telepon</th>
            <th>Action</th>
        </tr>
        <tbody>
            <?php 
                $no = 1;
                foreach($list as $item){
                    ?>
                    <tr>
                        <td><?= $no++;?></td>
                        <td><img src="/images/avatar/<?= $item['avatar']?>" alt="" width="100px"></td>
                        <td><?= $item['nama']?></td>
                        <td><?= $item['email']?></td>
                        <td><?= $item['telepon']?></td>
                        <td><a href="<?= base_url('/user/verif/', $item['id'])?>" class="btn btn-warning">Verif</a></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </thead>
</table>

<script>
    $(document).ready(() => {
        $("#datatable").DataTable();
    })
</script>