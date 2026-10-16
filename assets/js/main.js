// ハンバーガーメニュー
document.addEventListener('DOMContentLoaded', () => {
  const menuTrigger = document.getElementById('menuTrigger');
  const fullMenu = document.getElementById('fullMenu');
  const menuLinks = document.querySelectorAll('.full-menu .nav__list .nav__link');

  if (!menuTrigger) return;

  menuTrigger.addEventListener('click', () => {
    const isOpen = fullMenu.classList.toggle('is-open');

    menuTrigger.classList.toggle('active');
    menuTrigger.setAttribute("aria-expanded", String(isOpen));
  });

  // ページ内リンクをクリックしたら閉じる
  menuLinks.forEach(link => {
    link.addEventListener('click', () => {
      fullMenu.classList.remove('is-open');
      menuTrigger.classList.remove('active');
      menuTrigger.setAttribute("aria-expanded", "false");
    });
  });
});

// PCサイドメニューのカレント表示
document.addEventListener('DOMContentLoaded', () => {
  const navLinks = document.querySelectorAll('.side__nav .nav__link');
  const sections = document.querySelectorAll('section[id]');

  const options = {
    root: null,
    // 検知エリア
    rootMargin: '-20% 0px -60% 0px',
    threshold: 0
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const id = entry.target.getAttribute('id');

        navLinks.forEach(link => {
          link.classList.remove('is-current');

          // absolute URL対策として endsWith もしくは getAttribute を精査
          const href = link.getAttribute('href');
          if (href === `#${id}` || href?.endsWith(`#${id}`)) {
            link.classList.add('is-current');
          }
        });
      }
    });
  }, options);

  sections.forEach(section => observer.observe(section));
});

// QRコードフォーカス
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    const rightSide = document.querySelector('.is-right .side__content'); // 右カラムを選択
    if (entry.isIntersecting) {
      rightSide.classList.add('is-shining'); // 範囲内に入ったらクラス追加
    } else {
      rightSide.classList.remove('is-shining'); // 外れたら外す
    }
  });
}, { threshold: 0.5 }); // セクションが50%見えたら発火

// 「ご利用の流れ」セクションを監視
const stepSection = document.querySelector('.step');
if (stepSection) {
  observer.observe(stepSection);
}

// スマホ用バー
// スクロール量が300pxを超えたら表示させる
window.addEventListener('scroll', () => {
  const bar = document.querySelector('.mobile__action-bar');
  if (window.scrollY > 300) {
    bar.style.transform = 'translateY(0)';
    bar.style.opacity = '1';
  } else {
    bar.style.transform = 'translateY(100px)';
    bar.style.opacity = '0';
  }
});