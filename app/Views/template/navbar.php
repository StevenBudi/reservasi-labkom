<!-- Navbar -->
<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="#">
            <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="25" alt="" loading="lazy" />
        </a>

       <?php 
        //check udah login apa belom
        if(isset($_COOKIE['logged_in'])){ 
            ?>
             <!-- Right links -->
        <ul class="navbar-nav ms-auto d-flex flex-row">
            <!-- Notification dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">1</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Some news</a></li>
                    <li><a class="dropdown-item" href="#">Another news</a></li>
                    <li>
                        <a class="dropdown-item" href="#">Something else</a>
                    </li>
                </ul>
            </li>

            <!-- Avatar -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <img src="/images/avatar/<?= session()->get('avatar')?>" class="rounded-circle" height="22" alt="" loading="lazy" />
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="/user/<?= session()->get('id')?>">My profile</a></li>
                    <li><a class="dropdown-item" href="#" id="logout-button" data-toggle="modal" data-target="logout-modal">Logout</a></li>
                </ul>
            </li>
        </ul>
        <?php
        }else
        {
            ?>
            <ul class="navbar-nav ms-auto d-flex flex-row">
                <li class="nav-item">
                    <a href="/user/sign-up">Sign Up</a>
                </li>

                <li class="nav-item">
                    <a href="/user/sign-in">Sign In</a>
                </li>
            </ul>
            <?php
        }
       
       ?>
    </div>
    <!-- Container wrapper -->
</nav>
<div id="viewmodal" style="display: none;"></div>

<script>
    $('#logout-button').click(function(e) {
        e.preventDefault();
        $.ajax({
            url : "<?= base_url('/user/logout-modal') ?>",
            // dataType : "json",
            success : function(response){
                $('#viewmodal').html(response.data).show();
                $('#logout-modal').modal('show');
            }
        })
    })
</script>