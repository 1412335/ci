{include file="./partials/head.tpl" title="New Category"}
{include file="./partials/topbar.tpl"}
{include file="./partials/sidebar.tpl"}

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">New Category</h3>
					<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
					<!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="col-md-12">
						<form action={$base_url}tpl/category/add method="post" enctype="multipart/form-data" role="form">
							{if $errors}
								<div class='alert alert-danger alert-dismissable'>
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									{$errors}
								</div>
							{/if}
							<div class="form-group">
								<label for="cat_name">Category Name</label>
								<input type="text" class="form-control" name="cat_name" id="cat_name" placeholder="Enter Category Name">
							</div>
							<div class="form-group">
								<label for="cat_parent_id">Category Parent</label>
								<select name="cat_parent_id" id="cat_parent_id" class="form-control select2">
									<option value='0'>-- Select category parent --</option>
									{html_options options="$cats"}
								</select>
							</div>
							<div class="form-group">
								<label for="cat_status">Category Status</label>
								<select name="cat_status" id="cat_status" class="form-control select2">
									{html_options options="$cats_status"}
								</select>
							</div>
							<div class="form-group">
								<label for="cat_thumbnail">Image</label>
								<input type="file" class="form-control" id="cat_thumbnail" name="cat_thumbnail">
							</div>
							<div class="form-group">
								<label for="cat_des">Description</label>
								<textarea name="cat_des" class="form-control" id="cat_des" cols="30" rows="5" placeholder="Write something about category.."></textarea>
							</div>
							<button type="submit" class="btn btn-primary btn-flat" name="add">Save</button>
						</form>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</section>

{include file="./partials/foot.tpl"}
