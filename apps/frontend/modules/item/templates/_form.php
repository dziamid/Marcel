<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php echo form_tag_for($form, '@item') ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('item') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'item_delete', $form->getObject(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['menu_item_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['menu_item_id']->renderError() ?>
          <?php echo $form['menu_item_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['bill_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['bill_id']->renderError() ?>
          <?php echo $form['bill_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['quantity']->renderLabel() ?></th>
        <td>
          <?php echo $form['quantity']->renderError() ?>
          <?php echo $form['quantity'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
