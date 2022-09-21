<?php get_header();?>

<!-- main -->
<main class="main">

<!-- /mainscreen -->
<section class="mainscreen">
    <div class="mainscreen__bg"></div>
    <div class="mainscreen__wrapper">
        <div class="mainscreen__logo">
            <picture>
                <source data-srcset="<?php echo get_template_directory_uri(); ?>/img/main/logo-new.webp" type="image/webp" class="lazy" srcset="<?php echo get_template_directory_uri(); ?>/img/icons/placeholder.png">
                <img data-src="<?php echo get_template_directory_uri(); ?>/img/main/logo-new.png" alt="" class="lazy" src="<?php echo get_template_directory_uri(); ?>/img/icons/placeholder.png">
            </picture>
        </div>
        <h1 class="mainscreen__title title">вСЕГДА ГОВОРИ ДА ПУТЕШЕСТВИЯМ!</h1>
        <p class="mainscreen__text text">Ты впечатлишься своей смелости и выносливости, наберешься уникального опыта, познакомишься со многими интересными людьми и будешь радоваться как ребенок новым ощущениям.</p>
        <a href="#" class="mainscreen__btn btn" data-goto=".project">о проекте</a>
    </div>
</section>
<!-- /mainscreen -->

<!-- project -->
<section class="project">
    <div class="project__wrapper _anim-item">
        <div class="project__body">
            <h2 class="project__title title">Жизнь на вкус -</h2>
            <p class="project__description">это туристический проект, объединяющий людей с разных уголков России и стран зарубежья, желающих познать природу России во всех ее красках</p>
            <p class="project__text text">У нас вы не найдёте типичные экскурсии по достопримечательностям. Мы за активный отдых в комфортных условиях с элементами экстрима, но в это же время в полной безопасности.</p>
            <p class="project__italy-text italy-text">Мы с трепетом относимся к нашему делу и людям, доверившимся нам. Ваши улыбки и позитивные эмоции - вот наша мотивация!</p>
            <a href="#" class="project__btn btn" data-goto=".routes">перейти к путешествиям</a>
        </div>

        <div class="project__img"></div>
    </div>
</section>
<!-- /project -->

<!-- routes -->
<section class="routes">
    <div class="container">
        <h2 class="routes__title title">Маршруты</h2>
        <div class="routes__top _anim-item">
            <ul class="routes__list">
                <?php
                $region_titles = carbon_get_theme_option('region');
                foreach ( $region_titles as $title ){ ?>
                <li class="routes__open open-tab" data-tab="<?php echo $title['region_title'] ?>"><?php echo $title['region_title'] ?></li>
                <?php }; ?>
            </ul>
        </div>
        <div class="routes__main _anim-item">
            
            <?php
            $travel_options = carbon_get_theme_option('region');
            foreach ( $travel_options as $option ){
            $travels = $option['travel'];
            foreach ( $travels as $route ){
            ?>

            <div class="routes__tab tab" data-tab="<?php echo $option['region_title']; ?>">
                <div class="routes__wrapper">
                    <div class="routes__slider">
                        <div class="swiper-container">
                            <div class="swiper-wrapper _gallery">
                                <?php
                                $travel_gallery = $route['travel_gallery'];
                                foreach ( $travel_gallery as $photo ){ ?>
                            
                                    <div class="swiper-slide">
                                        <a href="<?php echo wp_get_attachment_image_url($photo, 'full'); ?>" class="routes__img">
                                            <img data-src="<?php echo wp_get_attachment_image_url($photo, 'full'); ?>" class="lazy" alt="" src="<?php echo get_template_directory_uri(); ?>/img/icons/placeholder.png">
                                        </a>
                                    </div>

                                <?php }; ?>
                            </div>
                            
                        </div>

                        <div class="routes__pagination swiper-pagination"></div>
                    </div>
                    
                    <div class="routes__body">
                        <p class="routes__date"><?php echo $route['travel_date'] ?></p>

                        <h2 class="routes__title title"><?php echo $route['travel_title'] ?></h2>

                        <p class="routes__price">стоимость всего: <?php echo $route['travel_price'] ?> руб.</p>

                        <p class="routes__text text"><?php echo $route['travel_text'] ?></p>

                        <p class="routes__italy-text italy-text"><?php echo $route['travel_italic'] ?></p>

                        <div class="routes__btns">
                            <a href="#" class="routes__btn btn" data-goto=".form">записаться в путешествие</a>

                            <a href="#" class="routes__btn btn _btn-open">о маршруте</a>
                        </div>
                    </div>
                </div>
                
                <div class="routes__bottom">
                    <ul class="routes__bottom-links">
                        <li class="bottomOpeners _active" data-filter="desc">Описание</li>
                        <li class="bottomOpeners" data-filter="price">Стоимость</li>
                    </ul>
                    <div class="routes__description _open" data-filter="desc">
                        <?php echo $route['travel_description'] ?>
                    </div>
                    <div class="routes__pricetab" data-filter="price">
                        <?php echo $route['travel_fullprice'] ?>
                    </div>
                </div>
            </div>
                                    
            <?php }; }; ?>
        </div>
    </div>
