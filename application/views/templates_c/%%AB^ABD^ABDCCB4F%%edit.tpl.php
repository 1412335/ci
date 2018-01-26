<?php /* Smarty version 2.6.31, created on 2018-01-24 12:51:21
         compiled from cat/edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'cat/edit.tpl', 39, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./partials/head.tpl", 'smarty_include_vars' => array('title' => 'New Category')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./partials/topbar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./partials/sidebar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Category: <?php echo $this->_tpl_vars['cat']['cat_name']; ?>
</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
					<!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="col-md-12">
						<form action=<?php echo $this->_tpl_vars['base_url']; ?>
index.php/tpl/category/edit/<?php echo $this->_tpl_vars['cat']['cat_id']; ?>
 method="post" role="form">
							<legend>New Category</legend>
							<?php if ($this->_tpl_vars['errors']): ?>
								<div class='alert alert-danger alert-dismissable'>
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									<?php echo $this->_tpl_vars['errors']; ?>

								</div>
							<?php endif; ?>
							<div class="form-group">
								<label for="cat_id">Category ID</label>
								<input type="text" class="form-control" name="cat_id" value="<?php echo $this->_tpl_vars['cat']['cat_id']; ?>
" id="cat_id" placeholder="Enter Category Name">
							</div>
							<div class="form-group">
								<label for="cat_name">Category Name</label>
								<input type="text" class="form-control" name="cat_name" value="<?php echo $this->_tpl_vars['cat']['cat_name']; ?>
" id="cat_name" placeholder="Enter Category Name">
							</div>
							<div class="form-group">
								<label for="cat_parent_id">Category Parent</label>
								<select name="cat_parent_id" id="cat_parent_id" class="form-control">
									<option value='0'>-- Select category parent --</option>
									<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['cats'],'selected' => $this->_tpl_vars['cat']['cat_id']), $this);?>

								</select>
							</div>
							<div class="form-group">
								<label for="cat_des">Description</label>
								<textarea name="cat_des" class="form-control" id="cat_des" cols="30" rows="5" placeholder="Write something about category.."><?php echo $this->_tpl_vars['cat']['cat_des']; ?>
</textarea>
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

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./partials/foot.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>