<div class="col-lg-7 col-md-7 col-xs-8">
	<h2><?php echo $title; ?></h2>
	
	<?php 
	if ($this->session->userdata['user']['type'] == 1)
	{
	?>
	<ul class="nav nav-pills nav-justified">
		<li class="active"><a href="<?php echo base_url('index.php/places/create');?>">Tạo địa điểm du lịch mới</a></li>
	</ul>	
	<?php }?>
	
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
		<?php foreach ($placesList as $places_item): ?>
		<tr>
			<td><?php echo $places_item['id']; ?></td>
			<td><?php echo $places_item['title']; ?></td>
			<td><img src="<?php echo $places_item['feature_img']; ?>" width="100px"/></td>
                        <td><?php echo $places_item['description']; ?></td>
			<td><a href="<?php echo site_url('places/view/'.$places_item['id']); ?>">Xem chi tiết</a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	</table>
	<?php echo $pagination;?>
	
</div>