<div class="col-lg-7 col-md-7 col-xs-8">
	<?php
	echo '<h2>'.$posts['title'].'</h2>';
	echo '<br/><br/>';
	echo '<b>'.$posts['description'].'</b>';
	echo '<br/><br/>';
	echo $posts['content'];
	
	echo '<br/><br/>';
	echo '<div class="fb-like" data-href="'.site_url('posts/view').'/'.$posts['id'].'" data-width="200" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>';
	echo '<div class="fb-comments" data-href="'.site_url('posts/view').'/'.$posts['id'].'" data-numposts="5"></div>';
	
	if ($this->session->userdata['user']['type'] == 1)
	{
		echo '<ul class="nav nav-tabs nav-justified">';
		echo '<li><a href="'.base_url('index.php/posts/edit').'/'.$posts['id'].'">Sửa bài viết</a></li>';
		echo '<li><a href="'.base_url('index.php/posts/delete').'/'.$posts['id'].'">Xóa bài viết</a></li>';
		echo '</ul>';
	}
	?>
</div>