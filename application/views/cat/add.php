<?php
/**
 * Created by PhpStorm.
 * User: CPU01702-local
 * Date: 1/23/2018
 * Time: 12:59 PM
 */

?>

<div class="col-md-6 col-md-offset-3">
	<form action=<?php echo base_url(); ?>index.php/category/add method="post" role="form">
		<legend>New Category</legend>
		<?php
		if(validation_errors())
		{
			echo "<div class='alert alert-danger'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					".validation_errors()."
				</div>";
		}
		?>
		<div class="form-group">
			<label for="cat_name">Category Name</label>
			<input type="text" class="form-control" name="cat_name" id="cat_name" placeholder="Enter Category Name">
		</div>
		<div class="form-group">
			<label for="cat_parent_id">Category Parent</label>
			<select name="cat_parent_id" id="cat_parent_id" class="form-control">
				<option value='0'>-- Select category parent --</option>
				<?php
				foreach ($cats as $item)
				{
					echo "<option value=$item[cat_id]>$item[cat_name]</option>";
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="cat_des">Description</label>
			<textarea name="cat_des" class="form-control" id="cat_des" cols="30" rows="5" placeholder="Write something about category..."></textarea>
		</div>
		<button type="submit" class="btn btn-primary" name="add">Save</button>
	</form>
</div>
