/*
// .product-gallery
*/
const initProductGallery = function(element, layout) {
  layout = layout !== undefined ? layout : 'standard';

  const options = {
    dots: false,
    margin: 10,
    rtl: isRTL(),
  };
  const layoutOptions = {
    'product-sidebar': {
      responsive: {
        1400: {items: 8, margin: 10},
        1200: {items: 6, margin: 10},
        992: {items: 8, margin: 10},
        768: {items: 8, margin: 10},
        576: {items: 6, margin: 10},
        420: {items: 5, margin: 8},
        0: {items: 4, margin: 8}
      },
    },
    'product-full': {
      responsive: {
        1400: {items: 6, margin: 10},
        1200: {items: 5, margin: 8},
        992: {items: 7, margin: 10},
        768: {items: 5, margin: 8},
        576: {items: 6, margin: 8},
        420: {items: 5, margin: 8},
        0: {items: 4, margin: 8}
      }
    },
    quickview: {
      responsive: {
        992: {items: 5},
        520: {items: 6},
        440: {items: 5},
        340: {items: 4},
        0: {items: 3}
      }
    },
  };

  const gallery = $(element);

  const image = gallery.find('.product-gallery__featured .owl-carousel');
  const carousel = gallery.find('.product-gallery__thumbnails .owl-carousel');

  image
    .owlCarousel({items: 1, dots: false, rtl: isRTL()})
    .on('changed.owl.carousel', syncPosition);

  carousel
    .on('initialized.owl.carousel', function () {
      carousel.find('.product-gallery__thumbnails-item').eq(0).addClass('product-gallery__thumbnails-item--active');
    })
    .owlCarousel($.extend({}, options, layoutOptions[layout]));

  carousel.on('click', '.owl-item', function(e){
    e.preventDefault();

    image.data('owl.carousel').to($(this).index(), 300, true);
  });

  gallery.find('.product-gallery__zoom').on('click', function() {
    openPhotoSwipe(image.find('.owl-item.active').index());
  });

  image.on('click', '.owl-item > a', function(event) {
    event.preventDefault();

    openPhotoSwipe($(this).closest('.owl-item').index());
  });

  function getIndexDependOnDir(index) {
    // we need to invert index id direction === 'rtl' because photoswipe do not support rtl
    if (isRTL()) {
      return image.find('.owl-item img').length - 1 - index;
    }

    return index;
  }

  function openPhotoSwipe(index) {
    const photoSwipeImages = image.find('.owl-item a').toArray().map(function(element) {
      const img = $(element).find('img')[0];
      const width = $(element).data('width') || img.naturalWidth;
      const height = $(element).data('height') || img.naturalHeight;

      return {
        src: element.href,
        msrc: element.href,
        w: width,
        h: height,
      };
    });

    if (isRTL()) {
      photoSwipeImages.reverse();
    }

    const photoSwipeOptions = {
      getThumbBoundsFn: index => {
        const imageElements = image.find('.owl-item img').toArray();
        const dirDependentIndex = getIndexDependOnDir(index);

        if (!imageElements[dirDependentIndex]) {
          return null;
        }

        const tag = imageElements[dirDependentIndex];
        const width = tag.naturalWidth;
        const height = tag.naturalHeight;
        const rect = tag.getBoundingClientRect();
        const ration = Math.min(rect.width / width, rect.height / height);
        const fitWidth = width * ration;
        const fitHeight = height * ration;

        return {
          x: rect.left + (rect.width - fitWidth) / 2 + window.pageXOffset,
          y: rect.top + (rect.height - fitHeight) / 2 + window.pageYOffset,
          w: fitWidth,
        };
      },
      index: getIndexDependOnDir(index),
      bgOpacity: .9,
      history: false
    };

    const photoSwipeGallery = new PhotoSwipe($('.pswp')[0], PhotoSwipeUI_Default, photoSwipeImages, photoSwipeOptions);

    photoSwipeGallery.listen('beforeChange', () => {
      image.data('owl.carousel').to(getIndexDependOnDir(photoSwipeGallery.getCurrentIndex()), 0, true);
    });

    photoSwipeGallery.init();
  }

  function syncPosition (el) {
    let current = el.item.index;

    carousel
      .find('.product-gallery__thumbnails-item')
      .removeClass('product-gallery__thumbnails-item--active')
      .eq(current)
      .addClass('product-gallery__thumbnails-item--active');
    const onscreen = carousel.find('.owl-item.active').length - 1;
    const start = carousel.find('.owl-item.active').first().index();
    const end = carousel.find('.owl-item.active').last().index();

    if (current > end) {
      carousel.data('owl.carousel').to(current, 100, true);
    }
    if (current < start) {
      carousel.data('owl.carousel').to(current - onscreen, 100, true);
    }
  }
};

$(function() {
  $('.product').each(function () {
    const gallery = $(this).find('.product-gallery');

    if (gallery.length > 0) {
      initProductGallery(gallery[0], gallery.data('layout'));
    }
  });
});
