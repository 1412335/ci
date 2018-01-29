<?php /* Smarty version 2.6.31, created on 2018-01-29 05:35:10
         compiled from cat/index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./partials/head.tpl", 'smarty_include_vars' => array('title' => 'Home')));
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
			<div class="box box-success box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Categories List</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<?php if ($this->_tpl_vars['msg']): ?>
								<div class='alert alert-success'>
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									<?php echo $this->_tpl_vars['msg']; ?>

								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>Group</th>
									<th>ID</th>
									<th>Name</th>
									<th>Parent</th>
									<th>Des</th>
									<th>Status</th>
									<th>Created date</th>
									<th>Modified date</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
								</thead>
								<tbody>
								<?php echo $this->_tpl_vars['cats_html']; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">

		</div>
	</div>
</section>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./partials/foot.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>