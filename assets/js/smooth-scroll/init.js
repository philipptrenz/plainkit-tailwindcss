
/*
 * Initiates smooth-scroll on load,
 * provides support for tailwindcss `scroll-*` classes
 */
document.getElementById('smooth-scroll').addEventListener('load', function () {
  new SmoothScroll('a[href*="#"]', {
    ignore: null,
    topOnEmptyHash: true,
    header: '[data-scroll-header]',
    speed: 600,
    speedAsDuration: true,
    easing: 'easeInOutCubic',
    offset: function (anchor, toggle) {
      /* Parses tailwindcss `scroll-` classes and converts to pixel offset */
      for (var i=0; i< anchor.classList.length; i++) {
        var cls = anchor.classList[i];
        if (cls.startsWith('scroll-')) {
          var val = cls.split('-').pop();
          var rem = 0.25 * parseInt(val);
          var px = rem * parseFloat(getComputedStyle(document.documentElement).fontSize);
          return px;
        }
      }
      return 0;
    },
  });
});