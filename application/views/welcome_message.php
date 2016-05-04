<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-lg-7 col-md-7 col-xs-8">	
	<ul class="nav nav-tabs">
	  <li class="active"><a data-toggle="tab" href="#news">Tin tức mới</a></li>
	  <li><a data-toggle="tab" href="#posts">Bài viết mới</a></li>
	  <li><a data-toggle="tab" href="#places">Địa điểm du lịch</a></li>
	  <li><a data-toggle="tab" href="#tours">Tour du lịch</a></li>
	</ul>

	<div class="tab-content">
	  <div id="news" class="tab-pane fade in active">
		<h2>Tin tức mới</h2><br/>
		<?php foreach ($newsList as $news)
		{
			echo '<div class="jumbotron">';
			echo '<table>';
			echo '<td width="200px">';
			echo '<img src="'.$news['feature_img'].'" width="200px"/>';
			echo '</td>';
			echo '<td>';
			echo '<div style="padding: 20px">';
			echo '<b>'.$news['title'].'</b><br/>';
			echo $news['description'];
			echo '<br/><a href='.site_url('news/view/'.$news['id']).'>Read more</a>';
			echo '<div>';
			echo '</td>';
			echo '</table>';
			echo '</div>';
			echo '<br/>';
			echo '<br/>';
		}?>
	  </div>
	  
	  <div id="posts" class="tab-pane fade">
		<h2>Bài viết mới</h2><br/>
		<?php foreach ($postsList as $post)
		{
			echo '<div class="jumbotron">';
			echo '<table>';
			echo '<td width="200px">';
			echo '<img src="'.$post['feature_img'].'" width="200px"/>';
			echo '</td>';
			echo '<td>';
			echo '<div style="padding: 20px">';
			echo '<b>'.$post['title'].'</b><br/>';
			echo $post['description'];
			echo '<br/><a href='.site_url('posts/view/'.$post['id']).'>Read more</a>';
			echo '</div>';
			echo '</td>';
			echo '</table>';
			echo '</div>';
			echo '<br/>';
			echo '<br/>';
		}?>
	  </div>
	  
	  <div id="places" class="tab-pane fade">
		<h2>Địa điểm du lịch</h2><br/>
		<?php foreach ($placesList as $place)
		{
			echo '<div class="jumbotron">';
			echo '<table>';
			echo '<td width="200px">';
			echo '<img src="'.$place['feature_img'].'" width="200px"/>';
			echo '</td>';
			echo '<td>';
			echo '<div style="padding: 20px">';
			echo '<b>'.$place['title'].'</b><br/>';
			echo $place['description'];
			echo '<br/><a href='.site_url('places/view/'.$place['id']).'>Read more</a>';
			echo '</div>';
			echo '</td>';
			echo '</table>';
			echo '</div>';
			echo '<br/>';
			echo '<br/>';
		}?>
	  </div>
	  
	  <div id="tours" class="tab-pane fade">
		<h2>Tour du lịch</h2><br/>
		<?php foreach ($toursList as $tour)
		{
			echo '<div class="jumbotron">';
			echo '<table>';
			echo '<td width="200px">';
			echo '<img src="'.$post['feature_img'].'" width="200px"/>';
			echo '</td>';
			echo '<td>';
			echo '<div style="padding: 20px">';
			echo '<b>'.$tour['title'].'</b><br/>';
			echo $tour['description'];
			echo '<br/><a href='.site_url('tours/view/'.$tour['id']).'>Read more</a>';
			echo '</div>';
			echo '</td>';
			echo '</table>';
			echo '</div>';
			echo '<br/>';
			echo '<br/>';
		}?>
	  </div>
	</div>
</div>