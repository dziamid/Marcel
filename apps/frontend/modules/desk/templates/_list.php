<script>
$(function() {
  $( "#menu" ).tabs();
});
</script>
<div id='menu'>
	<ul>
    <?php foreach ($groups as $k => $group): ?>
  		<li class='<?php echo $group->getTypeClassname() ?>'><a href="<?php echo sprintf('#tabs-%s',$k) ?>"><?php echo $group->getName() ?></a></li>
    <?php endforeach; ?>
  </ul>
  <?php foreach ($groups as $k => $group): ?>
    <div id='<?php echo sprintf('tabs-%s',$k) ?>' class='container'>
      <?php foreach ($group->getItems() as $menu_item): ?>
        <div class='item' data-href='<?php echo url_for ('menu_item_select', $menu_item) ?>'>
          <div><?php echo $menu_item->getName() ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</div>