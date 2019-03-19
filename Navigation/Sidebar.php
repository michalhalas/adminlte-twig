<?php
/**
 * Created by PhpStorm.
 * User: Michał Hałas
 * Date: 18.03.2019
 * Time: 10:09
 */

namespace MH\AdminLTE\Navigation;

//TODO klasa implementuje inferface
use Doctrine\Common\Collections\ArrayCollection;

class Sidebar
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

    protected function generateMenu(){
        $this->add(new SidebarItem('Single', '#', 'calendar'));
        $this->add(new SidebarItem('Single', '#', 'file-o'));
    }

    final protected function add(SidebarItem $item){
        $this->menu->add($item);
    }

    final public function getMenu(){
        return $this->menu;
    }
}