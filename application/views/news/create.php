<div class="col-lg-7 col-md-7 col-xs-8">
	<h2><?php echo $title; ?></h2>
	
	<?php if(validation_errors())
	{ ?>
	<div class="alert alert-danger fade in">
	<?php echo validation_errors(); ?>
	</div>
	<?php } ?>
	
	<?php echo form_open('news/create'); ?>
	
		<div class="form-group">
			<label for="title">Tiêu đề</label>
			<input class="form-control" type="input" name="title" value="<?php if($this->input->post('title')) {echo $this->input->post('title');}?>"/><br />
		</div>
		
		<div class="form-group">
			<label for="title">Ảnh đại diện</label>
			<input class="form-control" type="input" name="feature_img" value="<?php if($this->input->post('feature_img')) {echo $this->input->post('feature_img');}?>"/><br />
		</div>
		
		<div class="form-group">
			<label for="title">Mô tả</label>
			<input class="form-control" type="input" name="description" value="<?php if($this->input->post('description')) {echo $this->input->post('description');}?>"/><br />
		</div>
		
		<div class="form-group">
			<label for="text">Nội dung</label>
			<textarea class="form-control" name="content"><?php if($this->input->post('content')) {echo $this->input->post('content');}?></textarea><br />
		</div>		
	
		<button type="submit" class="button">Tạo tin mới</button>
	
	</form>
</div>