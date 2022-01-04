<style>
	.product-container
	{
		width: 33%;
		display: inline-block;
	}
</style>
<?
	$children = $oo->children($item['id']);
	foreach($children as $key => $child)
	{
		if(substr($child['name1'], 0, 1) == '.')
			unset($children[$key]);
	}
	$children = array_values($children);
	foreach($children as $child){
		?><div class="product-container">
			<div class="product-name"><?= $child['name1']; ?></div>
			<div class="product-description"><?= $child['body']; ?></div>
			<div class="product-button"><?= $child['notes']; ?></div>
		</div><?
	}
?>
