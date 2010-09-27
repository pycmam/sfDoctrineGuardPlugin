<?php

require_once dirname(__FILE__).'/../lib/sfGuardUserGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/sfGuardUserGeneratorHelper.class.php';

/**
 * sfGuardUser actions.
 *
 * @package    sfGuardPlugin
 * @subpackage sfGuardUser
 * @author     Fabien Potencier
 * @version    SVN: $Id: actions.class.php 23319 2009-10-25 12:22:23Z Kris.Wallsmith $
 */
class sfGuardUserActions extends autoSfGuardUserActions
{
    public function executeShow()
    {
        $this->user = $this->getRoute()->getObject();
    }

    public function executeActivate($request)
    {
        $request->checkCSRFProtection();

        $user = $this->getRoute()->getObject();

        $user->setIsActive(true);
        $user->save();

        $this->getMailer()->createAndSend($user->getEmailAddress(),
            'Ваша заявка на регистрацию на сервисе LittleSMS.ru подтверждена',
            $this->getPartial('global/mail/activate.txt', array(
                'user' => $user,
            )));

        $this->redirect('sfGuardUser');
    }
}
