<?php /* Smarty version 2.6.31, created on 2018-01-29 10:40:02
         compiled from article/preview.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'article/preview.tpl', 42, false),)), $this); ?>
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
						<div class="category">Category: <a href="<?php echo $this->_tpl_vars['base_url']; ?>
index.php/tpl/category/<?php echo $this->_tpl_vars['article']['cat_id']; ?>
"><?php echo $this->_tpl_vars['article']['cat_name']; ?>
</a></div>
						<div class="date">Created|Modified: <?php echo $this->_tpl_vars['article']['article_created_date']; ?>
 | <?php echo $this->_tpl_vars['article']['article_created_date']; ?>
</div>
						<div class="des"><b><?php echo $this->_tpl_vars['article']['article_des']; ?>
</b></div>
						<div class="image">
							<img src="<?php echo $this->_tpl_vars['base_url']; ?>
uploads/<?php echo $this->_tpl_vars['article']['article_thumbnail']; ?>
" height="250" alt="Article Image">
						</div>
						<div class="content"><?php echo $this->_tpl_vars['article']['article_content']; ?>
</div>
						<div class="tags">Tags: <?php echo $this->_tpl_vars['article']['article_tags']; ?>
</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<h3>Related Articles By Tags</h3>
			<hr>
		</div>
		<?php $_from = $this->_tpl_vars['related_articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		<div class="col-md-3">
			<div class="thumbnail">
				<img src="<?php echo $this->_tpl_vars['base_url']; ?>
uploads/articles/<?php echo $this->_tpl_vars['item']['article_thumbnail']; ?>
" height="150" alt="Article Image">
				<div class="caption">
					<h3><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['article_name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</h3>
					<p><?php echo $this->_tpl_vars['item']['article_des']; ?>
</p>
					<p class="clearfix">
						<a href="<?php echo $this->_tpl_vars['base_url']; ?>
tpl/article/<?php echo $this->_tpl_vars['item']['article_id']; ?>
" class="pull-left">View</a>
						<a href="<?php echo $this->_tpl_vars['base_url']; ?>
tpl/article/<?php echo $this->_tpl_vars['item']['article_id']; ?>
/edit" class="pull-right">Edit</a>
					</p>
				</div>
			</div>
		</div>
		<?php endforeach; endif; unset($_from); ?>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h3>Articles OF Category: <?php echo $this->_tpl_vars['article']['cat_name']; ?>
</h3>
			<hr>
		</div>
		<?php $_from = $this->_tpl_vars['related_cat_articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			<div class="col-md-3">
				<div class="thumbnail">
					<img src="<?php echo $this->_tpl_vars['base_url']; ?>
uploads/articles/<?php echo $this->_tpl_vars['item']['article_thumbnail']; ?>
" height="150" alt="Article Image">
					<div class="caption">
						<h3><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['article_name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</h3>
						<p><?php echo $this->_tpl_vars['item']['article_des']; ?>
</p>
						<p class="clearfix">
							<a href="<?php echo $this->_tpl_vars['base_url']; ?>
tpl/article/<?php echo $this->_tpl_vars['item']['article_id']; ?>
" class="pull-left">View</a>
							<a href="<?php echo $this->_tpl_vars['base_url']; ?>
tpl/article/<?php echo $this->_tpl_vars['item']['article_id']; ?>
/edit" class="pull-right">Edit</a>
						</p>
					</div>
				</div>
			</div>
		<?php endforeach; endif; unset($_from); ?>
	</div>
</section>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./partials/foot.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>