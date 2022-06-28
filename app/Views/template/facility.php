<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="facility-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Update Data Laboratorium</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </button>
        </button>
      </div>
      <div class="card">
        <form action="<?= base_url('/labkom/update/' . $item['id']) ?>" enctype="multipart/form-data" id="facility-form" method="POST">
          <input type="hidden" name="_method" value="PUT">
          <?= csrf_field() ?>
          <!-- Card body -->
          <div class="card-body px-5">
            <!-- Account section -->

            <div class="row gx-xl-5">
              <div class="col-md-4">
                <label for="labkom-pc" class="form-label">Nama Ruangan</label>
              </div>

              <div class="col-md-8">
                <div class="mb-3">
                  <label><strong>Labkom <?= $item['labkom'] ?></strong></label>
                </div>
              </div>
            </div>

            <div class="row gx-xl-5">
              <div class="col-md-4">
                <label for="labkom-pc" class="form-label">Jumlah PC</label>
              </div>

              <div class="col-md-8">
                <div class="mb-3">
                  <input type="number" name="labkom-pc" id="labkom-pc" value="<?= $item['pc'] ?>">
                </div>
              </div>
            </div>
            <div class="row gx-xl-5">
              <div class="col-md-4">
                <label for="labkom-meja" class="form-label">Jumlah Meja</label>
              </div>

              <div class="col-md-8">
                <div class="mb-3">
                  <div class="mb-3">
                    <input type="number" name="labkom-meja" id="labkom-meja" value="<?= $item['meja'] ?>">
                  </div>
                </div>
              </div>
            </div>

            <div class="row gx-xl-5">
              <div class="col-md-4">
                <label for="labkom-kursi" class="form-label">Jumlah Kursi</label>
              </div>

              <div class="col-md-8">
                <div class="mb-3">
                  <div class="mb-3">
                    <input type="number" name="labkom-kursi" id="labkom-kursi" value="<?= $item['kursi'] ?>">
                  </div>
                </div>
              </div>
            </div>

            <div class="row gx-xl-5">
              <div class="col-md-4">
                <label for="labkom-papan" class="form-label">Jumlah Papan Tulis</label>
              </div>

              <div class="col-md-8">
                <div class="mb-3">
                  <div class="mb-3">
                    <input type="number" name="labkom-papan" id="labkom-papan" value="<?= $item['papan_tulis'] ?>">
                  </div>
                </div>
              </div>
            </div>

            <div class="row gx-xl-5">
              <div class="col-md-4">
                <label for="labkom-penghapus" class="form-label">Jumlah Penghapus</label>
              </div>

              <div class="col-md-8">
                <div class="mb-3">
                  <div class="mb-3">
                    <input type="number" name="labkom-penghapus" id="labkom-penghapus" value="<?= $item['penghapus'] ?>">
                  </div>
                </div>
              </div>
            </div>

            <div class="row gx-xl-5">
              <div class="col-md-4">
                <label for="labkom-vga" class="form-label">Jumlah Adaptor VGA</label>
              </div>

              <div class="col-md-8">
                <div class="mb-3">
                  <div class="mb-3">
                    <input type="number" name="labkom-vga" id="labkom-vga" value="<?= $item['kabel_VGA'] ?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-primary" data-mdb-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
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