<div id="wrap-slide">
<div id="slideshow">
  <ul>
   <li class="current"><a href="index.php/?page=thongtinsach&masach=1"><img src="../images/Banner_1.jpg"/></a></li>
   <li><a href="index.php/?page=theloai&matheloai=1"><img src="images/../images/Banner_2.jpg"/></a></li>
   <li><a href="index.php/?page=thongtinsach&masach=3"><img src="images/../images/Banner_3.jpg"/></a></li>
   <li><a href="index.php/?page=theloai&matheloai=5"><img src="images/../images/Banner_4.jpg"/></a></li>
  </ul>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		run_slideshow(2500);

	});

	function slideshow(prev){
		var slides = $('#slideshow li');
		var currElem = slides.filter('.current');
		var lastElem = slides.filter(':last');
		var firstElem = slides.filter(':first');

		// Xác định phần tử kế tiếp là prev hay next
		var nextElem = (prev)? currElem.prev() : currElem.next();
		if(prev){
			if(firstElem.attr('class') == 'current') nextElem = lastElem;
		}else if(lastElem.attr('class') == 'current')nextElem = firstElem;
		
		fadeElem(currElem,nextElem);
		widegetStatus(slides);
	}

	function wideget(index){
		var slides = $('#slideshow li');
		var currElem = slides.filter('.current');
		var nextElem = slides.eq(index);

		fadeElem(currElem,nextElem);
		widegetStatus(slides);
	}

	function widegetStatus(slides){
		slides.each(function(index){
			if($(this).attr('class') == 'current')
				$('#controlNav a').removeClass('active').eq(index).addClass('active');
		});
	}

	function fadeElem(currElem,nextElem){
	if(!$.browser.msie){
		currElem.removeClass('current').find('img') .css({'z-index':'50'}) .end() .find('p') .css({'z-index':'50'});
		nextElem.addClass('current').find('img') .css({'opacity': '0','z-index':'100'}) .animate({opacity: 1}, 700, function(){
			currElem.find('img') .css({'z-index': '0'});
		}).end().find('p') .css({'height':'0','z-index':'100','opacity': '0'}).delay(700).animate({height: 50,opacity: 1},500, function(){
			currElem.find('p') .css({'z-index': '0'});
		});
	}else{
		currElem.removeClass('current').find('img') .css({'z-index':'50'}) .end() .find('p') .css({'z-index':'50'});
		nextElem.addClass('current').find('img') .css({'opacity': '0','z-index':'100'}) .animate({opacity: 1}, 700, function(){
			currElem.find('img') .css({'z-index': '0'});
		}).end().find('p') .css({'height':'0','z-index':'100'}).delay(700).animate({height: 50},500, function(){
			currElem.find('p') .css({'z-index': '0'});
		});
	}
	}

	function run_slideshow(time){
		var idset =setInterval('slideshow()', time);
		var liarr =$('#slideshow ul li');
		var controlNav =$('#controlNav');
		var str='';
		for(var i=0; i<liarr.length; i++){
			str+='<a></a>';
		}
/*		controlNav.append(str);
		controlNav.children().each(function(index){
			$(this).click(function(){
				wideget(index);clearInterval(idset);
				idset =setInterval('slideshow()', time);
			});
		}).eq(0).addClass('active');

		$('#next').click(function(){
			slideshow(); clearInterval(idset);
			idset =setInterval('slideshow()', time);
		});
		$('#prev').click(function(){
			slideshow(true); clearInterval(idset);
			idset =setInterval('slideshow()', time);
		});*/
	}
</script>