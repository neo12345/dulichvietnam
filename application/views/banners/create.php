<div class="col-lg-7 col-md-7 col-xs-8">
	<h2><?php echo $title; ?></h2>
	
	<?php if(validation_errors())
	{ ?>
	<div class="alert alert-danger fade in">
	<?php echo validation_errors(); ?>
	</div>
	<?php } ?>
	
	<?php echo form_open('banners/create'); ?>
	
		<label for="title">Banner</label>
		<textarea name="banner" class="form-control"><?php if($this->input->post('banner')) {echo $this->input->post('banner');}?></textarea><br />
			
		<input type="submit" name="submit" value="Create" />
	
	</form>
</div>