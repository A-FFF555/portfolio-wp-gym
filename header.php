<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo esc_attr(get_bloginfo('description')); ?>">
  <link rel="canonical" href="<?php echo esc_url(is_home() ? home_url('/') : get_permalink()); ?>">

  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
  <meta property="og:type" content="<?php echo is_single() ? 'article' : 'website'; ?>">
  <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg([], $wp->request))); ?>">
  <meta property="og:title" content="<?php wp_title('|', true, 'right'); ?>">
  <meta property="og:description" content="<?php echo esc_attr(get_bloginfo('description')); ?>">

  <?php
  // サムネイルがあれば取得、なければデフォルト画像（?? で代打指定）
  $thumb_id = get_post_thumbnail_id();
  $thumb_src = wp_get_attachment_image_src($thumb_id, 'full');
  $ogp_url = $thumb_src[0] ?? (get_template_directory_uri() . '/assets/images/ogp-default.png');
  ?>
  <meta property="og:image" content="<?php echo esc_url($ogp_url); ?>">

  <meta name="twitter:card" content="summary_large_image">

  <link rel="icon" href="<?php echo esc_url(get_theme_file_uri('/favicon.ico')); ?>">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_theme_file_uri('/assets/images/apple-touch-icon.png')); ?>">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div class="pseudo-3column__wrapper">

    <!-- ハンバーガーメニューここから -->
    <div class="sp-menu">
      <button class="menu--trigger" id="menuTrigger" type="button" aria-expanded="false" aria-controls="fullMenu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="menu__label">MENU</span>
      </button>

      <nav class="full-menu" id="fullMenu">
        <div class="full-menu__inner">
          <div class="menu__header">

            <h1 class="logo-img">
              <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-img__link">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                if (has_custom_logo()) :
                ?>
                  <img src="<?php echo esc_url($logo[0]); ?>" alt="<?php bloginfo('name'); ?>">
                <?php else : ?>
                  <?php bloginfo('name'); ?>
                <?php endif; ?>
              </a>
            </h1>

          </div>
          <ul class="nav__list">
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url('/')); ?>#about" class="nav__link">
                <span class="num">01</span>
                <div class="nav__txt">
                  <span class="en">PHILOSOPHY</span>
                  <small>選ばれる理由</small>
                </div>
              </a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url('/')); ?>#machine" class="nav__link">
                <span class="num">02</span>
                <div class="nav__txt">
                  <span class="en">MACHINE</span>
                  <small>設備紹介</small>
                </div>
              </a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url('/')); ?>#schedule" class="nav__link">
                <span class="num">03</span>
                <div class="nav__txt">
                  <span class="en">SCHEDULE</span>
                  <small>営業日</small>
                </div>
              </a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url('/')); ?>#trainers" class="nav__link ">
                <span class="num">04</span>
                <div class="nav__txt">
                  <span class="en">TRAINERS</span>
                  <small>トレーナー紹介</small>
                </div>
              </a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url('/')); ?>#price" class="nav__link">
                <span class="num">05</span>
                <div class="nav__txt">
                  <span class="en">PRICE</span>
                  <small>料金プラン</small>
                </div>
              </a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url('/')); ?>#faq" class="nav__link">
                <span class="num">06</span>
                <div class="nav__txt">
                  <span class="en">FAQ</span>
                  <small>よくある質問</small>
                </div>
              </a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url('/')); ?>#step" class="nav__link">
                <span class="num">07</span>
                <div class="nav__txt">
                  <span class="en">RESERVE</span>
                  <small>ご利用の流れ</small>
                </div>
              </a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url('/')); ?>#access" class="nav__link">
                <span class="num">08</span>
                <div class="nav__txt">
                  <span class="en">ACCESS</span>
                  <small>会社概要</small>
                </div>
              </a>
            </li>
          </ul>

          <div class="menu-footer">
            <a href="#" target="_blank" class="sp-insta__link">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free 7.3.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                <path d="M320.3 205C256.8 204.8 205.2 256.2 205 319.7C204.8 383.2 256.2 434.8 319.7 435C383.2 435.2 434.8 383.8 435 320.3C435.2 256.8 383.8 205.2 320.3 205zM319.7 245.4C360.9 245.2 394.4 278.5 394.6 319.7C394.8 360.9 361.5 394.4 320.3 394.6C279.1 394.8 245.6 361.5 245.4 320.3C245.2 279.1 278.5 245.6 319.7 245.4zM413.1 200.3C413.1 185.5 425.1 173.5 439.9 173.5C454.7 173.5 466.7 185.5 466.7 200.3C466.7 215.1 454.7 227.1 439.9 227.1C425.1 227.1 413.1 215.1 413.1 200.3zM542.8 227.5C541.1 191.6 532.9 159.8 506.6 133.6C480.4 107.4 448.6 99.2 412.7 97.4C375.7 95.3 264.8 95.3 227.8 97.4C192 99.1 160.2 107.3 133.9 133.5C107.6 159.7 99.5 191.5 97.7 227.4C95.6 264.4 95.6 375.3 97.7 412.3C99.4 448.2 107.6 480 133.9 506.2C160.2 532.4 191.9 540.6 227.8 542.4C264.8 544.5 375.7 544.5 412.7 542.4C448.6 540.7 480.4 532.5 506.6 506.2C532.8 480 541 448.2 542.8 412.3C544.9 375.3 544.9 264.5 542.8 227.5zM495 452C487.2 471.6 472.1 486.7 452.4 494.6C422.9 506.3 352.9 503.6 320.3 503.6C287.7 503.6 217.6 506.2 188.2 494.6C168.6 486.8 153.5 471.7 145.6 452C133.9 422.5 136.6 352.5 136.6 319.9C136.6 287.3 134 217.2 145.6 187.8C153.4 168.2 168.5 153.1 188.2 145.2C217.7 133.5 287.7 136.2 320.3 136.2C352.9 136.2 423 133.6 452.4 145.2C472 153 487.1 168.1 495 187.8C506.7 217.3 504 287.3 504 319.9C504 352.5 506.7 422.6 495 452z" />
              </svg>
            </a>
          </div>
        </div>

      </nav>
    </div>
    <!-- ハンバーガーメニューここまで -->

    <!-- 左カラムここから -->
    <aside class="pc--side is-left">
      <div class="side__content">

        <h1 class="logo-img">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-img__link">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
            if (has_custom_logo()) :
            ?>
              <img src="<?php echo esc_url($logo[0]); ?>" alt="<?php bloginfo('name'); ?>">
            <?php else : ?>
              <?php bloginfo('name'); ?>
            <?php endif; ?>
          </a>
        </h1>

        <nav class="side__nav">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url('/')); ?>#about" class="nav__link">
                <span class="num">01</span> PHILOSOPHY <small>選ばれる理由</small>
              </a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url('/')); ?>#machine" class="nav__link">
                <span class="num">02</span> MACHINE <small>設備紹介</small>
              </a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url('/')); ?>#schedule" class="nav__link">
                <span class="num">03</span> SCHEDULE <small>営業日</small>
              </a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url('/')); ?>#trainers" class="nav__link">
                <span class="num">04</span> TRAINERS <small>トレーナー紹介</small>
              </a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url('/')); ?>#price" class="nav__link">
                <span class="num">05</span> PRICE
                <small>料金プラン</small>
              </a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url('/')); ?>#faq" class="nav__link">
                <span class="num">06</span> FAQ
                <small>よくある質問</small>
              </a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url('/')); ?>#step" class="nav__link">
                <span class="num">07</span> RESERVE
                <small>ご利用の流れ</small>
              </a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url('/')); ?>#access" class="nav__link">
                <span class="num">08</span> ACCESS
                <small>会社概要</small>
              </a>
            </li>
          </ul>
        </nav>

        <div class="side__sns-info">
          <p class="side__sns-label">FOLLOW US</p>
          <a href="#" target="_blank" class="side__insta-btn">
            <div class="side__insta-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free 7.3.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                <path d="M320.3 205C256.8 204.8 205.2 256.2 205 319.7C204.8 383.2 256.2 434.8 319.7 435C383.2 435.2 434.8 383.8 435 320.3C435.2 256.8 383.8 205.2 320.3 205zM319.7 245.4C360.9 245.2 394.4 278.5 394.6 319.7C394.8 360.9 361.5 394.4 320.3 394.6C279.1 394.8 245.6 361.5 245.4 320.3C245.2 279.1 278.5 245.6 319.7 245.4zM413.1 200.3C413.1 185.5 425.1 173.5 439.9 173.5C454.7 173.5 466.7 185.5 466.7 200.3C466.7 215.1 454.7 227.1 439.9 227.1C425.1 227.1 413.1 215.1 413.1 200.3zM542.8 227.5C541.1 191.6 532.9 159.8 506.6 133.6C480.4 107.4 448.6 99.2 412.7 97.4C375.7 95.3 264.8 95.3 227.8 97.4C192 99.1 160.2 107.3 133.9 133.5C107.6 159.7 99.5 191.5 97.7 227.4C95.6 264.4 95.6 375.3 97.7 412.3C99.4 448.2 107.6 480 133.9 506.2C160.2 532.4 191.9 540.6 227.8 542.4C264.8 544.5 375.7 544.5 412.7 542.4C448.6 540.7 480.4 532.5 506.6 506.2C532.8 480 541 448.2 542.8 412.3C544.9 375.3 544.9 264.5 542.8 227.5zM495 452C487.2 471.6 472.1 486.7 452.4 494.6C422.9 506.3 352.9 503.6 320.3 503.6C287.7 503.6 217.6 506.2 188.2 494.6C168.6 486.8 153.5 471.7 145.6 452C133.9 422.5 136.6 352.5 136.6 319.9C136.6 287.3 134 217.2 145.6 187.8C153.4 168.2 168.5 153.1 188.2 145.2C217.7 133.5 287.7 136.2 320.3 136.2C352.9 136.2 423 133.6 452.4 145.2C472 153 487.1 168.1 495 187.8C506.7 217.3 504 287.3 504 319.9C504 352.5 506.7 422.6 495 452z" />
              </svg>
            </div>
            <span>Daily Gym Life</span>
          </a>
        </div>

      </div>
    </aside>
    <!-- 左カラムここまで -->