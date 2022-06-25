<!-- Sidebar -->
<nav id="sidebarMenu" class="collapse d-lg-block sidebar ">
    <div class="position-sticky">
        <div class="list-group list-group-flush  mt-4">
            <a href="<?= base_url('/')?>" class="list-group-item list-group-item-action py-2 bg-transparent <?= isset($path) && $path == 'home' ? 'active' : ''?>"  aria-current="true">
                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main Dashboard</span>
            </a>
            <a href="<?= base_url('/labkom')?>" class="list-group-item list-group-item-action py-2 bg-transparent <?= isset($path) && $path == 'labkom' ? 'active' : ''?>"  aria-current="true">
                <i class="fas fa-home fa-fw me-3"></i><span>Laboratorium</span>
            </a>
            <a href="<?= base_url('/about')?>" class="list-group-item list-group-item-action py-2 bg-transparent <?= isset($path) && $path == 'about' ? 'active' : ''?>"  aria-current="true">
                <i class="fas fa-book-open  fa-fw me-3"></i><span>About</span>
            </a>
            
            <?php
            if (session()->get('status') == "admin") {
            ?>
                <a href="<?= base_url('/admin')?>" class="list-group-item list-group-item-action py-2 bg-transparent <?= isset($path) && $path == 'admin' ? 'active' : ''?>"  aria-current="true">
                <i class="fas fa-user-cog fa-fw me-3"></i><span>Admin Dashboard</span>
            </a>
            <?php
            }
            ?>

        </div>
    </div>
    </div>
</nav>

       