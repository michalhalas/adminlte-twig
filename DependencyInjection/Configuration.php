<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MH\AdminLTE\DependencyInjection;

use MH\AdminLTE\Navigation\AbstractSidebar;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('admin_lte');
        /** @var ArrayNodeDefinition $rootNode */
        $rootNode = $treeBuilder->getRootNode();
        $rootNode
            ->children()
                ->arrayNode('navigation')
                    ->isRequired()
                    ->children()
                        ->scalarNode('sidebar')
                            ->defaultValue('MH\AdminLTE\Navigation\Sidebar')
                                ->validate()
                                    ->ifTrue(function ($v) {
                                        return !class_exists($v);
                                    })
                                    ->thenInvalid('Specified class does not exists')
                                    ->ifTrue(function ($v) {
                                        return !in_array(AbstractSidebar::class, class_parents($v));
                                    })
                                    ->thenInvalid('Specified class must extend ' . AbstractSidebar::class)
                                ->end()
                            ->end()
                        ->scalarNode('navigation')->defaultValue('MH\AdminLTE\Navigation\Navigation')->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
