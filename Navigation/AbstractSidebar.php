<?php
/**
 * Created by PhpStorm.
 * User: Michał Hałas
 * Date: 18.03.2019
 * Time: 10:09
 */

namespace MH\AdminLTE\Navigation;

use Doctrine\Common\Collections\ArrayCollection;

abstract class AbstractSidebar
{

    /**
     * @var SidebarItem[]
     */
    private $menu;

    final public function __construct()
    {
        $this->menu = new ArrayCollection();
        $this->generateMenu();
    }

    abstract protected function generateMenu() : void;

    final protected function add(SidebarItem $item)
    {
        $this->menu->add($item);
    }

    final public function getMenu()
    {
        return $this->menu;
    }
}