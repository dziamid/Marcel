<h1>Menu items List</h1>
<ul>
<?php foreach ($menu_items as $menu_item): ?>
  <li><a href="<?php echo url_for('menu_item_show', $menu_item) ?>"><?php echo $menu_item->getName() ?></a></li>
<?php endforeach; ?>
</ul>
<a href="<?php echo url_for('menu_item_new') ?>">New</a>
