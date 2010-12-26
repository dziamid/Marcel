<script>
$(function() {
  $( "#menulist" ).tabs();
});
</script>
<div id='menulist'>
	<ul>
    <?php foreach ($menu_groups as $k => $menu_group): ?>
  		<li><a href="<?php echo sprintf('#tabs-%s',$k) ?>"><?php echo $menu_group->getName() ?></a></li>
    <?php endforeach; ?>
  </ul>
  <?php foreach ($menu_groups as $k => $menu_group): ?>
    <div id='<?php echo sprintf('tabs-%s',$k) ?>' class='<?php echo $menu_group->getSlug() ?>'>
      <?php foreach ($menu_group->getItems() as $menu_item): ?>
        <div class='menu_item'>
          <?php echo link_to($menu_item->getName(), 'menu_item_select', array('sf_subject'=>$menu_item,'open_bill_id'=>$open_bill_id),array('method'=>'post')) ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</div>