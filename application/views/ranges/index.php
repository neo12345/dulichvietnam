<div class="col-lg-7 col-md-7 col-xs-8">	
	<h2><?php echo $title; ?></h2>
	
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Value 1</th>
				<th>Value 2</th>
				<th>Value 3</th>
				<th>Value 4</th>
				<th>Edit</th>
			</tr>
		</thead>
		<tbody>	
			<?php foreach ($ranges as $ranges_item): ?>
			<tr>
					<td><?php echo $ranges_item['name']; ?></td>
					<td><?php echo $ranges_item['value_1']; ?></td>
					<td><?php echo $ranges_item['value_2']; ?></td>
					<td><?php echo $ranges_item['value_3']; ?></td>
					<td><?php echo $ranges_item['value_4']; ?></td>
					<td><a href="<?php echo site_url('ranges/edit/'.$ranges_item['name']); ?>">Edit</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>