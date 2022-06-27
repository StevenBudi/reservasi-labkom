<?= $this->extend('/template/layout.php') ?>

<?= $this->section('content') ?>
<?php
if (!isset($_COOKIE['logged_in'])) {
?>
<section class="card" >
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
       <img src="<?= base_url('images/log1.svg')?>"
          class="img-fluid">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form method="post" action="/user/auth" enctype="multipart/form-data" id="form">
        <?= csrf_field() ?>
        <h5 class="text-center"><strong>Sign In</strong></h5>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="check" name="check">
            <label class="form-check-label" for="check">Remember Me!</label>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Submit</button>
    </form>
      </div>
    </div>
  </div>
</div>
<?php
} else {
?>
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Alert !',
            text: 'Already Logged In',
        }).then((result) => {
            if (result.isConfirmed){
                window.location.href = "/";
            }
        }) ;
    </script>
<?php
}
?>
<script>
    $(document).ready(function() {
        $("#form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.gagal) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.gagal,
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success !',
                            text: response.sukses,
                        }).then((result) => {
                            if(result.isConfirmed){
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