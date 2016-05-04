<div class="col-lg-7 col-md-7 col-xs-8">
	<?php
	echo '<h2>Tài khoản: '.$accounts['username'].'</h2>';
	echo '<br/><br/>';
	echo '<b>Địa chỉ Email: </b>'.$accounts['email'];
	echo '<br/>';
	echo '<b>Năm sinh: </b>'.$accounts['DOB'];
	echo '<br/>';
	echo '<b>Giới tính: </b>'.$accounts['sex'];
	echo '<br/><br/>';
	
	echo '<ul class="nav nav-tabs nav-justified">';
	echo '<li><a href="'.base_url('index.php/useranswers/create').'/'.$accounts['id'].'">Trả lời câu hỏi</a></li>';
	if($this->session->userdata['user']['type'] == 1 || $this->session->userdata['user']['id'] == $accounts['id'])
	{
	echo '<li><a href="'.base_url('index.php/accounts/edit').'/'.$accounts['id'].'">Sửa thông tin tài khoản</a></li>';
	}
	if($this->session->userdata['user']['type'] == 1)
	{
	echo '<li><a href="'.base_url('index.php/accounts/delete').'/'.$accounts['id'].'">Xóa tài khoản</a></li>';
	}
	echo '</ul>';
?>
</div>