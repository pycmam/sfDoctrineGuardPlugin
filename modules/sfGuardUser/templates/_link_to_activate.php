<?php echo $sf_guard_user->getIsActive() ? 'Активен' : link_to('Активировать', 'sfGuardUser_activate', $sf_guard_user, array(
    'method' => 'post'
)) ?>
