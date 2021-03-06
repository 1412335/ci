<?php /* Smarty version 2.6.31, created on 2018-01-30 05:14:58
         compiled from register/index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./partials/head.tpl", 'smarty_include_vars' => array('title' => 'Register')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- iCheck -->
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/plugins/iCheck/square/blue.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<a href="<?php echo $this->_tpl_vars['base_url']; ?>
tpl/category"><b>Admin</b>management</a>
	</div>
	<!-- /.login-logo -->
	<div class="register-box-body">
		<p class="login-box-msg">Register a new membership</p>

		<form action="" method="post">
			<?php if (isset ( $this->_tpl_vars['errors'] ) && $this->_tpl_vars['errors']): ?>
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<?php echo $this->_tpl_vars['errors']; ?>

				</div>
			<?php endif; ?>
																	<div class="form-group has-feedback">
				<input type="email" class="form-control" name="email" placeholder="Email">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" name="password" placeholder="Password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" name="passconf" placeholder="Retype password">
				<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label>
							<input type="checkbox" name="cb"> I agree to the <a href="#">terms</a>
						</label>
					</div>
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
				</div>
				<!-- /.col -->
			</div>
		</form>

		<div class="social-auth-links text-center">
			<p>- OR -</p>
			<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
				Facebook</a>
			<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
				Google+</a>
		</div>

		<a href="<?php echo $this->_tpl_vars['base_url']; ?>
tpl/admin/login" class="text-center">I already have a membership</a>
	</div>
	<!-- /.login-box-body -->
</div>

<!-- jQuery 3 -->
<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/plugins/iCheck/icheck.min.js"></script>
<script>
	<?php echo '
	$(function () {
		$(\'input\').iCheck({
			checkboxClass: \'icheckbox_square-blue\',
			radioClass: \'iradio_square-blue\',
			increaseArea: \'20%\' // optional
		});
	});
	'; ?>

</script>
</body>