<div class="col-lg-7 col-md-7 col-xs-8">
	<h2><?php echo $title; ?></h2>
	
	<?php echo validation_errors(); ?>
	
	<?php echo form_open('posts/edit'); ?>
		
		<div class="form-group">
			<input type="hidden" name="id" value="<?php if($this->input->post('id')) {echo $this->input->post('id');} else {echo $posts['id'];}?>" /><br />
		</div>
		
		<div class="form-group">	
			<label for="title">Tiêu đề</label>
			<input class="form-control" type="input" name="title" value="<?php if($this->input->post('title')) {echo $this->input->post('title');} else {echo $posts['title'];}?>" /><br />
		</div>
		
		<div class="form-group">		
			<label for="title">Ảnh đại điện</label>
			<input class="form-control" type="input" name="feature_img" value="<?php if($this->input->post('feature_img')) {echo $this->input->post('feature_img');} else {echo $posts['feature_img'];}?>" /><br />
		</div>
		
		<div class="form-group">		
			<label for="title">Mô tả</label>
			<input class="form-control" type="input" name="description" value="<?php if($this->input->post('description')) {echo $this->input->post('description');} else {echo $posts['description'];}?>"/><br />
		</div>
			
		<div class="form-group">
			<label for="text">Nội dung</label>
			<textarea class="form-control" name="content"><?php if($this->input->post('content')) {echo $this->input->post('content');} else {echo $posts['content'];}?></textarea><br />
		</div>
			
		<button type="submit" class="button">Sửa bài viết</button>
	
	</form>
</div>