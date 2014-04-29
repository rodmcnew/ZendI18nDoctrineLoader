<?php

namespace ZendI18nDoctrineLoaderTest\RemoteLoader;

use ZendI18nDoctrineLoader\Factory\LoaderFactory;
use Zend\I18n\Translator\LoaderPluginManager;
use Zend\ServiceManager\ServiceManager;

require __DIR__ . '/../../autoload.php';

class LoaderFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ZendI18nDoctrineLoader\Factory\LoaderFactory
     */
    function testCreateService()
    {
        $sm = new ServiceManager();
        $sm->setService(
            'Doctrine\ORM\EntityManager',
            $this->getMockBuilder('Doctrine\ORM\EntityManager')
                ->disableOriginalConstructor()
                ->getMock()
        );
        $loadPluginMgr= new LoaderPluginManager();
        $loadPluginMgr->setServiceLocator($sm);
        $unit = new LoaderFactory();
        $this->assertInstanceOf(
            'ZendI18nDoctrineLoader\RemoteLoader\DoctrineDbLoader',
            $unit->createService($loadPluginMgr)
        );
    }
}