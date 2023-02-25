<?php

namespace YesCorpo\Bundle\SampleBundle\Tests\Service;

use PHPUnit\Framework\TestCase;
use YesCorpo\Bundle\SampleBundle\Service\SampleService;

class SampleServiceTest extends TestCase
{
    private SampleService $service;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->service = new SampleService();
    }

    public function testIsValidTrue()
    {
        $this->assertTrue($this->service->isValid());
    }
    
    public function testIsValidFalse()
    {
        $this->assertFalse($this->service->isValid(false));
    }
}