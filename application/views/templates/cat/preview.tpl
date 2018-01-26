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
								<dl class="dl-horizontal">
									<dt>ID</dt>
									<dd>{$cat.cat_id}</dd>
									<dt>NAME</dt>
									<dd>{$cat.cat_name|capitalize}</dd>
									{if $cat_parent}
									<dt>CATEGORY PARENT</dt>
									<dd><a href="{$base_url}index.php/tpl/category/{$cat.cat_parent_id}">{$cat_parent.cat_name}</a></dd>
									{/if}
									<dt>DESCRIPTION</dt>
									<dd>{$cat.cat_des}</dd>
								</dl>
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
