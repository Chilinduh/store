    var revapi;
    jQuery(document).ready(function($) {

      $('.slider-preload').hide();
      $('.tp-banner-container').css({'visibility': 'visible', 'opacity': '1'});
      revapi = $('.tp-banner-1525938982707').revolution({
                 delay:5000,
                 startwidth: 950,
                 startheight:450,
                 startWithSlide: 0,
                 hideThumbs:10,
                 fullWidth:"off",
                 navigationType: "bullet",
                 navigationStyle: "round",
                 navigationArrows: "none",
                 fullScreen: 'off',
                 hideTimerBar: 'off'
                 })

    })