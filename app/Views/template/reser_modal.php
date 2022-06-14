<!-- Modal -->
<div class="modal fade" id="reservation-update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reservasi Labkom</h5>
                <button type="button" class="close" data-dismiss="reservation-modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/labkom/update_reser/' . $item['id']) ?>" method="POST" enctype="multipart/form-data" id="reservation-update-form">
                    <input type="hidden" name="_method" value="PUT">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="labkom-opt">Laboratorium Komputer</label>
                        <select name="labkom-opt" id="labkom-opt">
                            <option value="rpl" <?= $item['labkom'] == "rpl" ? "selected" : "" ?>>Laboratorium Software Engineering</option>
                            <option value="mulmed" <?= $item['labkom'] == "mulmed" ? "selected" : "" ?>>Laboratorium Multimedia Studio</option>
                            <option value="tkj" <?= $item['labkom'] == "tkj" ? "selected" : "" ?>>Laboratorium Computer Network and Instrumentation</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="reser-data" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" name="peminjaman" id="reser-date" value="<?= date('Y-m-d', strtotime(explode(" ", $item['waktu_penggunaan'])[0])) ?>">
                        <p>Untuk Tanggal Peminjaman Maksimal 1 Hari dan Minimal 2 minggu sebelum penggunaan</p>
                    </div>

                    <div class="mb-3">
                        <label for="reser-time" class="form-label">Jam Peminjaman</label>
                        <input type="time" name="jam" id="reser-time" value="<?= explode(":", explode(" ", $item['waktu_penggunaan'])[1])[0] . ":" . explode(":", explode(" ", $item['waktu_penggunaan'])[1])[1] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Lama Peminjaman</label>
                        <input type="number" name="duration" id="reser-duration" max="4" min="1" value="<?= (int) explode(":", explode(" ", $item['waktu_akhir_penggunaan'])[1])[0] - (int) explode(":", explode(" ", $item['waktu_penggunaan'])[1])[0] ?>">
                        <p>Untuk member non-civitas UNS wajib membayar biaya peminjaman sebesar Rp. 25.000/Jam</p>
                    </div>

                    <div class="mb-3">
                        <label for="reser-notes">Catatan Keterangan</label>
                        <textarea name="reser-notes" id="reser-notes" rows="10"><?= $item['catatan'] ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#reservation-update-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.sukses) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success !',
                        text: response.sukses,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#reservation-update-modal').modal('hide')
                        }
                    });
                    jadwalLabkom();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.gagal,
                    });
                }
            }
        })
    });

    $(document).ready(() => {
        limitDate();
    })
</script>