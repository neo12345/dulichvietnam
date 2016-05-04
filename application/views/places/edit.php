<div class="col-lg-7 col-md-7 col-xs-8">	
	<h2><?php echo $title; ?></h2>
	
	<?php echo validation_errors(); ?>
	
	<?php echo form_open('places/edit'); ?>
	<div class="form-group">
		<input class="form-control" type="hidden" name="id" value="<?php if($this->input->post('id')) {echo $this->input->post('id');} else {echo $places['id'];}?>" /><br />
	</div>
	
	<div class="form-group">
		<label for="title">Tiêu đề</label>
		<input class="form-control" type="input" name="title" value="<?php if($this->input->post('title')) {echo $this->input->post('title');} else {echo $places['title'];}?>" /><br />
	</div>
		
	<div class="form-group">	
		<label for="title">Ảnh đại diện</label>
		<input class="form-control" type="input" name="feature_img" value="<?php if($this->input->post('feature_img')) {echo $this->input->post('feature_img');} else {echo $places['feature_img'];}?>" /><br />
	</div>
	
	<div class="form-group">
		<label for="title">Mô tả</label>
		<input type="input" name="description" value="<?php if($this->input->post('description')) {echo $this->input->post('description');} else {echo $places['description'];}?>"/><br />
	</div>
	
	<div class="form-group">
		<label for="text">Nội dụng</label>
		<textarea class="form-control" name="content"><?php if($this->input->post('content')) {echo $this->input->post('content');} else {echo $places['content'];}?></textarea><br />
	</div>
	
	<div class="form-group">	
		<label for="title">Địa điểm</label>
		<input class="form-control" type="input" name="destination" value="<?php if($this->input->post('destination')) {echo $this->input->post('destination');} else {echo $places['destination'];}?>"/><br />
	</div>
	
	<div class="form-group">	
		<label for="title">Thời gian dự kiến</label>
		<input class="form-control" type="input" name="time" value="<?php if($this->input->post('time')) {echo $this->input->post('time');} else {echo $places['time'];}?>"/><br />
	</div>
	
	<div class="form-group">
		<label for="title">Chi phí dự kiến</label>
		<input class="form-control" type="input" name="cost" value="<?php if($this->input->post('cost')) {echo $this->input->post('cost');} else {echo $places['cost'];}?>"/><br />
	</div>
	
	<div class="form-group">
		<label for="title">Chất lượng</label>
		<input class="form-control" type="input" name="quality" value="<?php if($this->input->post('quality')) {echo $this->input->post('quality');} else {echo $places['quality'];}?>"/><br />
	</div>
		
	<div class="form-group">	
		<label for="title">Yếu tố du lịch tự nhiên</label>
		<select class="form-control" name="nature">
			<option value="Không có">Không có</option>
			<option value="Khá ít">Khá ít</option>
			<option value="Tương đối">Tương đối</option>
			<option value="Khá nhiều">Khá nhiều</option>
			<option value="Rất nhiều">Rất nhiều</option>
		</select>
		<br/>
	</div>
	
	<div class="form-group">	
		<label for="title">Yếu tố du lịch khám phá</label>
		<select class="form-control" name="adventure">
			<option value="Không có">Không có</option>
			<option value="Khá ít">Khá ít</option>
			<option value="Tương đối">Tương đối</option>
			<option value="Khá nhiều">Khá nhiều</option>
			<option value="Rất nhiều">Rất nhiều</option>
		</select>
		<br/>
	</div>
		
	<div class="form-group">	
		<label for="title">Yếu tố du lịch tâm linh</label>
		<select class="form-control" name="religious">
			<option value="Không có">Không có</option>
			<option value="Khá ít">Khá ít</option>
			<option value="Tương đối">Tương đối</option>
			<option value="Khá nhiều">Khá nhiều</option>
			<option value="Rất nhiều">Rất nhiều</option>
		</select>
		<br/>
	</div>
		
	<div class="form-group">	
		<label for="title">Yếu tố du lịch nghỉ dưỡng</label>
		<select class="form-control" name="health_or_medical">
			<option value="Không có">Không có</option>
			<option value="Khá ít">Khá ít</option>
			<option value="Tương đối">Tương đối</option>
			<option value="Khá nhiều">Khá nhiều</option>
			<option value="Rất nhiều">Rất nhiều</option>
		</select>
		<br/>
	</div>
		
	<div class="form-group">		
		 <div id="map" style="width:500px; height:500px"></div>
	 	 <input class="form-control" type="text" name="latitude" id="latitude" value="<?php if($this->input->post('latitude')) {echo $this->input->post('latitude');} else {echo $tours['latitute'];}?>">
  	 	 <input class="form-control" type="text" name="longitude" id="longitude" value="<?php if($this->input->post('longitude')) {echo $this->input->post('longitude');} else {echo $tours['longitude'];}?>">
		 
		 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
		 <script>
		  function initialize() {
			var $latitude = document.getElementById('latitude');
			var $longitude = document.getElementById('longitude');
			var latitude = document.getElementById('latitude').value;
			var longitude = document.getElementById('longitude').value;
			var zoom = 5;
			
			var LatLng = new google.maps.LatLng(latitude, longitude);
			
			var mapOptions = {
			  zoom: zoom,
			  center: LatLng,
			  panControl: false,
			  zoomControl: false,
			  scaleControl: true,
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			}  
			
			var map = new google.maps.Map(document.getElementById('map'),mapOptions);
			
			var marker = new google.maps.Marker({
			  position: LatLng,
			  map: map,
			  title: 'Drag Me!',
			  draggable: true
			});
			
			google.maps.event.addListener(marker, 'dragend', function(marker){
			  var latLng = marker.latLng;
			  $latitude.value = latLng.lat();
			  $longitude.value = latLng.lng();
			});
			
		  }
		  initialize();
		  </script>

	</div>	
	
		<button type="submit" class="button">Sửa thông tin</button>
	
	</form>
</div>