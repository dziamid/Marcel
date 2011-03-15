<?php function echoNode($subtree, $parent=null, $level=0) { ?>
  <div class="node <?php echo sprintf('level_%s', $level) ?>" data-parent='<?php echo $parent['id'] ?>'>
    <div class="content">
      <ul>
      <?php foreach ($subtree as $cat): ?>
        <li data-id='<?php echo $cat['id'] ?>' class="button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only">
          <span class='ui-button-text'><?php echo $cat['name'] ?></span>
        </li>
      <?php endforeach; ?>       
      </ul>       
    </div>
    <?php foreach ($subtree as $cat): ?>
  
    <?php if (count($cat['__children']) > 0): ?>
      <?php echo echoNode($cat['__children'], $cat, $level + 1) ?>
    <?php endif; ?>
    
    <?php endforeach; ?>
  </div>

<?php } ?>

<div id="menu">
  <div class="area tree">
    <?php echo echoNode($tree) ?>    
  </div>
  <div class="area items">
    <?php foreach($items as $item): ?>
      <li data-parent='<?php echo $item['Group']['id'] ?>' data-href='<?php echo url_for ('menu_item_select', array('id'=>$item['id'])) ?>' class="item ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only">
        <span class='ui-button-text'><?php echo $item['name'] ?></span>    
      </li>
    <?php endforeach; ?>
  </div>
</div>
