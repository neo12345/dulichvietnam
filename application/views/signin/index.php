<div class="col-lg-7 col-md-7 col-xs-8">
	<h2><?php echo $title; ?></h2>
	
	<?php if(validation_errors())
	{ ?>
	<div class="alert alert-danger fade in">
	<?php echo validation_errors();
	if(isset($check) && !$check)
	{
		echo 'Tài khoản không tồn tại hoặc nhập sai username, password!';
	}?>
	</div>
	<?php } ?>
	
	<?php echo form_open('signin/sign_in'); ?>
		
		<div class="form-group">
		<label for="username">Tên tài khoản</label>
		<input class="form-control" type="input" name="username" /><br />
		</div>
		
		<div class="form-group">
		<label for="password">Mật khẩu</label>
		<input class="form-control" type="password" name="password"/><br />
		</div>
		
	<!--	<div class="form-group">
		<label for="remember_me">Remember me</label>
		<input class="form-control" type="checkbox" name="remember_me" /><br />
		</div> -->
		
		<button type="submit" class="button">Đăng nhập</button>
	
	</form>
</div>