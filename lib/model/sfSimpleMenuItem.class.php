<?php

/**
 * Menu item (with submenu).
 *
 * @author     Tomasz Jakub Rup <tomasz.rup@gmail.com>
 */
class sfSimpleMenuItem
{
    private $title;

    private $url;

    private $submenu;

    private $isSeparator;

    public function __construct(array $menuItem)
    {
        $this->title = isset($menuItem['title']) ? $menuItem['title'] : '';
        $this->url = isset($menuItem['url']) ? $menuItem['url'] : null;
        $this->submenu = isset($menuItem['submenu']) ? new sfSimpleMenu($menuItem['submenu']) : null;
        $this->isSeparator = isset($menuItem['separator']);
    }

    public function getTitle()
    {
        return sfContext::getInstance()->getI18N()->__($this->title, array(), 'sf_menu');
    }

    public function hasURL()
    {
        return null !== $this->url;
    }

    public function getURL()
    {
        return $this->url;
    }

    public function hasSubmenu()
    {
        return null !== $this->submenu;
    }

    public function getSubmenu()
    {
        return $this->submenu;
    }

    public function isSeparator()
    {
        return $this->isSeparator;
    }
}
