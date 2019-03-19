<?php
/**
 * Created by PhpStorm.
 * User: Michał Hałas
 * Date: 19.03.2019
 * Time: 09:49
 */

namespace MH\AdminLTE\Navigation;

use Doctrine\Common\Collections\ArrayCollection;

class SidebarItem
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $route;

    /**
     * @var string
     */
    private $icon;

    /**
     * @var string
     */
    private $voter;

    /**
     * @var SidebarItem[]
     */
    private $children;

    /**
     * SidebarItem constructor.
     * @param string $name
     * @param string $route
     * @param string $icon
     * @param string $voter
     */
    public function __construct(string $name, string $route, string $icon, string $voter = null)
    {
        $this->name = $name;
        $this->route = $route;
        $this->icon = $icon;
        $this->voter = $voter;
        $this->children = new ArrayCollection();
    }

    /**
     * @return SidebarItem[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * @param SidebarItem $child
     */
    public function addChild(SidebarItem $child)
    {
        $this->children->add($child);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @return null|string
     */
    public function getVoter(): ?string
    {
        return $this->voter;
    }
}