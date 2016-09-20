/**
	Portfolio
	@see http://bootsnipp.com/snippets/k231Q
*/
jQuery('#portfolioModal').on('show.bs.modal', function (event) {

  var elem = jQuery(event.relatedTarget);
  var item = portfolioItems[elem.data('item')];
  var modal = jQuery(this);

  modal.find('.modal-title').text(item.title);
  modal.find('.modal-description').text(item.description);
  if (item.url !== '') {
    modal.find('.modal-url').show();
    modal.find('.modal-url').find('a').find('span').text(item.url);
    modal.find('.modal-url').find('a').attr('href', item.url);
  } else {
    modal.find('.modal-url').hide();
  }

  modal.find('.modal-tags').text('');
  if (item.tags) {
    var tags = Object.keys(item.tags).map(function (key) {return item.tags[key]});
    tags.forEach(function(tag, index, array) {
      modal.find('.modal-tags').append(
        '<span class="label label-default">' + tag + '</span> '
      );
    });
  }

  modal.find('.modal-images').find('.carousel-inner').text('');
  modal.find('.modal-images').find('.nav').text('');
  item.images.forEach(function(element, index, array) {
    var active = index === 0 ? 'active' : '';
    modal.find('.modal-images').find('.carousel-inner').append(
      '<div class="item ' + active +  '"><img src="' + element.image + '" alt="' + index + '"></div>'
    );
    modal.find('.modal-images').find('.nav').append(
      '<li data-target="#modalImagesCarousel" data-slide-to="' + index + '" class="' + active + '">' +
      '<a href="#" data-id="' + index + '"><img src="' + element.image + '" alt="' + index + '"></a>' +
      '</li>'
    );
  });

});

/**
 * @see http://bootsnipp.com/snippets/featured/colourful-tabbed-slider-carousel
 */
jQuery(document).ready( function() {
	var clickEvent = false;
	jQuery('#portfolioModal').on('click', '.nav a', function(e) {
			clickEvent = true;
			jQuery('.nav li').removeClass('active');
			jQuery(this).parent().addClass('active');
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = jQuery('.nav').children().length -1;
			var current = jQuery('.nav li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				jQuery('.nav li').first().addClass('active');
			}
		}
		clickEvent = false;
	});
});
