<?php

namespace YesCorpo\Bundle\SampleBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class SampleExtension extends Extension
{
    public function getProjectDir()
    {
        return __DIR__ . '/../..';
    }

    public function load(array $configs, ContainerBuilder $containerBuilder)
    {
        $loader = new YamlFileLoader(
            $containerBuilder,
            new FileLocator($this->getProjectDir() . '/config')
        );

        $loader->load('services.yaml');

        $containerBuilder->setParameter('sample.public_path', $this->getProjectDir() . '/public');
    }
}