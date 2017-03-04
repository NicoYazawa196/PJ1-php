<?php
if (isset($_POST['Submit'])) {
    $tk = $_POST['tukhoa'];
    header("location:index.php?page=timkiem&tukhoa=$tk");
}
?>

<div class="logo">
	<a href="/index.php"><img src="../images/logo.png"/></a>
</div>

<div class="giohang-img"><img src="../images/shopping.png"/></div>
<div class="giohang"><a href="/index.php?page=giohang">Giỏ hàng (<?php
if (isset($_SESSION['card'])) {
    echo count($_SESSION['card']);
} else { 

    echo "0";
}
?>)</a></div>

<div class="search">
	<form method="post" action="">
		<input type="text" value="Tìm kiếm..." class="s" id="s" name="tukhoa"/>
		<input type="submit" class="searchsubmit" value="" name="Submit"/>
	</form>
</div>

<script>
(function($){
	text = $('.s').attr('value');

	$('.s').focusin(function(){
		$(this).val("");
	});

	$('.s').focusout(function(){
		$(this).val(text);
	});
})(jQuery);
</script>