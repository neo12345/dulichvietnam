<div class="col-lg-7 col-md-7 col-xs-8">
	<h2><?php echo $title; ?></h2>
	
	<?php if(validation_errors())
	{ ?>
	<div class="alert alert-danger fade in">
	<?php echo validation_errors(); ?>
	</div>
	<?php } ?>
	
	<?php echo form_open('signup/create'); ?>
		
		<div class="form-group">
			<label for="username">Tên tài khoản</label>
			<input class="form-control" type="input" name="username" /><br />
		</div>
		
		<div class="form-group">	
			<label for="password">Mật khẩu</label>
			<input class="form-control" type="password" name="password"/><br />
		</div>
		
		<div class="form-group">		
			<label for="passconf">Xác nhận mật khẩu</label>
			<input class="form-control" type="password" name="passconf" /><br />
		</div>
		
		<div class="form-group">	
			<label for="email">Địa chỉ email</label>
			<input class="form-control" type="email" name="email"/><br />
		</div>
		
		<div class="form-group">		
			<label for="DOB">Ngày tháng năm sinh</label>
			<input class="form-control" type="date" name="DOB" /><br />
		</div>
		
		<div class="form-group">	
			<label for="sex">Giới tính</label>
			<select class="form-control" name="sex">
				<option value="Nam">Nam</option>
				<option value="Nữ">Nữ</option>
			</select><br/>
		</div>
			
		<button type="submit" class="button">Tạo tài khoản mới</button>
	
	</form>
</div>