<?php
namespace Kelp\AppBundle\Tests\Controller\Processor;

use Kelp\AppBundle\EventListener\ListenerInterface;
use Kelp\AppBundle\Processor\GenericProcessor;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use PHPUnit\Framework\TestCase;

/**
 * Class SettingTypeStorageProcessorTest
 *
 * @package Kelp\AppBundle\Tests\Controller\Processor
 */
class GenericProcessorTest extends TestCase
{
    public function testConstantValue()
    {
        $processor = new \ReflectionClass(GenericProcessor::class);
        $this->assertTrue($processor->hasConstant('EVENT_NAME'));
        $this->assertEquals('process', $processor->getConstant('EVENT_NAME'));
    }

    public function testConstructor()
    {
        $processor = new GenericProcessor();

        $reflexPropertyD = new \ReflectionProperty(GenericProcessor::class, 'dispatcher');
        $reflexPropertyD->setAccessible(true);
        $valueDispatcher = $reflexPropertyD->getValue($processor);

        $reflexPropertyE = new \ReflectionProperty(GenericProcessor::class, 'event');
        $reflexPropertyE->setAccessible(true);
        $valueEvent = $reflexPropertyE->getValue($processor);


        $this->assertInstanceOf(
            'Symfony\Component\EventDispatcher\EventDispatcherInterface',
            $valueDispatcher
        );

        $this->assertInstanceOf(
            'Symfony\Component\EventDispatcher\GenericEvent',
            $valueEvent
        );
    }

    public function testAddListener()
    {
        $string = '';
        $mockedListener = $this->createMock(ListenerInterface::class);
        $mockedEventD = $this->createMock(EventDispatcherInterface::class);
        $mockedEventD->expects($this->once())->method('addListener')->with($string, $mockedListener);

        $reflexClass = new \ReflectionClass(GenericProcessor::class);

        $instance = $reflexClass->newInstanceWithoutConstructor();
        $reflexProperty = new \ReflectionProperty(GenericProcessor::class, 'dispatcher');
        $reflexProperty->setAccessible(true);

        $reflexProperty->setValue($instance, $mockedEventD);

        $instance->addListener($string, $mockedListener);
    }

    public function testAddSubscriber()
    {
        $mockedEventS = $this->createMock(EventSubscriberInterface::class);

        $mockedEventD = $this->createMock(EventDispatcherInterface::class);
        $mockedEventD->expects($this->once())->method('addSubscriber')->with($mockedEventS);

        $reflexClass = new \ReflectionClass(GenericProcessor::class);
        $instance = $reflexClass->newInstanceWithoutConstructor();

        $reflexProperty = new \ReflectionProperty(GenericProcessor::class, 'dispatcher');
        $reflexProperty->setAccessible(true);
        $reflexProperty->setValue($instance, $mockedEventD);

        $instance->addSubscriber($mockedEventS);
    }

    public function testProcess()
    {
        $reflexClass = new \ReflectionClass(GenericProcessor::class);
        $instance = $reflexClass->newInstanceWithoutConstructor();

        $mockedEventD = $this->createMock(EventDispatcherInterface::class);
        $reflexPropertyD = new \ReflectionProperty(GenericProcessor::class, 'dispatcher');
        $reflexPropertyD->setAccessible(true);
        $reflexPropertyD->setValue($instance, $mockedEventD);

        $mockedEvent = $this->createMock(GenericEvent::class);
        $reflexPropertyE = new \ReflectionProperty(GenericProcessor::class, 'event');
        $reflexPropertyE->setAccessible(true);
        $reflexPropertyE->setValue($instance, $mockedEvent);

        $mockedEventD
            ->expects($this->once())->method('dispatch')
            ->with($reflexClass->getConstant('EVENT_NAME'), $reflexPropertyE->getValue($instance));
        $instance->process();
    }
}
