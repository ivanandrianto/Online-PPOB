jQuery.fn.widthEvenIfHidden = function() {
	var width = 0;
  this.evenIfHidden(function(element) {
    width = element.width();
  });
	return width;
}
jQuery.fn.heightEvenIfHidden = function() {
	var height = 0;
  this.evenIfHidden(function(element) {
    height = element.height();
  });
	return height;
}

jQuery.fn.completeHeight = function() {
	return parseInt(this.heightEvenIfHidden()) + parseInt(this.css('padding-top')) + 
		parseInt(this.css('padding-bottom')) + parseInt(this.css('border-top-width')) + 
		parseInt(this.css('border-bottom-width')) + parseInt(this.css('margin-top')) + parseInt(this.css('margin-bottom'));
};
jQuery.fn.completeWidth = function() {
	return parseInt(this.widthEvenIfHidden()) + parseInt(this.css('padding-left')) + 
		parseInt(this.css('padding-right')) + parseInt(this.css('border-left-width')) + 
		parseInt(this.css('border-right-width')) + parseInt(this.css('margin-left')) + parseInt(this.css('margin-right'));
};

function justify_labels($parent, element) {
	if (element == undefined) {
		element = '';
	}
	var max = 0;
  $parent.find(element+'.label').each(function() {
		var width = jQuery(this).completeWidth();
		if (width > max) {
			max = width;
		}
  });
	$parent.find(element+'.label').width(max);
	$parent.find(element+'.actions').css('margin-left', max);
}

jQuery(function($) {
	$('.collapse, .expand').live('click', function(event) {
		event.preventDefault();
		var remove='collapse', add='expand', text='(tampilkan)';
		if ($(this).hasClass('expand')) {
			remove='expand'; add='collapse'; text='(sembunyikan)';
		}
		$(this).removeClass(remove);
		$(this).addClass(add);
		$(this).text(text);
		$(this).parent().parent().find('.toggle').stop().toggle('normal');
	});

	$('p.notice').delay(5000).slideUp();
});

