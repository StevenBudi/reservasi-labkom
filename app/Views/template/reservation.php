<!-- Modal -->
<div class="modal fade" id="reservation-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reservasi Labkom</h5>
                <button type="button" class="close" data-dismiss="reservation-modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('') ?>" method="get" enctype="multipart/form-data" id="logout-form">
                    <? csrf_field() ?>
                    <div class="mb-3">
                        <label for="">Labkom</label>
                        <select name="" id="">
                            <option value="">Lab RPL</option>
                            <option value="">Lab Mulmed</option>
                            <option value="">Lab Jaringan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="reser-data" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" name="peminjaman" id="reser-date">
                        <p>Tanggal Peminjaman Minimal 1 Hari dan Maksimal 2 minggu sebelum penggunaan</p>
                    </div>

                    <div class="mb-3">
                        <label for="reser-time" class="form-label">Jam Peminjaman</label>
                        <input type="time" name="jam" id="reser-time">
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Lama Peminjaman</label>
                        <input type="number" name="duration" id="reser-duration" max="4">
                        <p>Untuk member non-civitas UNS wajib membayar biaya peminjaman sebesar Rp. XX.XXX/Jam</p>
                    </div>
                    
                    <div class="mb-3">
                        <label for="">Catatan Keterangan</label>
                        <textarea name="" id="" rows="10"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>