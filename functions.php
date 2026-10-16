<?php

// タイトルタグ
function my_theme_setup()
{
  // タイトルタグを自動生成
  add_theme_support('title-tag');

  // カスタムロゴ有効化
  add_theme_support('custom-logo', [
    'height' => 100,
    'width' => 300,
    'flex-height' => true,
    'flex-width' => true,
  ]);
}
add_action('after_setup_theme', 'my_theme_setup');

function my_enqueue_google_fonts()
{
  $font_url = 'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans+JP:wght@100..900&display=swap';

  wp_enqueue_style('my-google-fonts', $font_url, array(), null);
}
add_action('wp_enqueue_scripts', 'my_enqueue_google_fonts');


function my_enqueue_scripts()
{
  wp_enqueue_script(
    'main-script', // 識別名
    get_theme_file_uri('/assets/js/main.js'), // ファイルのパス
    array(),
    filemtime(get_theme_file_path('/assets/js/main.js')), // バージョン
    true // </body>の前に出力
  );
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

// CSSの読み込み
function my_theme_enqueue_styles()
{
  // 自分のCSS
  wp_enqueue_style(
    'my-css',
    get_theme_file_uri('/assets/css/main.css'),
    array(),
    filemtime(get_theme_file_path('/assets/css/main.css'))
  );
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
