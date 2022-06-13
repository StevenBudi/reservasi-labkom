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
                <form action="<?= base_url('/labkom/pesan') ?>" method="POST" enctype="multipart/form-data" id="logout-form">
                    <? csrf_field() ?>
                    <div class="mb-3">
                        <label for="labkom-opt">Laboratorium Komputer</label>
                        <select name="labkom-opt" id="labkom-opt">
                            <option value="rpl">Laboratorium Software Engineering</option>
                            <option value="tkj">Laboratorium Multimedia Studio</option>
                            <option value="mulmed">Laboratorium Computer Network and Instrumentation</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="reser-data" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" name="peminjaman" id="reser-date">
                        <p>Untuk Tanggal Peminjaman Maksimal 1 Hari dan Minimal 2 minggu sebelum penggunaan</p>
                    </div>

                    <div class="mb-3">
                        <label for="reser-time" class="form-label">Jam Peminjaman</label>
                        <input type="time" name="jam" id="reser-time">
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Lama Peminjaman</label>
                        <input type="number" name="duration" id="reser-duration" max="4" min="1">
                        <p>Untuk member non-civitas UNS wajib membayar biaya peminjaman sebesar Rp. 25.000/Jam</p>
                    </div>
                    
                    <div class="mb-3">
                        <label for="reser-notes">Catatan Keterangan</label>
                        <textarea name="reser-notes" id="reser-notes" rows="10"></textarea>
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
    const limitDate = () => {
        const dateA = new Date();
        const dateB = new Date();
        dateB.setDate(dateA.getDate() + 14);
        dateA.setDate(dateA.getDate() + 1);
        const minDate = `${dateA.getFullYear()}-${dateA.getMonth() < 10 ? "0" + (dateA.getMonth() + 1).toString() : (dateA.getMonth() + 1)}-${dateA.getDate() < 10 ? "0" + dateA.getDate().toString() : dateA.getDate()}`;
        const maxDate = `${dateB.getFullYear()}-${dateB.getMonth() < 10 ? "0" + (dateB.getMonth() + 1).toString() : (dateB.getMonth() + 1)}-${dateB.getDate() < 10 ? "0" + dateB.getDate().toString() : dateB.getDate()}`;
        try {
            document.getElementById("reser-date").setAttribute("min", minDate);
            document.getElementById("reser-date").setAttribute("max", maxDate);
        } catch (error) {
            console.error();
        }
    }
    
    $(document).ready(() => {
        limitDate();
    })
</script>