<?php

namespace YesCorpo\Bundle\SampleBundle\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;

class IsValidCommandTest extends KernelTestCase
{
    private CommandTester $commandTester;

    protected function setUp(): void
    {
        parent::setUp();

        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $command = $application->find('sample:is-valid');
        $this->commandTester = new CommandTester($command);
    }

    public function testExecuteReturnFalse()
    {
        $this->commandTester->execute([]);

        $this->assertEquals(Command::FAILURE, $this->commandTester->getStatusCode());
        $output = $this->commandTester->getDisplay();
        $this->assertStringContainsString('This command is fail', $output);
    }

    public function testExecuteReturnTrue()
    {
        $this->commandTester->execute([
            '--isValid' => true,
        ]);

        $this->commandTester->assertCommandIsSuccessful();
        $output = $this->commandTester->getDisplay();
        $this->assertStringContainsString('This command is successful', $output);
    }

    public function testExecuteReturnTrueWithText()
    {
        $this->commandTester->execute([
            '--isValid' => true,
            'name' => 'Well done!',
        ]);

        $this->commandTester->assertCommandIsSuccessful();
        $output = $this->commandTester->getDisplay();
        $this->assertStringContainsString('This command is successful : Well done!', $output);
    }
}
