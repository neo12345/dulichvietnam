<div class="col-lg-7 col-md-7 col-xs-8">
	<h2><?php echo $title; ?></h2>
	
	<?php if(validation_errors())
	{ ?>
	<div class="alert alert-danger fade in">
	<?php echo validation_errors(); ?>
	</div>
	<?php } ?>
	
	<?php echo form_open('useranswers/edit'); ?>
		
		<div class="form-group">
			<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" />
		</div>
		
		<div class="form-group">
			<label for="title">Bạn muốn được giới thiệu địa điểm hay giới thiệu tour du lịch?</label><br/>
				<label class="checkbox-inline"><input class="form-control" type="radio" name="places_or_tours" value="0"/>Địa điểm</label>
				<label class="checkbox-inline"><input class="form-control" type="radio" name="places_or_tours" value="1"/>Tour</label>
			<br/>
		</div>
		
		<div class="form-group">
			<label for="title">Bạn muốn thời gian của chuyến du lịch như thế nào?</label><br/>
			<label>Mức độ quan trọng của thời gian chuyến du lịch:</label>
			<select class="form-control" name="time_priotity">
				<option value="0">Không quan trọng</option>
				<option value="0.25">Hơi quan trọng</option>
				<option value="0.5">Tương đối quan trọng</option>
				<option value="0.75">Khá quan trọng</option>
				<option value="1">Rất quan trọng</option>
			</select>
			<br/>
			<label>Bạn muốn khoảng thời gian dài bao lâu:</label>
			<select class="form-control" name="time">
				<option value="-1">Không</option>
				<option value="-0.5">Hơi</option>
				<option value="0">Tương đối</option>
				<option value="0.5">Khá</option>
				<option value="1">Rất</option>
			</select>
			<select class="form-control" name="time_short_long">
				<option value="0">Ngắn</option>
				<option value="1">Dài</option>
			</select>
			<br/>
			<br/>
		</div>
		
		<div class="form-group">
			<label for="title">Bạn muốn chi phí của chuyến du lịch như thế nào</label><br/>
			<label>Mức độ quan trọng của chi phí chuyến đi</label>
			<select class="form-control" name="cost_priotity">
				<option value="0">Không quan trọng</option>
				<option value="0.25">Hơi quan trọng</option>
				<option value="0.5">Tương đối quan trọng</option>
				<option value="0.75">Khá quan trọng</option>
				<option value="1">Rất quan trọng</option>
			</select>
			<br/>
			<label>Bạn muốn khoảng chi phí như thế nào </label>
			<select class="form-control" name="cost">
				<option value="-1">Không</option>
				<option value="-0.5">Hơi</option>
				<option value="0">Tương đối</option>
				<option value="0.5">Khá</option>
				<option value="1">Rất</option>
			</select>
			<select class="form-control" name="cost_low_high">
				<option value="0">Rẻ</option>
				<option value="1">Đắt</option>
			</select>
			<br/>
			<br/>
		</div>
		
		<div class="form-group">
			<label for="title">Bạn muốn chất lượng cho chuyến du lịch của mình như thế nào?</label><br/>
			<label>Mức độ quan trọng của chất lượng trong chuyến đi của bạn</label>
			<select class="form-control" name="quality_priotity">
				<option value="0">Không quan trọng</option>
				<option value="0.25">Hơi quan trọng</option>
				<option value="0.5">Tương đối quan trọng</option>
				<option value="0.75">Khá quan trọng</option>
				<option value="1">Rất quan trọng</option>
			</select>
			<br/>
			<label>Bạn muốn chất lượng chuyến đi của mình như thế nào? </label>
			<select class="form-control" name="quality">
				<option value="-1">Không</option>
				<option value="-0.5">Hơi</option>
				<option value="0">Tương đối</option>
				<option value="0.5">Khá</option>
				<option value="1">Rất</option>
			</select>
			<select class="form-control" name="quality_low_high">
				<option value="0">Thấp</option>
				<option value="1">Cao</option>
			</select>
			<br/>
			<br/>
		</div>	
			
		<div class="form-group">
			<label for="title">Bạn muốn đến những nơi như thế này không?</label>
			<br/>
			<label>Mức độ quan trọng của yếu tố du lịch tự nhiên trong chuyến du lịch của bạn</label>
			<select class="form-control" name="nature_priotity">
				<option value="0">Không quan trọng</option>
				<option value="0.25">Hơi quan trọng</option>
				<option value="0.5">Tương đối quan trọng</option>
				<option value="0.75">Khá quan trọng</option>
				<option value="1">Rất quan trọng</option>
			</select>
			<br/>
			<label>Bạn muốn yếu tố tự nhiên trong chuyến du lịch của mình như thế nào? </label>
			<select class="form-control" name="nature">
				<option value="-1">Không</option>
				<option value="-0.5">Hơi</option>
				<option value="0">Tương đối</option>
				<option value="0.5">Khá</option>
				<option value="1">Rất</option>
			</select>
			<select class="form-control" name="nature_low_high">
				<option value="0">Ít</option>
				<option value="1">Nhiều</option>
			</select>
			<br/>
			<br/>
		</div>
		
		<div class="form-group">
			<label for="title">Bạn thấy những địa điểm này như thế nào?</label>
			<br/>
			<label>Mức độ quan trọng của yếu tố du lịch khám phá trong chuyến đi của bạn</label>
			<select class="form-control" name="adventure_priotity">
				<option value="0">Không quan trọng</option>
				<option value="0.25">Hơi quan trọng</option>
				<option value="0.5">Tương đối quan trọng</option>
				<option value="0.75">Khá quan trọng</option>
				<option value="1">Rất quan trọng</option>
			</select>
			<br/>
			<label>Bạn muốn mức độ du lịch khám phá trong chuyến đi của mình như thế nào</label>
			<select class="form-control" name="adventure">
				<option value="-1">Không</option>
				<option value="-0.5">Hơi</option>
				<option value="0">Tương đối</option>
				<option value="0.5">Khá</option>
				<option value="1">Rất</option>
			</select>
			<select class="form-control" name="adventure_low_high">
				<option value="0">Ít</option>
				<option value="1">Nhiều</option>
			</select>
			<br/>
			<br/>
		</div>
		
		<div class="form-group">
			<label for="title">Bạn thấy những địa điểm du lịch này như thế nào?</label>
			<br/>
			<label>Mức độ quan trọng của yếu tố du lịch tâm linh trong chuyên đi của bạn</label>
			<select class="form-control" name="religious_priotity">
				<option value="0">Không quan trọng</option>
				<option value="0.25">Hơi quan trọng</option>
				<option value="0.5">Tương đối quan trọng</option>
				<option value="0.75">Khá quan trọng</option>
				<option value="1">Rất quan trọng</option>
			</select>
			<br/>
			<label>Bạn muốn yếu tố tâm linh trong chuyến du lịch của mình như thế nào</label>
			<select class="form-control" name="religious">
				<option value="-1">Không</option>
				<option value="-0.5">Hơi</option>
				<option value="0">Tương đối</option>
				<option value="0.5">Khá</option>
				<option value="1">Rất</option>
			</select>
			<select class="form-control" name="religious_low_high">
				<option value="0">Ít</option>
				<option value="1">Nhiều</option>
			</select>
			<br/>
			<br/>
		</div>
		
		<div class="form-group">
			<label for="title">Bạn có thích những điểm du lịch sau đây không?</label>
			<br/>
			<label>Mức độ quan trọng của yếu tố du lịch nghỉ dưỡng trong chuyến đi của bạn</label>
			<select class="form-control" name="health_or_medical_priotity">
				<option value="0">Không quan trọng</option>
				<option value="0.25">Hơi quan trọng</option>
				<option value="0.5">Tương đối quan trọng</option>
				<option value="0.75">Khá quan trọng</option>
				<option value="1">Rất quan trọng</option>
			</select>
			<br/>
			<label>Bạn muốn yếu tố du lịch nghỉ dưỡng tròn chuyến đi của mình như thế nào?</label>
			<select class="form-control" name="health_or_medical">
				<option value="-1">Không</option>
				<option value="-0.5">Hơi</option>
				<option value="0">Tương đối</option>
				<option value="0.5">Khá</option>
				<option value="1">Rất</option>
			</select>
			<select class="form-control" name="health_or_medical_low_high">
				<option value="0">Ít</option>
				<option value="1">Nhiều</option>
			</select>
			<br/>
			<br/>
		</div>
	
		<button type="submit" class="button">Trả lời</button>
	
	</form>
</div>