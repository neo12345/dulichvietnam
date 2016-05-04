<div class="col-lg-7 col-md-7 col-xs-8">	
	<h2><?php echo $title; ?></h2>
	
	<ul class="nav nav-pills nav-justified">
		<li class="active"><a href="<?php echo base_url('index.php/banners/create');?>">Tạo banner mới</a></li>
	</ul>
	
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Banner</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>	
			<?php foreach ($banners as $banner): ?>
			<tr>
					<td><?php echo $banner['id']; ?></td>
					<td><?php echo $banner['banner']; ?></td>
					<td><a href="<?php echo site_url('banners/edit/'.$banner['id']); ?>">Edit</a></td>
					<td><a href="<?php echo site_url('banners/delete/'.$banner['id']); ?>">Delete</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>