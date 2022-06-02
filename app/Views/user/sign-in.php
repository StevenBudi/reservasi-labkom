<?= $this->extend('/template/layout.php') ?>

<?= $this->section('content') ?>
<?php
if (!isset($_COOKIE['logged_in'])) {
?>
    <form method="post" action="/user/auth" enctype="multipart/form-data" id="form">
        <?= csrf_field() ?>
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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