<?php

namespace YesCorpo\Bundle\SampleBundle\Tests;

use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use YesCorpo\Bundle\SampleBundle\SampleBundle;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function __construct()
    {
        parent::__construct('test', false);
    }
    
    public function registerBundles(): iterable
    {
        return [
            new FrameworkBundle(),
            new SampleBundle(),
        ];
    }

    public function getProjectDir(): string
    {
        return \dirname(__DIR__);
    }

    // protected function configureRoutes(RoutingConfigurator $routes): void
    // {
    //     $routes->import($this->getProjectDir().'/config/routes.yaml');
    // }

    // protected function configureContainer(ContainerBuilder $containerBuilder, LoaderInterface $loader): void
    // {
    //     $loader->load($this->getProjectDir().'/config/{packages}/*.yaml', 'glob');
    //     $loader->load($this->getProjectDir().'/config/{packages}/'.$this->environment.'/*.yaml', 'glob');
    //     $loader->load($this->getProjectDir().'/config/{services}.yaml', 'glob');
    //     $loader->load($this->getProjectDir().'/config/{services}_'.$this->environment.'.yaml', 'glob');
    // }
}
