<div class="col-lg-7 col-md-7 col-xs-8">	
	<?php
		echo '<h2>'.$tours['title'].'</h2>';
		echo '<br/><br/>';
		echo '<b>'.$tours['description'].'</b>';
		echo '<br/><br/>';
		echo $tours['content'];
		echo '<br/>';
		echo '<b>Địa điểm: </b>'.$tours['destination'];
		echo '<br/>';
		echo '<b>Thời gian: </b>'.$tours['time'];
		echo '<br/>';
		echo '<b>Chi phí: </b>'.$tours['cost'];
		echo '<br/>';
		echo '<b>Chất lượng: </b>'.$tours['quality'];
		echo '<br/>';
		echo '<b>Yếu tố du lịch tự nhiên: </b>'.$tours['nature'];
		echo '<br/>';
		echo '<b>Yếu tố du lịch khám phá: </b>'.$tours['adventure'];
		echo '<br/>';
		echo '<b>Yếu tố du lịch tâm linh: </b>'.$tours['religious'];
		echo '<br/>';
		echo '<b>Yếu tố du lịch nghỉ dưỡng: </b>'.$tours['health_or_medical'];
		echo '<br/><br/>';
		?>
		<input type="hidden" id="latitude" name="latitude" value="<?php echo $tours['latitude'];?>"/>
		<input type="hidden" id="longitude" name="latitude" value="<?php echo $tours['longitude'];?>"/>
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
		echo '<div class="fb-like" data-href="'.site_url('tours/view').'/'.$tours['id'].'" data-width="200" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>';
		echo '<div class="fb-comments" data-href="'.site_url('tours/view').'/'.$tours['id'].'" data-numposts="5"></div>';
		
	if ($this->session->userdata['user']['type'] == 1)
	{
		echo '<ul class="nav nav-tabs nav-justified">';
		echo '<li><a href="'.base_url('index.php/tours/edit').'/'.$tours['id'].'">Sửa thông tin tour</a></li>';
		echo '<li><a href="'.base_url('index.php/tours/delete').'/'.$tours['id'].'">Xóa tour</a></li>';
		echo '</ul>';
	}
?>
</div>