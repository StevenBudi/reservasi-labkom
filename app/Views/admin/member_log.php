<a href="<?= base_url('/admin/export_member')?>" class="btn  btn-outline-success mb-3 mt-3 mx-auuto">Download Data</a>
<table id="membertable" class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>User ID</th>
            <th>Action</th>
            <th>Alamat IP</th>
            <th>Waktu</th>
        </tr>
        <tbody>
            <?php 
                $no = 1;
                foreach($list as $item){
                    ?>
                    <tr>
                        <td><?= $no++;?></td>
                        <td><?= $item['user_id']?></td>
                        <td><?= $item['action']?></td>
                        <td><?= $item['ip']?></td>
                        <td><?= $item['created_at']?></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </thead>
</table>

<script>
    $("#member-log-button").click(() => {

    })
    $(document).ready(() => {
        $("#membertable").DataTable();
    })
</script>