<?php /* Smarty version 2.6.31, created on 2018-01-26 03:23:02
         compiled from article/add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'article/add.tpl', 32, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./partials/head.tpl", 'smarty_include_vars' => array('title' => 'New Article')));
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
			<div class="box box-warning box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">New Article</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="col-md-8 col-md-offset-2">
						<form action=<?php echo $this->_tpl_vars['base_url']; ?>
index.php/tpl/article/add method="post" enctype="multipart/form-data" role="form">
							<?php if ($this->_tpl_vars['errors']): ?>
								<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									<?php echo $this->_tpl_vars['errors']; ?>

								</div>
							<?php endif; ?>
							<div class="form-group">
								<label for="article_name">Article Name</label>
								<input type="text" class="form-control" name="article_name" id="article_name" placeholder="Enter Article Name">
							</div>
							<div class="form-group">
								<label for="article_cat_id">Category</label>
								<select name="article_cat_id" id="article_cat_id" class="form-control select2" style="width: 100%;">
									<option value=''>-- Select category --</option>
									<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['cats']), $this);?>

								</select>
							</div>
							<div class="form-group">
								<label for="article_image">Image</label>
								<input type="file" class="form-control" id="article_image" name="article_image">
							</div>
							<div class="form-group">
								<label for="article_des">Description</label>
								<textarea id="article_des" name="article_des" rows="10" cols="80">Short description...</textarea>
							</div>
							<div class="form-group">
								<label for="article_content">Content</label>
								<textarea id="article_content" name="article_content" rows="10" cols="80">Content of this article...</textarea>
							</div>
							<button type="submit" class="btn btn-primary btn-flat" name="add">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./partials/foot.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>