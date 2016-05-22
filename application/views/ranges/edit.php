<div class="col-lg-7 col-md-7 col-xs-8">
	<h2><?php echo $title; ?></h2>
	
	<?php if(validation_errors())
	{ ?>
	<div class="alert alert-danger fade in">
	<?php echo validation_errors(); ?>
	</div>
	<?php } ?>
	
	<?php echo form_open('ranges/edit'); ?>
	
		<input type="hidden" name="name" value="<?php if($this->input->post('name')) {echo $this->input->post('name');} else {echo $ranges['name'];}?>" /><br />
	
		<label for="title">Value 1</label>
		<input type="input" name="value_1" value="<?php if($this->input->post('value_1')) {echo $this->input->post('value_1');} else {echo $ranges['value_1'];}?>" /><br />
		
		<label for="title">Value 2</label>
		<input type="input" name="value_2" value="<?php if($this->input->post('value_2')) {echo $this->input->post('value_2');} else {echo $ranges['value_2'];}?>" /><br />
		
		<label for="title">Value 3</label>
		<input type="input" name="value_3" value="<?php if($this->input->post('value_3')) {echo $this->input->post('value_3');} else {echo $ranges['value_3'];}?>" /><br />
		
		<label for="title">Value 4</label>
		<input type="input" name="value_4" value="<?php if($this->input->post('value_4')) {echo $this->input->post('value_4');} else {echo $ranges['value_4'];}?>" /><br />
			
		<input type="submit" name="submit" value="Edit" />
	
	</form>
</div>