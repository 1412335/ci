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
						<div class="date">Created|Modified: {$article.article_created_date} | {$article.article_created_date}</div>
						<div class="des"><b>{$article.article_des}</b></div>
						<div class="image">
							<img src="{$base_url}uploads/{$article.article_thumbnail}" height="250" alt="Article Image">
						</div>
						<div class="content">{$article.article_content}</div>
						<div class="tags">Tags: {$article.article_tags}</div>
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
		{foreach from=$related_articles item=item}
		<div class="col-md-3">
			<div class="thumbnail">
				<img src="{$base_url}uploads/articles/{$item.article_thumbnail}" height="150" alt="Article Image">
				<div class="caption">
					<h3>{$item.article_name|capitalize}</h3>
					<p>{$item.article_des}</p>
					<p class="clearfix">
						<a href="{$base_url}tpl/article/{$item.article_id}" class="pull-left">View</a>
						<a href="{$base_url}tpl/article/{$item.article_id}/edit" class="pull-right">Edit</a>
					</p>
				</div>
			</div>
		</div>
		{/foreach}
	</div>
	<div class="row">
		<div class="col-md-12">
			<h3>Articles OF Category: {$article.cat_name}</h3>
			<hr>
		</div>
		{foreach from=$related_cat_articles item=item}
			<div class="col-md-3">
				<div class="thumbnail">
					<img src="{$base_url}uploads/articles/{$item.article_thumbnail}" height="150" alt="Article Image">
					<div class="caption">
						<h3>{$item.article_name|capitalize}</h3>
						<p>{$item.article_des}</p>
						<p class="clearfix">
							<a href="{$base_url}tpl/article/{$item.article_id}" class="pull-left">View</a>
							<a href="{$base_url}tpl/article/{$item.article_id}/edit" class="pull-right">Edit</a>
						</p>
					</div>
				</div>
			</div>
		{/foreach}
	</div>
</section>

{include file="./partials/foot.tpl"}
