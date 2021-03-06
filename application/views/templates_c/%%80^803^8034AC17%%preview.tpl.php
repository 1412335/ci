<?php /* Smarty version 2.6.31, created on 2018-01-29 07:23:40
         compiled from cat/preview.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'cat/preview.tpl', 25, false),array('function', 'html_table', 'cat/preview.tpl', 39, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./partials/head.tpl", 'smarty_include_vars' => array('title' => 'Preview Category')));
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
					<h3 class="box-title">Preview Category: <?php echo $this->_tpl_vars['cat']['cat_name']; ?>
</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
					<!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="row ">
						<div class="col-md-12">
							<div class="cat-detail">
								<dl class="dl-horizontal">
									<dt>ID</dt>
									<dd><?php echo $this->_tpl_vars['cat']['cat_id']; ?>
</dd>
									<dt>NAME</dt>
									<dd><?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['cat_name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</dd>
									<?php if ($this->_tpl_vars['cat_parent']): ?>
									<dt>CATEGORY PARENT</dt>
									<dd><a href="<?php echo $this->_tpl_vars['base_url']; ?>
index.php/tpl/category/<?php echo $this->_tpl_vars['cat']['cat_parent_id']; ?>
"><?php echo $this->_tpl_vars['cat_parent']['cat_name']; ?>
</a></dd>
									<?php endif; ?>
									<dt>DESCRIPTION</dt>
									<dd><?php echo $this->_tpl_vars['cat']['cat_des']; ?>
</dd>
								</dl>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<?php echo smarty_function_html_table(array('cols' => "ID,Title,Des,Edit,Delete",'table_attr' => $this->_tpl_vars['table_attr'],'td_attr' => $this->_tpl_vars['td_attr'],'loop' => $this->_tpl_vars['articles']), $this);?>

						</div>
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