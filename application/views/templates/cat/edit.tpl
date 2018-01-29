{include file="./partials/head.tpl" title="New Category"}
{include file="./partials/topbar.tpl"}
{include file="./partials/sidebar.tpl"}

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Category: {$cat.cat_name}</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
					<!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="col-md-12">
						<form action={$base_url}index.php/tpl/category/edit/{$cat.cat_id} method="post" role="form">
							<legend>New Category</legend>
							{if $errors}
								<div class='alert alert-danger alert-dismissable'>
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									{$errors}
								</div>
							{/if}
							<div class="form-group">
								<label for="cat_id">Category ID</label>
								<input type="text" class="form-control" name="cat_id" value="{$cat.cat_id}" id="cat_id" placeholder="Enter Category Name">
							</div>
							<div class="form-group">
								<label for="cat_name">Category Name</label>
								<input type="text" class="form-control" name="cat_name" value="{$cat.cat_name}" id="cat_name" placeholder="Enter Category Name">
							</div>
							<div class="form-group">
								<label for="cat_parent_id">Category Parent</label>
								<select name="cat_parent_id" id="cat_parent_id" class="form-control select2" style="width: 100%;">
									<option value='0'>-- Select category parent --</option>
									{html_options options=$cats selected=$cat.cat_parent_id}
								</select>
							</div>
							<div class="form-group">
								<label for="cat_des">Description</label>
								<textarea id="cat_des" name="cat_des" rows="10" cols="80">{$cat.cat_des}</textarea>
							</div>
							<button type="submit" class="btn btn-primary" name="edit">Save</button>
						</form>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</section>

{include file="./partials/foot.tpl"}
