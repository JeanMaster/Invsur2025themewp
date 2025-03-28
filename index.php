<?php get_header() ?>


<main class="main-content">
        <h1>Bienvenido a Inversur, repuestos para tu hogar</h1>
        <section class="carousel">
            <div class="carousel__container">
                <div class="carousel__track">
                    <div class="carousel__slide">
                        <img src="./assets/img/producto1.jpg" alt="Producto 1">
                    </div>
                    <div class="carousel__slide">
                        <img src="./assets/img/producto2.jpg" alt="Producto 2">
                    </div>
                    <div class="carousel__slide">
                        <img src="./assets/img/producto3.jpg" alt="Producto 3">
                    </div>
                    <div class="carousel__slide">
                        <img src="./assets/img/producto4.jpg" alt="Producto 4">
                    </div>
                    <div class="carousel__slide">
                        <img src="./assets/img/producto5.jpg" alt="Producto 5">
                    </div>
                    <div class="carousel__slide">
                        <img src="./assets/img/producto6.jpg" alt="Producto 6">
                    </div>
                </div>
                <button class="carousel__button carousel__button--prev">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="carousel__button carousel__button--next">
                    <i class="fas fa-chevron-right"></i>
                </button>
                <div class="carousel__dots">
                    <button class="carousel__dot active" data-index="0"></button>
                    <button class="carousel__dot" data-index="1"></button>
                    <button class="carousel__dot" data-index="2"></button>
                    <button class="carousel__dot" data-index="3"></button>
                    <button class="carousel__dot" data-index="4"></button>
                    <button class="carousel__dot" data-index="5"></button>
                </div>
            </div>
        </section>

        <h2>Todo para tu hogar</h2>

        <section class="product-grid">
            <div class="product-card">
                <figure class="product-card__image">
                    <img src="./assets/img/producto1.jpg" alt="Producto 1" loading="lazy">
                </figure>
                <div class="product-card__content">
                    <h3 class="product-card__title"><a href="producto.html">Producto Innovador</a></h3>
                    <p class="product-card__price">$199.99</p>
                    <button class="btn btn--primary">Agregar al carrito</button>
                </div>
            </div>
        </section>
    </main>

    <?php get_footer() ?>