</section>
<!-- /routes -->

<!-- about -->
<section class="about">
    <div class="about__wrapper _anim-item">
        <div class="about__team">
            <h2 class="about__title title">наш дуэт</h2>

            <div class="about__person">
                <div class="about__photo">
                    <picture>
                        <source class="lazy" data-srcset="<?php echo get_template_directory_uri(); ?>/img/about/01.webp" type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/img/icons/placeholder.png">
                        <img data-src="<?php echo get_template_directory_uri(); ?>/img/about/01.png" class="lazy" alt="" src="<?php echo get_template_directory_uri(); ?>/img/icons/placeholder.png">
                    </picture>
                </div>
                <div class="about__body">
                    <p class="about__name">ФИЛИПП</p>
                    <p class="about__text text">Гид и инструктор, твой помощник в выборе снаряжения. За его плечами не только рюкзак, но и более 12 регионов России. Помог взойти на Эльбрус десяткам людей, поможет и тебе.</p>
                </div>
            </div>

            <div class="about__person">
                <div class="about__photo">
                    <picture>
                        <source class="lazy" data-srcset="<?php echo get_template_directory_uri(); ?>/img/about/02.webp" type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/img/icons/placeholder.png">
                        <img data-src="<?php echo get_template_directory_uri(); ?>/img/about/02.png" class="lazy" alt="" src="<?php echo get_template_directory_uri(); ?>/img/icons/placeholder.png">
                    </picture>
                </div>

                <div class="about__body">
                    <p class="about__name">МАША</p>
                    <p class="about__text text">Координатор проекта, ответит на все вопросы по части организации, поможет с подбором авиа/жд билетов. English speaking guide - новозеландцы остались в восторге от ее рассказов о России.</p>
                </div>
            </div>
        </div>
        <div class="about__info">

            <ul class="about__list" data-da=".about__team,1024,first">
                <li><span>8+</span>лет в туризме</li>
                <li><span>26</span>новых маршрута</li>
                <li><span>2565+</span>счастливых туристов</li>
            </ul>

            <div class="about__img">
                <picture>
                    <source class="lazy" data-srcset="<?php echo get_template_directory_uri(); ?>/img/about/03.webp" type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/img/icons/placeholder.png">
                    <img data-src="<?php echo get_template_directory_uri(); ?>/img/about/03.jpg" class="lazy" alt="" src="<?php echo get_template_directory_uri(); ?>/img/icons/placeholder.png">
                </picture>
            </div>
        </div>
    </div>
</section>
<!-- /about -->

<!-- form -->
<section class="form">
    <div class="form__wrapper _anim-item">
        <div class="form__img">
            <picture>
                <source class="lazy" data-srcset="<?php echo get_template_directory_uri(); ?>/img/form/01.webp" type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/img/icons/placeholder.png">
                <img data-src="<?php echo get_template_directory_uri(); ?>/img/form/01.jpg" class="lazy" alt="" src="<?php echo get_template_directory_uri(); ?>/img/icons/placeholder.png">
            </picture>
        </div>
        <div class="form__body">
            <h2 class="form__title title">заполнить заявку на путешествие</h2>
            <?php echo do_shortcode('[contact-form-7 id="18" title="Контактная форма 1"]'); ?>
        </div>
    </div>
</section>
<!-- /form -->

<!-- insta -->
<section class="insta">
    <div class="insta__wrapper">
        <h2 class="insta__title title"><a href="<?php echo $travel['instagram_url'];?>" target="_blank" class="_icon-instagram">Наш инстаграм</a></h2>
        <?php echo do_shortcode('[instagram-feed]'); ?>
    </div>
</section>
<!-- /insta -->

</main>
<!-- /main -->
		
<?php
get_footer();
