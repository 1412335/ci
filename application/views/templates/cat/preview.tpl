{include file="./partials/head.tpl" title="Preview Category"}
{include file="./partials/topbar.tpl"}
{include file="./partials/sidebar.tpl"}

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Preview Category: {$cat.cat_name}</h3>
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
								<div class="cat-id">ID: {$cat.cat_id}</div>
								<div class="cat-name">Name: {$cat.cat_name}</div>
								<div class="cat-des">Description: {$cat.cat_des}</div>
								{if $cat_parent}
									<div class="cat-parent">Category Parent: <a href="{$base_url}index.php/tpl/category/preview/{$cat.cat_parent_id}">{$cat_parent.cat_name}</a></div>
								{/if}
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							{html_table cols="ID,Title,Des,Edit,Delete" table_attr=$table_attr loop=$articles}
						</div>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</section>

{include file="./partials/foot.tpl"}
