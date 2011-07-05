<?php

/**
 *
 * @package    sfSimpleMenuPlugin
 * @subpackage modules
 * @author     Tomasz Jakub Rup <tomasz.rup@gmail.com>
 */
class sfSimpleMenuComponents extends sfComponents
{

  public function preExecute()
  {
    $type = $this->getVar('type') === null ? 'default' : $this->getVar('type');
    
    $menu = sfConfig::get(sprintf('app_sf_simple_menu_plugin_%s', $type), array());
    
    $this->Menu = new sfMenu($menu);
  }


  public function executeUl(sfWebRequest $request)
  {
    $this->preExecute();
  }

  public function executeDiv(sfWebRequest $request)
  {
    $this->preExecute();
  }

}