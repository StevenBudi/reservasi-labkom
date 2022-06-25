<!-- Modal -->
<div class="modal fade bd-example-modal-lg " data-toggle="modal" id="reservation-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"> Reservasi Labkom</h5>
    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
    </button>
</div>


<div class="card">
    <form action="<?= base_url('/labkom/pesan') ?>" method="POST" enctype="multipart/form-data" id="reservation-form">
                    <?= csrf_field() ?>
      <div class="card-body px-5">
        <!-- Account section -->
        <div class="row gx-xl-5">
          <div class="col-md-4">
            <h5>Ruangan</h5>
            <p class="text-muted">Pilih Laboratorium sesuai dengan kegiatan yang akan anda laksanakan</p>
          </div>

          <div class="col-md-8">
            <div class="mb-3">
              <div class="mb-3">
                        <label for="labkom-opt">Laboratorium </label>
                        <br><select name="labkom-opt" id="labkom-opt">
                            <option value="rpl">Laboratorium Software Engineering</option>
                            <option value="mulmed">Laboratorium Multimedia Studio</option>
                            <option value="tkj">Laboratorium Computer Network and Instrumentation</option>
                        </select>
          </div>
        </div>
      </div>
    </div>
    <div class="row gx-xl-5">
          <div class="col-md-4">
            <h5>Tanggal Peminjaman</h5>
            <p>Untuk Tanggal Peminjaman Maksimal 1 Hari dan Minimal 2 minggu sebelum penggunaan</p>
          </div>

          <div class="col-md-8">
            <div class="mb-3">
              <div class="mb-3">
                           <label for="reser-data" class="form-label">Tanggal Peminjaman</label>
                           <br><input type="date" name="peminjaman" id="reser-date">
                        
          </div>
        </div>
      </div>
    </div>

    <div class="row gx-xl-5">
          <div class="col-md-4">
            <h5>Waktu Peminjaman</h5>
            <p>Pastikan waktu peminjaman tidak bertabrakan dengan jadwal lain</p>
          </div>

          <div class="col-md-8">
            <div class="mb-3">
              <div class="mb-3">
                        <label for="reser-time" class="form-label">Jam Peminjaman</label>
                        <br><input type="time" name="jam" id="reser-time">
                        
          </div>
        </div>
      </div>
    </div>
  
<div class="row gx-xl-5">
          <div class="col-md-4">
            <h5>Lama Peminjaman</h5>
            <p>Untuk member non-civitas UNS wajib membayar biaya peminjaman sebesar Rp. 25.000/Jam</p>
          </div>

          <div class="col-md-8">
            <div class="mb-3">
              <div class="mb-3">
                        <label for="duration" class="form-label">Lama Peminjaman</label>
                        <br><input type="number" name="duration" id="reser-duration" max="4" min="1">         
          </div>
        </div>
      </div>
    </div>

  <div class="row gx-xl-5">
          <div class="col-md-4">
            <h5>Keterangan</h5>
            <p>Masukan keterangan tambahan jika diperlukan</p>
          </div>

          <div class="col-md-8">
            <div class="mb-3">
              <div class="mb-3">
                        <label for="reser-notes">Catatan Keterangan</label>
                        <br><textarea name="reser-notes" id="reser-notes" rows="4" cols="50"></textarea>       
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
  <button type="button"  class="btn btn-outline-primary" data-mdb-dismiss="modal" >Cancel</button>
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  </div>
</form>
</div>
</div>
</div>
</div>

<script>
    $('#reservation-form').submit(function(e) {
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
                            window.location.href = "/";
                        }
                    });
                    $('#reservation-modal').modal('hide')
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