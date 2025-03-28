<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
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
                <li class="nav__item"><a href="#" class="nav__link">Inicio</a></li>
                <li class="nav__item"><a href="#" class="nav__link">Productos</a></li>
                <li class="nav__item"><a href="#" class="nav__link">Ofertas</a></li>
                <li class="nav__item"><a href="./contacto.html" class="nav__link">Contacto</a></li>
                <li class="nav__item nav__item--login">
                  <a href="#" class="nav__link nav__link--login">Login</a>
              </li>
            </ul>
        </nav>
    </header>
