<div class="col-lg-7 col-md-7 col-xs-8">
	<h2><?php echo $title; ?></h2>
	
	<ul class="nav nav-pills nav-justified">
		<li class="active"><a href="<?php echo base_url('index.php/news/create');?>">Tạo tin mới</a></li>
	</ul>
	
	<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tiêu đề</th>
			<th>Ảnh đại diện</th>
			<th>Mô tả</th>
			<th>Chi tiết</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($newsList as $news_item): ?>
		<tr>
			<td><?php echo $news_item['id']; ?></td>
			<td><?php echo $news_item['title']; ?></td>
			<td><img src="<?php echo $news_item['feature_img']; ?>" width="100px"/></td>
                        <td><?php echo $news_item['description']; ?></td>
			<td><a href="<?php echo site_url('news/view/'.$news_item['id']); ?>">Xem chi tiết</a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	</table>
	<?php echo $pagination;?>
	
</div>