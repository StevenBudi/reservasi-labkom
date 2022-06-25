<div class="modal fade bd-example-modal-lg" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"> Update Data Profil</h5>
    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
    </button>
    </button>
  </div>
<div class="card">
 <form action="<?= base_url('/user/update/' . $item['id']) ?>" enctype="multipart/form-data" id="update-form" method="POST">
  <input type="hidden" name="_method" value="PUT">
                    <?= csrf_field() ?>
      <!-- Card body -->
      <div class="card-body px-5">
        <!-- Account section -->

        <div class="row gx-xl-5">
          <div class="col-md-4">
            <label for="namadepan" class="form-label">Nama Depan</label>
          </div>

          <div class="col-md-8">
              <div class="mb-3">
                <input type="text" class="form-control" id="namadepan" name="namadepan" value="<?= explode(' ', $item['nama'], 2)[0] ?>">
                <div class="invalid-feedback" id="errornd"></div>
        </div>
      </div>
    </div>

        <div class="row gx-xl-5">
          <div class="col-md-4">
            <label for="namabelakang" class="form-label">Nama Belakang</label>
          </div>

          <div class="col-md-8">
              <div class="mb-3">
              <input type="text" class="form-control" id="namabelakang" name="namabelakang" value="<?= explode(' ', $item['nama'], 2)[1] ?>">
        </div>
      </div>
    </div>
    <div class="row gx-xl-5">
          <div class="col-md-4">
            <label for="email" class="form-label">Email address</label>
          </div>

          <div class="col-md-8">
            <div class="mb-3">
              <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" value="<?= $item['email'] ?>">
                <div class="invalid-feedback" id="errormail"></div>    
          </div>
        </div>
      </div>
    </div>

    <div class="row gx-xl-5">
          <div class="col-md-4">
            <label for="password" class="form-label">Password</label>
          </div>

          <div class="col-md-8">
            <div class="mb-3">
              <div class="mb-3">
              <input type="hidden" name="passlama" value="<?= $item['password'] ?>">
              <input type="password" class="form-control" id="password" name="password">
              <div class="invalid-feedback" id="errorpass"></div>
          </div>
        </div>
      </div>
    </div>
  
<div class="row gx-xl-5">
          <div class="col-md-4">
            <label for="telepon" class="form-label">Telepon</label>
          </div>

          <div class="col-md-8">
            <div class="mb-3">
              <div class="mb-3">
            <input type="text" name="telepon" id="telepon" class="form-control" value="<?= $item['telepon'] ?>">
            <div class="invalid-feedback" id="errortel"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="row gx-xl-5">
          <div class="col-md-4">
          <label for="alamat" class="form-label">Alamat</label>
          </div>

          <div class="col-md-8">
            <div class="mb-3">
              <div class="mb-3">
                <textarea name="alamat" id="alamat" rows="4" class="form-control"><?= $item['alamat'] ?></textarea>     
          </div>
        </div>
      </div>
    </div>

<div class="row gx-xl-5">
          <div class="col-md-4">
            <label for="avatar" class="form-label">Avatar</label>
          </div>

          <div class="col-md-8">
            <div class="mb-3">
              <div class="mb-3">
              <input type="hidden" name="avalama" value="<?= $item['avatar'] ?>">
              <input type="file" name="avatar" id="avatar" class="form-control">
              <div class="invalid-feedback" id="errorava"></div>
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
    $(document).ready(function() {
        $('#update-form').submit(function(e) {
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
                                window.location.href = "/user/<?= $item['id']?>";
                            }
                        });
                }
            })
        })
    })
</script>