<?php /* Smarty version 2.6.31, created on 2018-01-25 05:46:31
         compiled from ./partials/sidebar.tpl */ ?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src=<?php echo $this->_tpl_vars['base_url']; ?>
assets/AdminLTE/dist/img/user2-160x160.jpg class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
			<li class="treeview active">
				<a href="#">
					<i class="fa fa-dashboard"></i> <span>Manage Category</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo $this->_tpl_vars['base_url']; ?>
index.php/tpl/category"><i class="fa fa-circle-o"></i> List Categories</a></li>
					<li><a href="<?php echo $this->_tpl_vars['base_url']; ?>
index.php/tpl/category/add"><i class="fa fa-circle-o"></i> New Category</a></li>
				</ul>
			</li>

			<li class="treeview active">
				<a href="#">
					<i class="fa fa-dashboard"></i> <span>Manage Article</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo $this->_tpl_vars['base_url']; ?>
index.php/tpl/article"><i class="fa fa-circle-o"></i> List Articles</a></li>
					<li><a href="<?php echo $this->_tpl_vars['base_url']; ?>
index.php/tpl/article/add"><i class="fa fa-circle-o"></i> New Article</a></li>
				</ul>
			</li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">