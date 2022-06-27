<?= $this->extend('/template/layout.php') ?>

<?= $this->section('content') ?>
<form id="form" action="/user/insertAjax" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
<div class="card">
<div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
      <img src="<?= base_url('images/log2.jpg')?>"
          class="img-fluid">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
      <h5 class="text-center"><strong>Sign Up</strong></h5>

        <form>
          <!-- Email input -->
          <div class="row mb-3">
        <div class="col">
            <label for="namadepan" class="form-label">Nama Depan</label>
            <input type="text" class="form-control" id="namadepan" name="namadepan">
            <div class="invalid-feedback" id="errornd"></div>
        </div>
        <div class="col">
            <label for="namabelakang" class="form-label">Nama Belakang</label>
            <input type="text" class="form-control" id="namabelakang" name="namabelakang">
        </div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email">
        <div class="invalid-feedback" id="errormail"></div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <div class="invalid-feedback" id="errorpass"></div>
        </div>
        <div class="col">
            <label for="password2" class="form-label">Konfirmasi Password</label>
            <input type="password" name="password2" class="form-control" id="password2">
            <div class="invalid-feedback" id="errorpass2"></div>
        </div>
    </div>
    <div class="mb-3">
        <label for="telepon" class="form-label">Telepon</label>
        <input type="text" name="telepon" id="telepon" class="form-control">
        <div class="invalid-feedback" id="errortel"></div>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea name="alamat" id="alamat" rows="4" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="avatar" class="form-label">Avatar</label>
        <input type="file" name="avatar" id="avatar" class="form-control">
        <div class="invalid-feedback" id="errorava"></div>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
      </div>
    </div>
  </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.error) {
                        if (response.error.namadepan) {
                            $('#namadepan').addClass('is-invalid');
                            $('#errornd').html(response.error.namadepan);
                        } else {
                            $('#namadepan').removeClass('is-invalid');
                            $('#errornd').html('');
                        }

                        if (response.error.email) {
                            $('#email').addClass('is-invalid');
                            $('#errormail').html(response.error.email);
                        } else {
                            $('#email').removeClass('is-invalid');
                            $('#errormail').html('');
                        }

                        if (response.error.password) {
                            $('#password').addClass('is-invalid');
                            $('#errorpass').html(response.error.password);
                        } else {
                            $('#password').removeClass('is-invalid');
                            $('#errorpass').html('');
                        }

                        if (response.error.password2) {
                            $('#password2').addClass('is-invalid');
                            $('#errorpass2').html(response.error.password2);
                        } else {
                            $('#password2').removeClass('is-invalid');
                            $('#errorpass2').html('');
                        }

                        if (response.error.telepon) {
                            $('#telepon').addClass('is-invalid');
                            $('#errortel').html(response.error.telepon);
                        } else {
                            $('#telepon').removeClass('is-invalid');
                            $('#errortel').html('');
                        }

                        if (response.error.avatar) {
                            $('#avatar').addClass('is-invalid');
                            $('#errorava').html(response.error.avatar);
                        } else {
                            $('#avatar').removeClass('is-invalid');
                            $('#errorava').html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success !',
                            text: response.sukses,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "/";
                            }
                        });
                    }
                }
            })
        })
    })
</script>
<?= $this->endSection() ?>