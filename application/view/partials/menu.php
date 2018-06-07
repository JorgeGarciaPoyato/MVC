      <header class="header">
        <div class="header__content row">

            <div class="header__logo">
                <a class="logo" href="/">
                    <img src="<?= URL ?>images/academia2.png" alt="Homepage">
                </a>
            </div> <!-- end header__logo -->

            <ul class="header__social">
                <li>
                    <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </li>
            </ul>
            <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

            <nav class="header__nav-wrap">

                <h2 class="header__nav-heading h6">Site Navigation</h2>

                <ul class="header__nav">
                    <a href="<?= URL ?>/" title="">Home</a>
                    &nbsp
                    &nbsp
                    <a href="<?= URL ?>/post">Post</a></li>
                    &nbsp
                    &nbsp
              <?php if (!isset($_SESSION['user_role'])): ?>
                    <a href="<?= URL ?>/login">Logueate</a></li>
                    &nbsp
                    &nbsp
              <?php endif ?>
                    <a href="<?= URL ?>/home/about" >About</a></li>
                    &nbsp
                    &nbsp

            <?php if (isset($_SESSION['user_id'])): ?>
              <?php if ($_SESSION['user_role'] == 'Admin' || $_SESSION['user_role'] == 'Teacher'): ?>

                <a href="<?= URL ?>/admin" class="text-uppercase">Administración</a>
                    &nbsp
                    &nbsp
            <?php endif ?>
            <?php endif ?>
            <?php if (isset($_SESSION['user_name'])): ?>
             <a href="<?= URL ?>/login/salir" class="text-uppercase">Cerrar Sesión</a>

            <?php endif ?>
            <?php if (isset($_SESSION['user_role'])): ?>
                &nbsp
                    &nbsp&nbsp
                    &nbsp&nbsp
            <span class="hidden-xs"> Estas logueado como: <?= $_SESSION["user_name"] ?> </span>
            <?php endif ?>
                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

            </nav> <!-- end header__nav-wrap -->

        </div> <!-- header-content -->
 </header> <!-- header -->