<?php

/**
 * sfGuardUserAdminForm for admin generators
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUserAdminForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardUserAdminForm extends BasesfGuardUserAdminForm
{
  /**
   * @see sfForm
   */
  public function configure()
  {
      unset($this['balance'], $this['permissions_list'], $this['groups_list'],
            $this['phone_confirmation_code'], $this['notify_balance_sent'],
            $this['timezone']);

      if ($this->object->isNew()) {
          $this->widgetSchema['api_tag_id'] = new sfWidgetFormInput();
          $this->validatorSchema['api_tag_id'] = new sfValidatorInteger(array('required' => true));
      } else {
          $q = TagTable::getInstance()
            ->createQuery('t')
            ->where('t.user_id = ?', $this->object->getId())
            ->orderBy('t.name');

          $this->widgetSchema['api_tag_id'] = new sfWidgetFormDoctrineChoice(array(
              'add_empty' => true,
              'model' => 'Tag',
              'query' => $q,
          ));

          $this->validatorSchema['api_tag_id'] = new sfValidatorDoctrineChoice(array(
              'required' => false,
              'model' => 'Tag',
              'query' => $q,
          ));
      }
  }
}
