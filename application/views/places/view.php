<div class="col-lg-7 col-md-7 col-xs-8">	
	<?php
		echo '<h2>'.$places['title'].'</h2>';
		echo '<br/><br/>';
		echo '<b>'.$places['description'].'</b>';
		echo '<br/><br/>';
		echo $places['content'];
		echo '<br/>';
		echo '<b>Địa điểm: </b>'.$places['destination'];
		echo '<br/>';
		echo '<b>Thời gian cần thiết dự kiến: </b>'.$places['time'];
		echo '<br/>';
		echo '<b>Chi phí dự kiến: </b>'.$places['cost'];
		echo '<br/>';
		echo '<b>Chất lượng: </b>'.$places['quality'];
		echo '<br/>';
		echo '<b>Yếu tố du lịch tự nhiên: </b>'.$places['nature'];
		echo '<br/>';
		echo '<b>Yếu tố du lịch khám phá: </b>'.$places['adventure'];
		echo '<br/>';
		echo '<b>Yếu tố du lịch tâm linh: </b>'.$places['religious'];
		echo '<br/>';
		echo '<b>Yếu tố du lịch nghỉ dưỡng: </b>'.$places['health_or_medical'];
		
		echo '<br/><br/>';
		?>
		
		<input type="hidden" id="latitude" name="latitude" value="<?php echo $places['latitude'];?>"/>
		<input type="hidden" id="longitude" name="latitude" value="<?php echo $places['longitude'];?>"/>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
		<script>
		function initialize() {
		  var $latitude = document.getElementById('latitude').value;
		  var $longitude = document.getElementById('longitude').value;
		  var mapProp = {
			center:new google.maps.LatLng($latitude, $longitude),
			zoom:9,
			mapTypeId:google.maps.MapTypeId.ROADMAP
		  };
		  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
		}
		google.maps.event.addDomListener(window, 'load', initialize);
		</script>
		
		<div id="googleMap" style="width:500px;height:380px;"></div>
		<?php
		echo '<div class="fb-like" data-href="'.site_url('places/view').'/'.$places['id'].'" data-width="200" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>';
		echo '<div class="fb-comments" data-href="'.site_url('places/view').'/'.$places['id'].'" data-numposts="5"></div>';
		
	if ($this->session->userdata['user']['type'] == 1)
	{
		echo '<ul class="nav nav-tabs nav-justified">';
		echo '<li><a href="'.base_url('index.php/places/edit').'/'.$places['id'].'">Sửa thông tin địa điểm</a></li>';
		echo '<li><a href="'.base_url('index.php/places/delete').'/'.$places['id'].'">Xóa địa điểm</a></li>';
		echo '</ul>';
	}
?>
</div>