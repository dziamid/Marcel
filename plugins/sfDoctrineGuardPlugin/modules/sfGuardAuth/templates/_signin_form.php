  <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
    <table>
      <tbody>
        <tr>
          <th></th>
          <td class='error'><?php echo $form['username']->renderError() ?></td>
        </tr>
        <tr class='username'>
          <th></th>
          <td>
            <?php echo $form['username'] ?>
          </td>
        </tr>
        <tr class='password'>
          <th>Пароль:</th>
          <td>
            <?php echo $form['password'] ?>
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2">
            <input type="submit" value="Вход" />
            <?php echo $form->renderHiddenFields() ?>
          </td>
        </tr>
      </tfoot>
    </table>
  </form>