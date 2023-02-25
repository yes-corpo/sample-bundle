<?php

namespace YesCorpo\Bundle\SampleBundle\Tests;

use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
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
            new TwigBundle(),
            new SampleBundle(),
        ];
    }

    public function getProjectDir(): string
    {
        return \dirname(__DIR__);
    }
}
