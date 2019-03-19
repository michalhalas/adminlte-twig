<?php
/**
 * Created by PhpStorm.
 * User: Michał Hałas
 * Date: 19.03.2019
 * Time: 10:28
 */

namespace MH\AdminLTE\Navigation;


class Sidebar extends AbstractSidebar
{
    protected function generateMenu(): void
    {
        $this->add(new SidebarItem('Single', '#', 'calendar'));
        $this->add(new SidebarItem('Single', '#', 'file-o'));
    }
}