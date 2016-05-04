<div class="col-lg-7 col-md-7 col-xs-8">
	<h2><?php echo $title; ?></h2>
	
	<?php echo validation_errors(); ?>
	
	<?php echo form_open('banners/edit'); ?>
	
		<input type="hidden" name="id" value="<?php if($this->input->post('id')) {echo $this->input->post('id');} else {echo $banner['id'];}?>" /><br />
	
		<label for="title">Banner</label>
		<textarea name="banner" class="form-control"><?php if($this->input->post('banner')) {echo $this->input->post('banner');} else {echo $banner['banner'];}?></textarea><br />
			
		<input type="submit" name="submit" value="Edit" />
	
	</form>
</div>