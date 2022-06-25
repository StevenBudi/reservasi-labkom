<?= $this->extend('/template/layout.php') ?>

<?= $this->section('content') ?>
<?php
// Fetch user data then check if session id match with user id
if (isset($_COOKIE['logged_in']) && session()->get('id') == $item['id']) {


?>
    <div class="container-fluid ">
        <!-- Section: Main chart -->
            <div class="card">
                <div class="card-body">
                    <h1>Biodata <?= $item['nama'] ?></h1>
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-striped">
                                <tr>
                                    <td>Nama</td>
                                    <td> <?= $item['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td> <?= $item['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td> <?= $item['email'] ?></td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td> <?= $item['telepon'] ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td> <?= $item['status'] ?></td>
                                </tr>
                                <tr>
                                    <td>Terdaftar Sejak</td>
                                    <td> <?= $item['created_at'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-8 offset-md-2 ">
                                    <img src="/images/avatar/<?= $item['avatar'] ?>" alt="" width="100%">
                                </div>
                            </div>
                            <div class="row mt-4">
                            <div class="col-md-6"><a href="#" class="btn btn-outline-success  btn-block" id="edit-button" data-toggle="modal" data-target="edit-modal">Edit</a></div>
                            <div class="col-md-6"> <a href="#" class="btn btn-outline-danger  btn-block" id="delete-button">Delete</a></div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

    <div id="viewmodal" style="display: hidden;"></div>
    <script>
        $('#edit-button').click((e) => {
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('/user/edit/' . $item['id']) ?>",
                success: (response) => {
                    $("#viewmodal").html(response.data).show();
                    $("#edit-modal").modal('show');
                }

            })
        })

        $("#delete-button").click((e) => {
            e.preventDefault();
            Swal.fire({
                icon : 'question',
                title: 'Do you want to delete your account ?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('/user/delete/' . $item['id']) ?>",
                        success: (response) => {
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
                    })
                }
            })

        })
    </script>
<?php
} else {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "You are not permitted to do this",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/";
            }
        });
    </script>
<?php
}

?>
<?= $this->endSection() ?>