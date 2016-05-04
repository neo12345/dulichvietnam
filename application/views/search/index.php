<div class="col-lg-7 col-md-7 col-xs-8">
	<h1><?php echo $title;?></h1>
	<br/>
	<?php echo validation_errors(); ?>
	
	<ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#news">Tin tức du lịch</a></li>
		  <li><a data-toggle="tab" href="#posts">Bài viết du lịch</a></li>
		  <li><a data-toggle="tab" href="#places">Địa điểm du lịch</a></li>
		  <li><a data-toggle="tab" href="#tours">Tour du lịch</a></li>
	</ul>	
	<div class="tab-content">
		  <div id="news" class="tab-pane fade in active">
			<h2>Tin tức du lịch</h2><br/>
			<?php 
			if($newsList)
			{
				foreach ($newsList as $news)
				{
					echo '<table>';
					echo '<td>';
					echo '<img src="'.$news['feature_img'].'" width="200px"/>';
					echo '</td>';
					echo '<td>';
					echo '<b>'.$news['title'].'</b><br/>';
					echo $news['description'];
					echo '<br/><a href='.site_url('news/view/'.$news['id']).'>Read more</a>';
					echo '</td>';
					echo '</table>';
					echo '<br/>';
					echo '<br/>';
				}
			}
			else
			{
				echo 'Found Nothing';
			}
			?>
			<br/>
		  </div>
		  
		  <div id="posts" class="tab-pane fade">
			<h2>Bài viết du lịch</h2><br/>
			<?php 
			if($postsList)
			{
				foreach ($postsList as $post)
				{
					echo '<table>';
					echo '<td>';
					echo '<img src="'.$post['feature_img'].'" width="200px"/>';
					echo '</td>';
					echo '<td>';
					echo '<b>'.$post['title'].'</b><br/>';
					echo $post['description'];
					echo '<br/><a href='.site_url('posts/view/'.$post['id']).'>Read more</a>';
					echo '</td>';
					echo '</table>';
					echo '<br/>';
					echo '<br/>';
				}
			}
			else
			{
				echo 'Found Nothing';
			}
			?>
			<br/>
		  </div>
		  
		  <div id="places" class="tab-pane fade">
			<h2>Địa điểm du lịch</h2><br/>
			<?php 
			if($placesList)
			{
				foreach ($placesList as $place)
				{
					echo '<table>';
					echo '<td>';
					echo '<img src="'.$place['feature_img'].'" width="200px"/>';
					echo '</td>';
					echo '<td>';
					echo '<b>'.$place['title'].'</b><br/>';
					echo $place['description'];
					echo '<br/><a href='.site_url('places/view/'.$place['id']).'>Read more</a>';
					echo '</td>';
					echo '</table>';
					echo '<br/>';
					echo '<br/>';
				}
			}
			else
			{
				echo 'Found Nothing';
			}?>
			<br/>
		  </div>
		  
		  <div id="tours" class="tab-pane fade">
			<h2>Tour du lịch</h2><br/>
			<?php 
			if($toursList)
			{
				foreach ($toursList as $tour)
				{
					echo '<table>';
					echo '<td>';
					echo '<img src="'.$post['feature_img'].'" width="200px"/>';
					echo '</td>';
					echo '<td>';
					echo '<b>'.$tour['title'].'</b><br/>';
					echo $tour['description'];
					echo '<br/><a href='.site_url('tours/view/'.$tour['id']).'>Read more</a>';
					echo '</td>';
					echo '</table>';
					echo '<br/>';
				echo '<br/>';
				}
			}
			else
			{
				echo 'Found Nothing';
			}?>
		  </div>
		</div>
</div>