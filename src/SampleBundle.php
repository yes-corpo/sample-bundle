<?php

namespace YesCorpo\Bundle\SampleBundle;

use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
use YesCorpo\Bundle\SampleBundle\DependencyInjection\SampleExtension;

class SampleBundle extends AbstractBundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new SampleExtension();
    }
}