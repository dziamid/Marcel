<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_filter">
  <?php if ($form->hasGlobalErrors()): ?>
    <?php echo $form->renderGlobalErrors() ?>
  <?php endif; ?>

  <form action="<?php echo url_for('stats_collection', array('action' => 'filter')) ?>" method="post">
    <table cellspacing="0">
      <tfoot>
        <tr>
          <td colspan="2">
            <?php echo $form->renderHiddenFields() ?>
            <?php echo link_to(__('Reset', array(), 'sf_admin'), 'stats_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?>
            <input type="submit" value="<?php echo __('Filter', array(), 'sf_admin') ?>" />
          </td>
        </tr>
      </tfoot>
      <tbody>
      <tr>
        <th><?php echo $form['menu_item_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['menu_item_id']->renderError() ?>
          <?php echo $form['menu_item_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['menu_group']->renderLabel() ?></th>
        <td>
          <?php echo $form['menu_group']->renderError() ?>
          <?php echo $form['menu_group'] ?>
        </td>
      </tr>
      </tbody>
    </table>
  </form>
</div>
