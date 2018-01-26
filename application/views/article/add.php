<?php
/**
 * Created by PhpStorm.
 * User: CPU01702-local
 * Date: 1/23/2018
 * Time: 12:59 PM
 */

?>

<div class="col-md-6 col-md-offset-3">
	<form action=<?php echo base_url(); ?>index.php/article/add method="post" enctype="multipart/form-data" role="form">
		<legend>New Article</legend>
		<?php
		if(validation_errors())
		{
			echo "<div class='alert alert-danger'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					".validation_errors()."
				</div>";
		}
		if(isset($errors))
		{
			echo "<div class='alert alert-danger'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					".$errors."
				</div>";
		}
		?>
		<div class="form-group">
			<label for="article_name">Article Name</label>
			<input type="text" class="form-control" name="article_name" id="article_name" placeholder="Enter Article Name">
		</div>
		<div class="form-group">
			<label for="article_cat_id">Category</label>
			<select name="article_cat_id" id="article_cat_id" class="form-control">
				<option value=''>-- Select category --</option>
				<?php
				foreach ($cats as $item)
				{
					echo "<option value=$item[cat_id]>$item[cat_name]</option>";
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="article_image">Image</label>
			<input type="file" class="form-control" id="article_image" name="article_image">
		</div>
		<div class="form-group">
			<label for="article_des">Description</label>
			<textarea name="article_des" class="form-control" id="article_des" cols="30" rows="5" placeholder="Short description..."></textarea>
		</div>
		<div class="form-group">
			<label for="article_content">Content</label>
			<textarea name="article_content" class="form-control" id="article_content" cols="30" rows="10" placeholder="Content of this article..."></textarea>
		</div>
		<button type="submit" class="btn btn-primary" name="add">Save</button>
	</form>
</div>
