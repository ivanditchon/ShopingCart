$(document).ready(function(){
	$bheight = $("body").height();
	$sheight = $('.scrollbar').height();
	$sliderheight = $sheight/$bheight*100;
	$('.slider').height($sliderheight+'%');
	$('.slider').draggable({
		containment:'parent',
		axis:'y',
		drag.function(){
			$pos = $('.slider').position().top;
			$scrollpercent = $pos/$sheight*100;
			$scrollpx = $scrollpercent/100*$bheight;
			$('body').scrollTop($scrollpx);
		}
	})
})