<?php
/**
 * Created by PhpStorm.
 * User: CPU01702-local
 * Date: 1/23/2018
 * Time: 12:59 PM
 */

?>
<div class="col-md-6 col-md-offset-3">
	<form action=<?php echo base_url(); ?>index.php/category/edit/<?php echo $cat['cat_id'];?> method="post" role="form">
		<legend>Edit Category: <?php echo $cat['cat_name']; ?></legend>
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
			<label for="cat_id">Category ID</label>
			<input type="text" class="form-control" name="cat_id" value="<?php echo $cat['cat_id']; ?>" id="cat_id" disabled>
		</div>
		<div class="form-group">
			<label for="cat_name">Category Name</label>
			<input type="text" class="form-control" name="cat_name" value="<?php echo $cat['cat_name']; ?>" id="cat_name" placeholder="Enter Category Name">
		</div>
		<div class="form-group">
			<label for="cat_parent_id">Category Parent</label>
			<select name="cat_parent_id" id="cat_parent_id" class="form-control">
				<option value='0'>-- Select category parent --</option>
				<?php
				foreach ($cats as $item)
				{
					if($item['cat_id'] != $cat['cat_id']) {
						$selected = ($item['cat_id'] == $cat['cat_parent_id']) ? 'selected' : '';
						echo "<option value=$item[cat_id] $selected>$item[cat_name]</option>";
						$selected = '';
					}
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="cat_des">Description</label>
			<textarea name="cat_des" class="form-control" id="cat_des" cols="30" rows="5"
					  placeholder="Write something about category..."><?php echo $cat['cat_name']; ?></textarea>
		</div>
		<div class="clearfix">
			<button type="submit" class="btn btn-primary pull-right" name="edit">Save</button>
			<a href=<?php echo base_url(); ?>index.php/category/delete/<?php echo $cat['cat_id']; ?>
			   role="button" class="btn btn-danger"
			   onclick="return confirm('Are you want to remove this category?');">Delete</a>
		</div>
	</form>
</div>
