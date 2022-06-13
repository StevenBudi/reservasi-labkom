<table id="labschedule" class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Peminjam</th>
            <th>Laboratorium</th>
            <th>Waktu Pemakaian</th>
        </tr>
        <tbody>
            <?php 
                $no = 1;
                foreach($list as $item){
                    ?>
                    <tr>
                        <td><?= $no++;?></td>
                        <td><?= $item['peminjam']?></td>
                        <td><?= $item['labkom'] == "rpl" ? "Laboratorium Software Engineering" : ($item['labkom'] == "mulmed" ? "Laboratorium Multimedia Studio" : "Laboratorium Computer Network and Instrumentation")?></td>
                        <td><?= $item['waktu_penggunaan']." - " . explode(" ", $item['waktu_akhir_penggunaan'])[1]?></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </thead>
</table>

<script>
    $(document).ready(() => {
        $("#labschedule").DataTable();
    })
</script>