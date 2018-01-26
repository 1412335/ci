<?php
/**
 * Created by PhpStorm.
 * User: CPU01702-local
 * Date: 1/23/2018
 * Time: 5:18 PM
 */
?>

<div class="col-md-4">
	<?php
	echo $list_cats;
	?>
</div>
<div class="col-md-8">
	<?php
	if(isset($msg))
	{
		echo "<div class='alert alert-success'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			{$msg}
		</div>";
	}

	foreach ($articles as $key => $item)
	{
		if($key > 0)
		{
			echo '<hr>';
		}
		echo "<div class='row'>
				<div class='col-md-12'>
					<div class='media'>
						<a class='media-left' href='#'>
							<img src=".base_url()."uploads/$item[article_thumbnail] style='width: 100px; height: 70px;'>
						</a>
						<div class='media-body'>
							<h4 class='media-heading'>
								<a href=".base_url()."index.php/article/detail/$item[article_id]>$item[article_name]</a>
								<a href=".base_url()."index.php/article/edit/$item[article_id]><span class='glyphicon glyphicon-pencil'></span></a>
							</h4>
							<small>Category: <a href=".base_url()."index.php/home/cat/$item[cat_id]>$item[cat_name]</a></small><br>
							 $item[article_des]
						</div>
					</div>
				</div>
			</div>";
	}
	?>

</div>
