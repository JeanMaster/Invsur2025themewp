<header class="header">
    <div class="header__logo">
        <?php 
        if (has_custom_logo()) {
            the_custom_logo();
        } else {
            ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
                <?php bloginfo('name'); ?>
            </a>
            <?php
        }
        ?>
    </div>
    <nav class="nav">
        <input type="checkbox" id="nav-toggle" class="nav__checkbox">
        <label for="nav-toggle" class="nav__toggle">
            <span class="nav__icon"></span>
        </label>
        <ul class="nav__list">
            <li class="nav__item"><a href="<?php echo esc_url(home_url('/')); ?>" class="nav__link">Inicio</a></li>
            <li class="nav__item"><a href="<?php echo esc_url(home_url('/productos')); ?>" class="nav__link">Productos</a></li>
            <li class="nav__item"><a href="<?php echo esc_url(home_url('/ofertas')); ?>" class="nav__link">Ofertas</a></li>
            <li class="nav__item"><a href="<?php echo esc_url(home_url('/contacto')); ?>" class="nav__link">Contacto</a></li>
            <li class="nav__item nav__item--login">
                <?php if (is_user_logged_in()) : ?>
                    <div class="nav__user-menu">
                        <span class="nav__user-name">
                            <?php 
                            $current_user = wp_get_current_user();
                            echo esc_html($current_user->display_name);
                            ?>
                        </span>
                        <ul class="nav__user-submenu">
                            <li><a href="<?php echo esc_url(home_url('/mi-cuenta')); ?>">Mi Cuenta</a></li>
                            <li><a href="<?php echo wp_logout_url(home_url()); ?>">Cerrar Sesión</a></li>
                        </ul>
                    </div>
                <?php else : ?>
                    <a href="<?php echo wp_login_url(home_url()); ?>" class="nav__link nav__link--login">Login</a>
                <?php endif; ?>
            </li>
        </ul>
    </nav>
</header> 