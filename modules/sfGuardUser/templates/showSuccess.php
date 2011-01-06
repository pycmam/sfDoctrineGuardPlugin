<?php
/**
 * Просмотр пользователя
 *
 * @param sfGuardUser $sf_guard_user
 */
use_helper('Date', 'Number');
?>

<h1><?php echo $sf_guard_user ?> (<?php echo $sf_guard_user->getFullName() ?>)</h1>

<p>E-Mail: <?php echo mail_to($sf_guard_user->getEmailAddress()) ?></p>
<p>Телефон: <?php echo $sf_guard_user->getPhone() ?></p>
<p>Баланс: <?php echo format_currency($sf_guard_user->getBalance()) ?>руб. <?php echo link_to('пополнить', 'invoice_new', array('user_id' => $sf_guard_user->getId())) ?></p>
