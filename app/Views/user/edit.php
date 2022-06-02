<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                <button type="button" class="close" data-dismiss="edit-modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/user/update/' . $item['id']) ?>" enctype="multipart/form-data" id="update-form">
                    <input type="hidden" name="_method" value="PUT">
                    <? csrf_field() ?>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="namadepan" class="form-label">Nama Depan</label>
                            <input type="text" class="form-control" id="namadepan" name="namadepan" value="<?= explode(' ', $item['nama'], 2)[0] ?>">
                            <div class="invalid-feedback" id="errornd"></div>
                        </div>
                        <div class="col">
                            <label for="namabelakang" class="form-label">Nama Belakang</label>
                            <input type="text" class="form-control" id="namabelakang" name="namabelakang" value="<?= explode(' ', $item['nama'], 2)[1] ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $item['email'] ?>">
                        <div class="invalid-feedback" id="errormail"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?= $item['password']?>">
                            <div class="invalid-feedback" id="errorpass"></div>
                        </div>
                        <div class="col">
                            <label for="password2" class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password2" class="form-control" id="password2" value="<?= $item['password']?>">
                            <div class="invalid-feedback" id="errorpass2"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" name="telepon" id="telepon" class="form-control" value="<?= $item['telepon'] ?>">
                        <div class="invalid-feedback" id="errortel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="4" class="form-control"><?= $item['alamat'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input type="file" name="avatar" id="avatar" class="form-control">
                        <div class="invalid-feedback" id="errorava"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Yes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="edit-modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
