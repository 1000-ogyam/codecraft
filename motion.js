(function () {
  window.toggleNav = function () {
    var nav = document.getElementById('navbar');
    if (nav) nav.classList.toggle('open');
  };

  var mobile = window.matchMedia('(max-width: 900px)');

  document.querySelectorAll('.has-sub > a').forEach(function (link) {
    link.setAttribute('aria-haspopup', 'true');
    link.setAttribute('aria-expanded', 'false');
    link.addEventListener('click', function (e) {
      if (!mobile.matches) return;
      e.preventDefault();
      var item = link.parentElement;
      var willOpen = !item.classList.contains('open');
      document.querySelectorAll('.has-sub.open').forEach(function (el) {
        el.classList.remove('open');
        var trigger = el.querySelector(':scope > a');
        if (trigger) trigger.setAttribute('aria-expanded', 'false');
      });
      item.classList.toggle('open', willOpen);
      link.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
    });
  });

  document.addEventListener('click', function (e) {
    if (e.target.closest('.has-sub') || e.target.closest('.nav-burger')) return;
    document.querySelectorAll('.has-sub.open').forEach(function (el) {
      el.classList.remove('open');
    });
  });

  var nav = document.getElementById('navbar');
  if (nav && document.body.classList.contains('home')) {
    var onScroll = function () { nav.classList.toggle('scrolled', window.scrollY > 24); };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var hero = document.getElementById('heroFilm');
  var stage = document.getElementById('heroStage');
  var glow = document.getElementById('heroGlow');
  if (hero && stage && !reduce && !mobile.matches) {
    hero.addEventListener('pointermove', function (e) {
      var rect = hero.getBoundingClientRect();
      var x = (e.clientX - rect.left) / rect.width;
      var y = (e.clientY - rect.top) / rect.height;
      hero.classList.add('is-pointer');
      stage.style.transform = 'scale(1.1) translate(' + ((0.5 - x) * 36) + 'px, ' + ((0.5 - y) * 22) + 'px)';
      if (glow) {
        glow.style.setProperty('--mx', (x * 100) + '%');
        glow.style.setProperty('--my', (y * 100) + '%');
      }
    });
    hero.addEventListener('pointerleave', function () {
      hero.classList.remove('is-pointer');
      stage.style.transform = '';
    });
  }

  var heroVideo = document.getElementById('heroVideo');
  if (heroVideo && reduce) {
    heroVideo.removeAttribute('autoplay');
    heroVideo.pause();
    var poster = document.getElementById('heroPoster');
    if (poster) poster.hidden = false;
    heroVideo.hidden = true;
  }

  if (reduce || !('IntersectionObserver' in window)) return;

  var nodes = document.querySelectorAll(
    '.card, .service-item, .case-card, .testi-card, .product-card, .process-step, .portfolio-card, .price-card, .offer-card, .work-card, .svc-card, .other-card, .retainer-card, .term-card, .intro-stat, .page-header h1, .section-title, .feat-feature'
  );
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('in');
      io.unobserve(entry.target);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -32px 0px' });

  nodes.forEach(function (el, i) {
    el.classList.add('rise');
    el.style.setProperty('--rise-delay', (i % 5) * 60 + 'ms');
    io.observe(el);
  });
})();
