<!-- Modal -->
<div class="modal fade" id="facility-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Fasilitas</h5>
                <button type="button" class="close" data-dismiss="facility-modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/labkom/update/' . $item['id']) ?>" enctype="multipart/form-data" id="facility-form" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <?= csrf_field() ?>
                    <h1>Labkom <?= $item['labkom'] ?></h1>
                    <div class="mb-3">
                        <label for="labkom-pc" class="form-label">Jumlah PC</label>
                        <input type="number" name="labkom-pc" id="labkom-pc" value="<?= $item['pc'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="labkom-meja" class="form-label">Jumlah Meja</label>
                        <input type="number" name="labkom-meja" id="labkom-meja" value="<?= $item['meja'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="labkom-kursi" class="form-label">Jumlah Kursi</label>
                        <input type="number" name="labkom-kursi" id="labkom-kursi" value="<?= $item['kursi'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="labkom-papan" class="form-label">Jumlah Papan Tulis</label>
                        <input type="number" name="labkom-papan" id="labkom-papan" value="<?= $item['papan tulis'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="labkom-penghapus" class="form-label">Jumlah Penghapus</label>
                        <input type="number" name="labkom-penghapus" id="labkom-penghapus" value="<?= $item['penghapus'] ?>">
                    </div>


                    <div class="mb-3">
                        <label for="labkom-vga" class="form-label">Jumlah Adaptor VGA</label>
                        <input type="number" name="labkom-vga" id="labkom-vga" value="<?= $item['kabel VGA'] ?>">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#facility-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success !',
                        text: response.sukses,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "/admin/";
                        }
                    });
                }
            })
        })
    })
</script>