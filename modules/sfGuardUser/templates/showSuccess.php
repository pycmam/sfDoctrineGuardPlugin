<?php
/**
 * Карточка клиента
 *
 * @param sfGuardUser
 */
?>
<?php include_partial('sfGuardUser/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo $user ?></h1>

  <?php include_partial('sfGuardUser/flashes') ?>

  <div id="sf_admin_content">
        <dl>
            <dt>Статус:</dt>
            <dd><?php echo $user->getIsActive() ? 'АКТИВЕН' : 'НЕ АКТИВЕН ' . link_to('[активировать]', 'sfGuardUser_activate', $user, array(
                'method' => 'post',
            )) ?></dd>

            <dt>Имя, Фамилия:</dt>
            <dd><?php echo $user->getFirstName(), ' ', $user->getLastName() ?></dd>

            <dt>E-Mail:</dt>
            <dd><?php echo $user->getEmailAddress() ?></dd>

            <dt>Логин:</dt>
            <dd><?php echo $user->getUsername() ?></dd>

            <dt>Описание проекта/цели:</dt>
            <dd><?php echo nl2br($user->getDescription()) ?></dd>

            <dt>Нагрузка СМС:</dt>
            <dd><?php echo $user->getSmsCount() ?></dd>
        </dl>

  <?php ?>
  </div>

  <div id="sf_admin_footer">
  </div>
</div>
