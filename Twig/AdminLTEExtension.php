<?php
/**
 * Created by PhpStorm.
 * User: Michał Hałas
 * Date: 18.03.2019
 * Time: 10:13
 */

namespace MH\AdminLTE\Twig;

use MH\AdminLTE\Navigation\Sidebar;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AdminLTEExtension extends AbstractExtension
{

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * AdminLTEExtension constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {

        $this->container = $container;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('adminlte_sidebar_menu', [$this, 'getSidebarMenu'], ['is_safe' => ['html']])
        ];
    }

    public function getSidebarMenu()
    {
        $sidebarClass = $this->container->getParameter('admin_lte.navigation.sidebar');
        // TODO powinien tutaj się pojawić interface zamiast klasy
        /** @var Sidebar $sidebar */
        $sidebar = new $sidebarClass();
        return $sidebar->getMenu();
    }
}