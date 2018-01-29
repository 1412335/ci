<?php /* Smarty version 2.6.31, created on 2018-01-26 07:40:54
         compiled from ./partials/foot.tpl */ ?>
		</div><!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 2.0
			</div>
			<strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
		</footer>
		</div><!-- ./wrapper -->
		
		<!-- jQuery 3 -->
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js"></script>
		<!-- Bootstrap 3.3.7 -->
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- Morris.js charts -->
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/bower_components/raphael/raphael.min.js"></script>
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/bower_components/morris.js/morris.min.js"></script>
		<!-- Sparkline -->
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
		<!-- jvectormap -->
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<!-- jQuery Knob Chart -->
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
		<!-- daterangepicker -->
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/bower_components/moment/min/moment.min.js"></script>
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
		<!-- datepicker -->
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<!-- Bootstrap WYSIHTML5 -->
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<!-- Select2 -->
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
		<!-- DataTables -->
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<!-- Slimscroll -->
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/dist/js/adminlte.min.js"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
						<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/dist/js/demo.js"></script>
		<!-- CK Editor -->
		<script src="<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/bower_components/ckeditor/ckeditor.js"></script>

		<script>
			<?php echo '
			$(function() {
				$(\'#example1\').DataTable();
				$(\'.select2\').select2();

				if($(\'textarea#article_content\').length)
				{
					CKEDITOR.replace(\'article_content\');
					CKEDITOR.replace(\'article_des\');
				}
				if($(\'textarea#cat_des\').length)
				{
					CKEDITOR.replace(\'cat_des\');
				}

				$(\'img#article_preview_img\').click(function() {
					$(\'input[type=file]\').trigger(\'click\');
				});
			});
			'; ?>

		</script>

		</body>
</html>