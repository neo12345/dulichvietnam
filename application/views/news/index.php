<div class="col-lg-7 col-md-7 col-xs-8">
	<h2><?php echo $title; ?></h2>
	
	<?php
	if ($this->session->userdata['user']['type'] == 1)
	{ ?>
	<ul class="nav nav-pills nav-justified">
		<li class="active"><a href="<?php echo base_url('index.php/news/create');?>">Tạo tin mới</a></li>
	</ul>
	<?php } ?>
	<br/>
	<?php foreach ($newsList as $news_item): ?>
			<div class="jumbotron">
				<table>
					<td width="200px">
							<img src="<?php echo $news_item['feature_img'];?>" width="200px"/>
					</td>
					<td>
						<div style="padding: 20px">
							<h3><?php echo $news_item['title']; ?></h3>
							<div class="main">
									<?php echo $news_item['description']; ?>
							</div>
							<p><a href="<?php echo site_url('news/view/'.$news_item['id']); ?>">Đọc thêm</a></p>
						</div>
					</td>
				</table>
			</div>
	<?php endforeach; ?>
	<?php echo $pagination;?>
</div>