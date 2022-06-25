<!-- Modal -->
<div class="modal fade bd-example-modal-lg" data-toggle="modal" id="reservation-update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"> Edit Reservasi Labkom</h5>
    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
    </button>
  </div>
<div class="card">
    <form action="<?= base_url('/labkom/update_reser/' . $item['id']) ?>" method="POST" enctype="multipart/form-data" id="reservation-update-form">
      <input type="hidden" name="_method" value="PUT">
                    <?= csrf_field() ?>
      <!-- Card body -->
      <div class="card-body px-5">
        <!-- Account section -->
        <div class="row gx-xl-5">
          <div class="col-md-4">
            <label><strong>Ruangan</strong></label>
          </div>

          <div class="col-md-8">
              <div class="mb-3">
                        <label for="labkom-opt">Laboratorium Komputer</label>
                        <select name="labkom-opt" id="labkom-opt">
                            <option value="rpl" <?= $item['labkom'] == "rpl" ? "selected" : "" ?>>Laboratorium Software Engineering</option>
                            <option value="mulmed" <?= $item['labkom'] == "mulmed" ? "selected" : "" ?>>Laboratorium Multimedia Studio</option>
                            <option value="tkj" <?= $item['labkom'] == "tkj" ? "selected" : "" ?>>Laboratorium Computer Network and Instrumentation</option>
                        </select>
  
        </div>
      </div>
    </div>
    <div class="row gx-xl-5">
          <div class="col-md-4">
          <label><strong>Tanggal Peminjaman</label></strong>
          </div>

          <div class="col-md-8">
            <div class="mb-3">
              <div class="mb-3">
                        <label for="reser-data" class="form-label">Tanggal Peminjaman</label>
                        <br><input type="date" name="peminjaman" id="reser-date" value="<?= date('Y-m-d', strtotime(explode(" ", $item['waktu_penggunaan'])[0])) ?>">

                        
          </div>
        </div>
      </div>
    </div>

    <div class="row gx-xl-5">
          <div class="col-md-4">
           <label><strong>Waktu Peminjaman</label></strong>
          </div>

          <div class="col-md-8">
            <div class="mb-3">
              <div class="mb-3">
                        <label for="reser-time" class="form-label">Jam Peminjaman</label>
                        <br><input type="time" name="jam" id="reser-time" value="<?= explode(":", explode(" ", $item['waktu_penggunaan'])[1])[0] . ":" . explode(":", explode(" ", $item['waktu_penggunaan'])[1])[1] ?>">
                        
          </div>
        </div>
      </div>
    </div>
  
<div class="row gx-xl-5">
          <div class="col-md-4">
           <label><strong>Lama Peminjaman</label></strong>
          </div>

          <div class="col-md-8">
            <div class="mb-3">
              <div class="mb-3">
                        <label for="duration" class="form-label">Lama Peminjaman</label>
                        <br><input type="number" name="duration" id="reser-duration" max="4" min="1" value="<?= (int) explode(":", explode(" ", $item['waktu_akhir_penggunaan'])[1])[0] - (int) explode(":", explode(" ", $item['waktu_penggunaan'])[1])[0] ?>">        
          </div>
        </div>
      </div>
    </div>

  <div class="row gx-xl-5">
          <div class="col-md-4">
           <label><strong>Keterangan</label></strong>
          </div>

          <div class="col-md-8">
            <div class="mb-3">
              <div class="mb-3">
                        <label for="reser-notes">Catatan Keterangan</label>
                        <br><textarea name="reser-notes" id="reser-notes" rows="4" cols="50" ><?= $item['catatan'] ?></textarea>     
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
  <button type="button"  class="btn btn-outline-primary" data-mdb-dismiss="modal" >Cancel</button>
   <button type="submit" class="btn btn-primary">Ubah</button>
  </div>
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