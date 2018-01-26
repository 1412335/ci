{include file="./partials/head.tpl" title="Preview Article"}
{include file="./partials/topbar.tpl"}
{include file="./partials/sidebar.tpl"}

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-warning box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Preview Article: {$article.article_name}</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="article">
						<div class="title"><h2>{$article.article_name}</h2></div>
						<div class="category">Category: <a href="{$base_url}index.php/tpl/category/{$article.cat_id}">{$article.cat_name}</a></div>
						<div class="des"><b>{$article.article_des}</b></div>
						<div class="image">
							<img src="{$base_url}uploads/{$article.article_thumbnail}" height="250" alt="Article Image">
						</div>
						<div class="content">{$article.article_content}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

{include file="./partials/foot.tpl"}
