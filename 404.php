<?php get_header(); ?>

<main class="main-content--center">

  <div class="not-found">

    <h1 class="not-found__ttl">404</h1>
    <p class="not-found__msg">お探しのページは見つかりませんでした。</p>

    <p class="not-found__info">URLが間違っているか、ページが移動・削除された可能性があります。</p>

    <div class="not-found__actions">
      <a href="<?php echo esc_url(home_url()); ?>" class="not-found__btn">トップページへ戻る &raquo;</a>
    </div>

  </div>

</main>

<?php get_footer(); ?>