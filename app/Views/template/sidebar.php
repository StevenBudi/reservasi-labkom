<!-- Sidebar -->
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
            <a href="<?= base_url('/')?>" class="list-group-item list-group-item-action py-2 ripple <?= isset($path) && $path == 'home' ? 'active' : ''?>"  aria-current="true">
                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
            </a>
            <a href="<?= base_url('/about')?>" class="list-group-item list-group-item-action py-2 ripple <?= isset($path) && $path == 'about' ? 'active' : ''?>">
                <i class="fas fa-chart-area fa-fw me-3"></i><span>About</span>
            </a>
            <?php
            if (session()->get('status') == "admin") {
            ?>
                <a href="<?= base_url('/admin')?>" class="list-group-item list-group-item-action py-2 ripple <?= isset($path) && $path == 'admin' ? 'active' : ''?>">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Admin Dashboard</span>
                </a>
            <?php
            }
            ?>

        </div>
    </div>
</nav>