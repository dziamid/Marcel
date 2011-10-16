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
        <th><label>Кухня / бар</label></th>
        <td>
          <?php echo $form['type']->renderError() ?>
          <?php echo $form['type'] ?>
        </td>
      </tr>
      <tr>
        <th><label>Раздел</label></th>
        <td>
          <?php echo $form['menu_group']->renderError() ?>
          <?php echo $form['menu_group'] ?>
        </td>
      </tr>
      <tr>
        <th><label>Наименование</label></th>
        <td>
          <?php echo $form['menu_item_id']->renderError() ?>
          <?php echo $form['menu_item_id'] ?>
        </td>
      </tr>
      <?php include_component('stats', 'filterDate', array('form' => $form)) ?>
      <tr>
        <th><label>Скрытый счёт?</label></th>
        <td>
          <?php echo $form['bill_is_hidden']->renderError() ?>
          <?php echo $form['bill_is_hidden'] ?>
        </td>
      </tr>
      <tr>
        <th><label>Безналичный счёт?</label></th>
        <td>
          <?php echo $form['bill_is_paperless']->renderError() ?>
          <?php echo $form['bill_is_paperless'] ?>
        </td>
      </tr>
      </tbody>
    </table>
  </form>
</div>

<script type="text/javascript">
$(document).ready(function(){
 
  $('#item_filters_menu_group').change(function(e){
    onMenuGroupChange($(e.target));
  });
  onMenuGroupChange('#item_filters_menu_group');
});

function onMenuGroupChange(target)
{
  var group = $(target).attr('value');
  var all_options = $('#item_filters_menu_item_id option');
  all_options.show();
  if (group != '')
  {
    //hide all group unrelated items
    var options = $('#item_filters_menu_item_id option[data-group!='+group+']');
    options.hide();  
  }    
}
</script>
