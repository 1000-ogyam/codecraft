(function () {
  'use strict';

  var LUCIDE_CDN = 'https://unpkg.com/lucide@0.469.0/dist/umd/lucide.min.js';

  window.lucideIcon = function (name, className) {
    var cls = className ? ' class="' + className + '"' : '';
    return '<i data-lucide="' + name + '"' + cls + ' aria-hidden="true"></i>';
  };

  function initIcons() {
    if (typeof lucide !== 'undefined') {
      lucide.createIcons();
    }
  }

  window.refreshIcons = initIcons;

  if (window.lucide) {
    initIcons();
  } else if (!document.querySelector('script[data-lucide-loader]')) {
    var script = document.createElement('script');
    script.src = LUCIDE_CDN;
    script.setAttribute('data-lucide-loader', 'true');
    script.onload = initIcons;
    document.head.appendChild(script);
  }

  document.addEventListener('DOMContentLoaded', initIcons);
})();
