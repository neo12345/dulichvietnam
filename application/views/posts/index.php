<div class="col-lg-7 col-md-7 col-xs-8">	
	<h2><?php echo $title; ?></h2>
	
	<?php
	if ($this->session->userdata['user']['type'] == 1)
	{ ?>
	<ul class="nav nav-pills nav-justified">
		<li class="active"><a href="<?php echo base_url('index.php/posts/create');?>">Tạo bài viết mới</a></li>
	</ul>
	<?php } ?>
	
	<?php foreach ($postsList as $posts_item): ?>
			<div class="jumbotron">
				<table>
					<td width="200px">
						<img src="<?php echo $posts_item['feature_img'];?>" width="200px"/>
					</td>
					<td>
						<div style="padding:20px">
							<h3><?php echo $posts_item['title']; ?></h3>
							<div class="main">
									<?php echo $posts_item['description']; ?>
							</div>
							<p><a href="<?php echo site_url('posts/view/'.$posts_item['id']); ?>">View article</a></p>
						</div>
					</td>
				</table>
			</div>
	<?php endforeach; ?>
	<?php echo $pagination;?>
</div>