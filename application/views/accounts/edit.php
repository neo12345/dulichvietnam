<div class="col-lg-7 col-md-7 col-xs-8">
	<h2><?php echo $title; ?></h2>
	
	<?php echo validation_errors(); ?>
	
	<?php echo form_open('accounts/edit'); ?>
	
	<div class="form-group">
		<input type="hidden" name="id" value="<?php if($this->input->post('id')) {echo $this->input->post('id');} else {echo $accounts['id'];}?>" /><br />
	</div>
	
	<div class="form-group">
		<label for="title">Tên tài khoản</label>
		<input class="form-control" type="input" name="username" value="<?php if($this->input->post('username')) {echo $this->input->post('username');} else {echo $accounts['username'];}?>" /><br />
	</div>
		
	<div class="form-group">	
		<label for="password">Mật khẩu</label>
		<input class="form-control" type="password" name="password"/><br />
	</div>
	
	<div class="form-group">
		<label for="password">Xác nhận mật khẩu</label>
		<input class="form-control" type="password" name="passconf"/><br />
	</div>
	
	<div class="form-group">
		<label for="email">Địa chỉ email</label>
		<input class="form-control" type="input" name="email" value="<?php if($this->input->post('email')) {echo $this->input->post('email');} else {echo $accounts['email'];}?>"/><br />
	</div>
	
	<div class="form-group">	
		<label for="DOB">Ngày sinh</label>
		<input class="form-control" type="date" name="DOB" /><br />
	</div>
	
	<div class="form-group">	
		<label for="title">Giới tính</label>
		<select class="form-control" name="sex">
		<option value="Nam">Nam</option>
		<option value="Nữ">Nữ</option>
		</select><br/>
	</div>	
	
	<?php if($this->session->userdata['user']['type'] == 1)
	{	?>
	<div class="form-group">	
		<label for="title">Loại tài khoản</label>
		<input class="form-control" type="input" name="type" value="<?php if($this->input->post('type')) {echo $this->input->post('type');} else {echo $accounts['type'];}?>"/><br />
	</div>
	<?php } ?>
	
	<div class="form-group">	
		<button type="submit">Sửa thông tin tài khoản</button>
	</div>
	</form>
</div>