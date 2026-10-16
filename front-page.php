<?php get_header(); ?>

<?php
/**
 * サイト全体のキャンペーン情報を一括取得
 */

global $has_campaign, $cp_title, $cp_trial, $cp_admission, $cp_note;

$cp_args = [
  'category_name' => 'campaign',
  'posts_per_page' => 1,
];
$cp_query = new WP_Query($cp_args);

// 変数の初期化（キャンペーンがない時のデフォルト値）
$has_campaign = false;
$cp_title     = '';
$cp_content   = '';
$cp_trial     = ''; // ACF: new_trial_price
$cp_admission = ''; // ACF: new_admission_price
$cp_note      = ''; // ACF: cp_note

if ($cp_query->have_posts()) :
  while ($cp_query->have_posts()) : $cp_query->the_post();
    $has_campaign = true;
    $cp_title     = get_the_title();
    $cp_content   = get_the_content();
    $cp_trial     = get_field('new_trial_price');
    $cp_admission = get_field('new_admission_price');
    $cp_note      = get_field('cp_note');
  endwhile;
  wp_reset_postdata();
endif;
?>

<!-- 中央メインカラムここから -->
<main class="main-content--center">

  <!-- ヒーローエリア -->
  <section class="hero">
    <video src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/gym-top.mp4" class="hero__video" muted autoplay loop playsinline></video>
    <div class="hero__overlay"></div>
    <div class="hero__inner">
      <div class="hero__txt">
        <h2>Logic & Beauty</h2>
      </div>
      <?php if ($has_campaign) : ?>

        <div class="hero__campaign">
          <div class="campaign__inner">
            <p class="camp__en">LIMITED OFFER</p>
            <h3 class="camp__ttl">
              <?php echo esc_html($cp_title); ?>
            </h3>
            <div class="camp__note">
              <?php echo wp_kses_post($cp_content); ?>
              <?php if ($cp_trial == '0' || $cp_admission == '0'): ?>
                <p class="camp__highlight">今なら初期費用 ¥0 実施中！</p>
                <p class="camp__period"><?php echo esc_html($cp_note); ?></p>
              <?php endif; ?>

            </div>

            <a href="#" class="camp__link">キャンペーンを適用して相談
              <span>→</span>
            </a>
          </div>
        </div>

      <?php endif ?>
    </div>
  </section>

  <!-- ABOUT -->
  <section id="about" class="about">
    <div class="container">
      <h2 class="section__ttl">
        <span class="en-ttl">PHILOSOPHY</span>
        <span class="jp-ttl">選ばれる理由</span>
      </h2>

      <!-- ABOUT内パララックス -->
      <div class="parallax-image__wrap">
        <div class="parallax-bg about_bg-img"></div>
      </div>

      <div class="about__content">
        <h3 class="about__lead">“根拠のないトレーニング”は、<br>もう終わりにしましょう。</h3>
        <p class="about__txt">
          当ジムが追求するのは、一過性の変化ではありません。<br>解剖学に基づいたロジカルなアプローチで、10年後も誇れる体への最短距離を提示します。
        </p>
      </div>
    </div>
  </section>

  <!-- マシン紹介 -->
  <section id="machine" class="machine">
    <div class="container">

      <h2 class="section__ttl">
        <span class="en-ttl">MACHINE</span>
        <span class="jp-ttl">設備紹介</span>
      </h2>

      <div class="machine__gallery">
        <div class="gallery-item large">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/machine001.jpg" alt="メインマシン">
          <p class="machine__name">Prime Fitness: Selection 01</p>
        </div>

        <div class="gallery-group--grid">
          <div class="gallery-item">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/machine002.jpg" alt="マシン画像1">
            <p class="machine__cap">Cardio Area</p>
          </div>
          <div class="gallery-item">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/machine003.jpg" alt="マシン画像2">
            <p class="machine__cap">Free Weights</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 営業日カレンダー -->
  <section id="schedule" class="shop-schedule">
    <div class="container">
      <h2 class="section__ttl">
        <span class="en-ttl">SCHEDULE</span>
        <span class="jp-ttl">営業日</span>
      </h2>
      <div class="calendar">
        <iframe src="https://calendar.google.com/calendar/embed?src=87050263db72cef77d0803366a6127da6583aac01ef3ea4fe959bda543d7089a%40group.calendar.google.com&ctz=Asia%2FTokyo" title="営業日カレンダー" style="border: 0" width="100%" height="450" frameborder="0" scrolling="no"></iframe>
      </div>
      <p class="calendar__caption">※オレンジ色の日は特別営業日です。</p>
    </div>
  </section>

  <!-- トレーナー紹介 -->
  <section id="trainers" class="trainers">
    <div class="container">

      <h2 class="section__ttl">
        <span class="en-ttl">TRAINERS</span>
        <span class="jp-ttl">トレーナー紹介</span>
      </h2>
      <div class="trainer__main-visual">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/gym_trainer.jpg" alt="指導風景">
        <div class="trainer__lead-box">
          <p class="trainer__lead-en">PRO PROFESSIONALISM</p>
          <h3 class="trainer__lead-jp">解剖学に基づいた、<br>妥協なきアプローチ。</h3>
        </div>
      </div>

      <div class="trainer__list">
        <div class="trainer__info">
          <span class="trainer__name">T. YAMADA</span>
          <span class="trainer__status">Head Trainer / NSCA-CPT</span>
        </div>
        <div class="trainer__info">
          <span class="trainer__name">S. SATO</span>
          <span class="trainer__status">Lead Trainer / 健康運動指導士</span>
        </div>
      </div>

      <p class="trainer__bottom-text">
        各トレーナーの日常や最新のボディメイク実績は、<br>公式Instagramにて公開しています。
      </p>
    </div>
  </section>

  <!-- インスタ -->
  <section class="sns-bridge">
    <div class="bridge__inner">
      <div class="bridge__header">
        <span class="en-sub">REAL TIME UPDATE</span>
        <h2 class="bridge__ttl">INSTAGRAM</h2>
        <p class="bridge__caption">ジムの日常と、お客様の変化。</p>
      </div>

      <div class="bridge__visual">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/gym_sns.jpg" alt="Instagram Preview">
      </div>

      <div class="bridge__link_area">
        <p class="bridge__text">
          最新の予約空き状況や、<br>
          トレーニング風景を毎日更新中。
        </p>
        <a href="https://instagram.com" class="insta__link" target="_blank">
          FOLLOW US ON Instagram
          <span>→</span>
        </a>
      </div>
    </div>
  </section>

  <!-- 料金表 -->
  <section id="price" class="price">
    <div class="container">
      <h2 class="section__ttl">
        <span class="en-ttl">PRICE</span>
        <span class="jp-ttl">料金プラン</span>
      </h2>

      <div class="price-card__wrap">
        <div class="price-card">
          <span class="plan__label">RECOMMEND</span>
          <h3 class="plan__name">ボディメイクコース</h3>
          <p class="plan__desc">週2回のトレーニングで<br>確実に体を変えたい方へ</p>
          <div class="plan__price">
            <span class="unit">¥</span>
            <span class="amount">198,000</span>
            <span class="tax">(税込)</span>
          </div>
          <ul class="plan__features">
            <li>全16回 / 1回60分</li>
            <li>食事指導付き</li>
            <li>ウェア・タオル無料レンタル</li>
          </ul>
        </div>

        <div class="price-card--minimal">

          <div class="minimal-item">
            <h4>初回体験トレーニング</h4>
            <p class="price--val">
              <?php
              if ($cp_trial !== '' && $cp_trial !== null) : //入力がある場合 
              ?>
                <span class="strike">¥5,500</span>
                <span class="highlight">
                  ¥<?php echo esc_html($cp_trial); ?>
                </span>
              <?php else : ?>
                ¥5,500
              <?php endif; ?>
            </p>
          </div>

          <div class="minimal-item">
            <h4>入会金</h4>
            <p class="price--val">
              <?php
              if ($cp_admission !== '' && $cp_admission !== null) : //入力がある場合
              ?>
                <span class="strike">¥33,000</span>
                <span class="highlight">¥<?php echo esc_html($cp_admission); ?></span>
              <?php else : ?>
                ¥33,000
              <?php endif; ?>
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- キャンペーンエリア -->
  <?php if ($has_campaign) : ?>

    <section class="campaign" id="campaign">
      <div class="campaign__inner">
        <p class="camp__en">LIMITED OFFER</p>
        <h3 class="camp__ttl">
          <?php echo esc_html($cp_title); ?>
        </h3>
        <div class="camp__note">
          <?php echo wp_kses_post($cp_content); ?>
          <?php if ($cp_trial == '0' || $cp_admission == '0'): ?>
            <p class="camp__highlight">今なら入会金 ¥0 実施中！</p>
            <p class="camp__period"><?php echo esc_html($cp_note); ?></p>
          <?php endif; ?>

        </div>

        <a href="#" class="camp__link">キャンペーンを適用して相談
          <span>→</span>
        </a>
      </div>
    </section>

  <?php endif ?>

  <!-- よくある質問 -->
  <section id="faq" class="faq">

    <div class="container">

      <h2 class="section__ttl">
        <span class="en-ttl">FAQ</span>
        <span class="jp-ttl">よくある質問</span>
      </h2>
      <div class="faq__container">
        <div class="faq__item">
          <h3 class="faq__item-question">初心者ですが大丈夫でしょうか？</h3>
          <p class="faq__item-answer">
            もちろんです。<br>現在通われている方の約8割が未経験からのスタートです。<br>専門のトレーナーがマンツーマンで、お体の状態に合わせたメニューを組ませていただきます。
          </p>
        </div>
        <div class="faq__item">
          <h3 class="faq__item-question">食事制限は厳しいですか？</h3>
          <p class="faq__item-answer">
            「食べない」のではなく「賢く選ぶ」習慣を身につけていただきます。<br>ライフスタイルを無視した制限はリバウンドの元ですので、無理のない範囲でご提案します。
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 利用の流れ -->
  <section id="step" class="step">
    <div class="container">

      <h2 class="section__ttl">
        <span class="en-ttl">RESERVE</span>
        <span class="jp-ttl">ご利用の流れ</span>
      </h2>
      <div class="step__container">
        <div class="step__item">
          <span class="step__item-num">01</span>
          <p class="step__item-txt">
            <strong>公式LINEを追加</strong>
            右のQRコード、または下のボタンから友だち登録。<br>※パソコンではQRコード、スマートフォンではボタンが表示されます。
          </p>
        </div>
        <div class="step__item">
          <span class="step__item-num">02</span>
          <p class="step__item-txt">
            <strong>簡易アンケート回答</strong>
            目的や目標を1分で入力。<br>あなたに最適な提案を準備します。
          </p>
        </div>
        <div class="step__item">
          <span class="step__item-num">03</span>
          <p class="step__item-txt">
            <strong>無料カウンセリング予約</strong>
            カレンダーから希望の日時を選ぶだけで完了。
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 会社概要 -->
  <section id="access" class="access">

    <div class="container">

      <h2 class="section__ttl">
        <span class="en-ttl">ACCESS</span>
        <span class="jp-ttl">会社概要</span>
      </h2>
      <div class="access__container">
        <div class="map__wrapper">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2916.1103914126197!2d141.31162207650559!3d43.0391087919311!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f0ad602066bcbc1%3A0x9a6c0944101cb724!2z5pet5bGx6KiY5b-15YWs5ZyS!5e0!3m2!1sja!2sjp!4v1791511125156!5m2!1sja!2sjp" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" title="店舗所在地の地図"></iframe>
        </div>

        <div class="access__info-list">
          <div class="info__item">
            <span class="info__item-label">GYM NAME</span>
            <p class="info__item-value">Logic & Beauty Personal Gym</p>
          </div>
          <div class="info__item">
            <span class="info__item-label">ADDRESS</span>
            <p class="info__item-value">〒000-0000<br>北海道●●市○○区 1-2-3<br>●●ビル 4F</p>
          </div>
          <div class="info__item">
            <span class="info__item-label">OPEN / CLOSE</span>
            <p class="info__item-value">09:00 - 22:00（最終受付 21:00）</p>
          </div>
          <div class="info__item">
            <span class="info__item-label">STATION</span>
            <p class="info__item-value">○○駅 西口より徒歩5分</p>
          </div>
        </div>

        <a href="https://maps.app.goo.gl/etP7Ux8tSRzX8mFa9" target="_blank" class="map__link-btn">
          Google Mapで見る
        </a>
      </div>
    </div>
  </section>

  <footer class="site-footer">
    <p class="demo-site">このサイトは、ポートフォリオ掲載用のデモサイトです。</p>
    <small>&copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?></small>
  </footer>
</main>

<?php get_footer(); ?>