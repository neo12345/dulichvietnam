<?php header('Access-Control-Allow-Origin: *'); ?>
	<table class="table">
		<tbody>	
			<?php foreach ($banners as $banner_item): ?>
			<tr>
					<td><?php echo $banner_item['banner']; ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>