<?php if (sfConfig::get('app_use_ajax',false)): ?>
  <?php use_javascript('bill.js') ?>
<?php endif; ?>
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
          <?php if (sfConfig::get('app_use_ajax',false)): ?>
            <?php echo link_to($menu_item->getName(), 'bill_select', array('sf_subject'=>$open_bill,'menu_item_id'=>$menu_item->getId())) ?>
          <?php elseif ($open_bill->isNotNull()): ?>
            <?php echo link_to($menu_item->getName(), 'bill_select', array('sf_subject'=>$open_bill,'menu_item_id'=>$menu_item->getId()),array('method'=>'post')) ?>
          <?php else: ?>
            <?php echo $menu_item->getName() ?>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</div>