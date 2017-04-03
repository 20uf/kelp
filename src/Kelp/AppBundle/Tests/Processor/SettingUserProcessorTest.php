<?php
namespace Kelp\AppBundle\Tests\Controller\Processor;

use Kelp\AppBundle\Processor\SettingTypeStorageProcessor;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class SettingTypeStorageProcessorTest
 *
 * @package Kelp\AppBundle\Tests\Controller\Processor
 */
class SettingUserProcessorTest extends \PHPUnit\Framework\TestCase
{
    public function testConstructor()
    {
        $mockedEvent = $this->createMock(EventDispatcherInterface::class);

        $processor = new SettingTypeStorageProcessor($mockedEvent);

        $reflexProperty = new \ReflectionProperty(SettingTypeStorageProcessor::class, 'eventDispatcher');
        $reflexProperty->setAccessible(true);
        $value = $reflexProperty->getValue($processor);

        $this->assertSame($mockedEvent, $value);
    }
}
