<?= $this->extend('/template/layout.php') ?>

<?= $this->section('content') ?>
<?php
// Fetch user data then check if session id match with user id
if (isset($_COOKIE['logged_in']) && session()->get('id') == $item['id']) {
    print_r($item);
?>
    <div class="profil-card">
        <a href="#" class="btn btn-primary" id="edit-button" data-toggle="modal" data-target="edit-modal">Edit</a>
        <a href="#" class="btn btn-danger" id="delete-button">Delete</a>
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