<header class="page-header page-header-dark bg-teal pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="">
                            <?php if (isset($meta["icon"]) && !empty($meta["icon"])) :   ?>
                                <?= $meta['icon'] ?>
                            <?php else : ?>
                                <i class="bi bi-file-earmark fa-sm"></i>
                            <?php endif; ?>
                        </div>
                        <div class="mx-2"> <?= @$title ?></div>
                    </h1>
                    <div class="page-header-subtitle"><?= @$meta["subtitle"] ?></div>
                </div>
                <!-- <div class="col-12 col-xl-auto mt-4">Optional page header content</div> -->
            </div>
        </div>
    </div>
</header>