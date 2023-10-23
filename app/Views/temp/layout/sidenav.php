<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-dark">

        <div class="sidenav-menu">
            <div class="text-center my-2">
                <img width="80" class="img-fluid my-2" src="/assets/img/logo.png" alt="">
                <p class="fw-bold"><?= APP_SLUG ?></p>
            </div>
            <hr class="mx-3">
            <?php
            if (logged_in()) {
                if (in_groups('admin')) echo view("/sidenavmenu/admin");
                if (in_groups('kepala-desa') || in_groups('pendamping-blt'))  echo view("/sidenavmenu/pendamping");
            }
            ?>
        </div>

        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title"><?= user()->nama_user ?></div>
            </div>
        </div>
    </nav>
</div>