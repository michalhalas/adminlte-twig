<?php
/**
 * Created by PhpStorm.
 * User: Michał Hałas
 * Date: 18.03.2019
 * Time: 10:13
 */

namespace MH\AdminLTE\Twig;

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
            new TwigFunction('adminlte_test', [$this, 'test'], ['is_safe' => ['html']])
        ];
    }

    public function test()
    {
        dump($this->container->getParameter('admin_lte.navigation.sidebar'));
        return 'testrr';
    }
}