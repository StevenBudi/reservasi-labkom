<table id="veriftable" class="table">
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
                        <td><a href="#" class="btn btn-warning" onclick="verifyUser(<?= $item['id']?>)">Verif</a></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </thead>
</table>

<script>
    function verifyUser(id){
        $.ajax({
            url : "/user/verify/".concat(id.toString()),
            success : function(response){
                console.log(response);
                unverifData();
            }
        })
    }

    $(document).ready(() => {
        $("#veriftable").DataTable();
    })
</script>