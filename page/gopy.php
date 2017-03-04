<div class="heading">
	<span class="heading-label">Góp ý</span>
</div>

<form action="/page/xuly/gopy.php?act=do" method="post" class="gopy">
    <label class="label-gopy">Email :</label>
	<input name="email" class="input-gopy" type="email"/>
    <br>
    
	<label class="label-gopy">Họ và Tên :</label>
    <input name="fullname" class="input-gopy"  type="text"/>
    <br>
	
    <label class="label-comment2">Nội dung :</label>
	<textarea name="noidung" class="input-comment2" rows="10" cols="50"></textarea>
    
	<input class="submit-gopy" value="Gửi" type="submit"> 
	<input class="submit-gopy" value="Nhập lại" type="reset">
</form>