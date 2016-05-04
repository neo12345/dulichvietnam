<div class="container-fluid">
<div class="row">
<div class="col-lg-2 col-md-2 col-xs-1">
	<ul class="nav nav-pills nav-stacked leftbar">
	<?php if(!isset($this->session->userdata['user']['id']))
	{
	?> 
	<li><a href="<?php echo base_url('index.php/signup/index');?>">Đăng kí</a></li>
	<li><a href="<?php echo base_url('index.php/signin/index');?>">Đăng nhập</a></li>
	<?php 
	}
	else
	{ 
	$id = $this->session->userdata['user']['id'];
	?>
	<li><a href="<?php echo base_url('index.php/accounts/view/'.$id);?>">Thông tin tài khoản</a></li>
	<li><a href="<?php echo base_url('index.php/signout/index');?>">Đăng xuất</a></li>
	<?php }?>
	
	<?php if($this->session->userdata['user']['type'] == 1)
	{
	?>
        <li><a href="<?php echo base_url('index.php/news/lists');?>">Quản lí tin tức</a></li>
        <li><a href="<?php echo base_url('index.php/posts/lists');?>">Quản lí bài viết</a></li>
        <li><a href="<?php echo base_url('index.php/places/lists');?>">Quản lí địa điểm</a></li>
        <li><a href="<?php echo base_url('index.php/tours/lists');?>">Quản lí tour</a></li>
	<li><a href="<?php echo base_url('index.php/accounts/index');?>">Quản lí tài khoản</a></li>
	<li><a href="<?php echo base_url('index.php/ranges/index');?>">Quản lí các khoảng giá trị</a></li>
	<li><a href="<?php echo base_url('index.php/banners/lists');?>">Quản lí các banner</a></li>
	<?php }?>
	</ul>
</div>
