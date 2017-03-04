<style type='text/css'>
#dt-btt{
	text-align:center;
	position:fixed;
	cursor:pointer;
	display:none;
	bottom:70px;
	right:-2px;
}
</style>

<div id='dt-btt'><img src="../images/go_top.png"/></div>

<script type='text/javascript'>
$(function(){$(window).scroll(function(){if($(this).scrollTop()!=0){$('#dt-btt').fadeIn();}else{$('#dt-btt').fadeOut();}});$('#dt-btt').click(function(){$('body,html').animate({scrollTop:0},500);});});
</script>