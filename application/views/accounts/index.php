<div class="col-lg-7 col-md-7 col-xs-8">
	<h2><?php echo $title; ?></h2>
	
	<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tên tài khoản</th>
			<th>Địa chỉ Email</th>
			<th>Năm sinh</th>
			<th>Giới tính</th>
			<th>Loại tài khoản</th>
			<th>Chi tiết</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($accountsList as $accounts_item): ?>
		<tr>
			<td><?php echo $accounts_item['id']; ?></td>
			<td><?php echo $accounts_item['username']; ?></td>
			<td><?php echo $accounts_item['email']; ?></td>
			<td><?php echo $accounts_item['DOB']; ?></td>
			<td><?php echo $accounts_item['sex']; ?></td>
			<td><?php if($accounts_item['type']) {echo 'Quản lí';} else {echo 'Thành viên';} ?></td>
			<td><a href="<?php echo site_url('accounts/view/'.$accounts_item['id']); ?>">Xem chi tiết</a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	</table>
	<?php echo $pagination;?>
	
</div>