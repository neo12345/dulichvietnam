<div class="col-lg-7 col-md-7 col-xs-8">
	<?php
	echo '<h2>'.$news['title'].'</h2>';
	echo '<br/><br/>';
	echo '<b>'.$news['description'].'</b>';
	echo '<br/><br/>';
	echo $news['content'];
	
	echo '<br/><br/>';
	echo '<div class="fb-like" data-href="'.site_url('news/view').'/'.$news['id'].'" data-width="200" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>';
	echo '<div class="fb-comments" data-href="'.site_url('news/view').'/'.$news['id'].'" data-numposts="5"></div>';
	
	if ($this->session->userdata['user']['type'] == 1)
	{
		echo '<ul class="nav nav-tabs nav-justified">';
		echo '<li><a href="'.base_url('index.php/news/edit').'/'.$news['id'].'">Sửa tin</a></li>';
		echo '<li><a href="'.base_url('index.php/news/delete').'/'.$news['id'].'">Xóa tin</a></li>';
		echo '</ul>';
	}
?>
</div>