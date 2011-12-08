<?php

namespace Blage\ConnectBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('blage_connect');
        
        $rootNode->children()
                    ->scalarNode('profile_url')->defaultValue('https://connect.sensiolabs.com/profile/')->end()
                    ->scalarNode('profile_name')->cannotBeEmpty()->end()
                ->end();

        return $treeBuilder;
    }
}
