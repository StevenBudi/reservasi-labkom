<?= $this->extend('/template/layout.php') ?>

<?= $this->section('content') ?>
<form>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="check">
        <label class="form-check-label" for="check">Remember Me!</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="/admin/login">Login Admin</a>
</form>
<?= $this->endSection() ?>