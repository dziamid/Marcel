<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php echo form_tag_for($form, '@bill') ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('bill') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'bill_delete', $form->getObject(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['number']->renderLabel() ?></th>
        <td>
          <?php echo $form['number']->renderError() ?>
          <?php echo $form['number'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['desk_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['desk_id']->renderError() ?>
          <?php echo $form['desk_id'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
