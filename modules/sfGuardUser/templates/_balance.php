<?php echo $sf_guard_user->getBalance() ?>

<b><?php echo link_to('+', 'invoice_new', array(
    'user_id' => $sf_guard_user->getId(),
), array(
    'title' => 'Пополнить баланс',
)) ?></b>