<?php
/**
 * Created by PhpStorm.
 * User: Michał Hałas
 * Date: 13.03.2019
 * Time: 09:23
 */

namespace MH\AdminLTE\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class AdminLTEExtension extends Extension
{
    /**
     * @param array $configs
     * @param ContainerBuilder $container
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        if (!empty($config['navigation'])) {
            $this->loadNavigation($config['navigation'], $container);
        }

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );
        $loader->load('services.yaml');
    }

    private function loadNavigation(array $configs, ContainerBuilder $container)
    {
        foreach ($configs as $name => $config) {
            $container->setParameter($this->getAlias() . '.navigation.' . $name, $config);
        }
    }
}