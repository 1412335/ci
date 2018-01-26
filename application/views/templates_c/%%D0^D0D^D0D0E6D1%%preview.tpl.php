<?php /* Smarty version 2.6.31, created on 2018-01-26 03:56:36
         compiled from article/preview.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./partials/head.tpl", 'smarty_include_vars' => array('title' => 'Preview Article')));
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
					<h3 class="box-title">Preview Article: <?php echo $this->_tpl_vars['article']['article_name']; ?>
</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="article">
						<div class="title"><h2><?php echo $this->_tpl_vars['article']['article_name']; ?>
</h2></div>
						<div class="des"><b><?php echo $this->_tpl_vars['article']['article_des']; ?>
</b></div>
						<div class="image">
							<img src="<?php echo $this->_tpl_vars['base_url']; ?>
uploads/<?php echo $this->_tpl_vars['article']['article_thumbnail']; ?>
" height="250" alt="Article Image">
						</div>
						<div class="content"><?php echo $this->_tpl_vars['article']['article_content']; ?>
</div>
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