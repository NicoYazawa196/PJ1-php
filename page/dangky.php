<div class="heading">
	<span class="heading-label">Tạo tài khoản</span>
</div>
<form action="/page/xuly/dangky.php?act=do" method="post" class="sign-form"/>
	<label class="sign-label">Tên đăng nhập :</label>
	<input class="sign-input" type="text" name="username" required/>
    <br>
       
	<label class="sign-label">Mật khẩu :</label>
	<input class="sign-input" type="password" name="password" required/>
    <br>
    
	<label class="sign-label">Nhập lại mật khẩu :</label>
	<input class="sign-input" type="password" name="verify_password" required/>
    <br>
      
	<label class="sign-label">Email :</label>
	<input class="sign-input" type="email" placeholder="email@mail.com"name="email"/>
    <br>
    
    <label class="sign-label">Họ và Tên :</label>
    <input class="sign-input" type="text" name="fullname"/>
    <br>
    
	<label class="sign-label">Ngày sinh :</label>
		<input class="sign-input" type="text" placeholder="DD/MM/YYYY" name="birthday"/>
    <br>
    
	<label class="sign-label">Địa chỉ :</label>
	<input class="sign-input" type="text" name="address"/>
    <br>
    
	<label class="sign-label">Số điện thoại :</label>
	<input class="sign-input" type="tel" name="tel"/>
    <br>
    
	<input class="sign-submit" type="submit" value="Tạo tài khoản"/> 
</form>