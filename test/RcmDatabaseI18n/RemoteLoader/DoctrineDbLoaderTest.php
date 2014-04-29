<?php

namespace ZendI18nDoctrineLoaderTest\RemoteLoader;

use ZendI18nDoctrineLoader\RemoteLoader\DoctrineDbLoader;
use ZendI18nDoctrineLoaderTest\Mock\Mock;

require __DIR__ . '/../../autoload.php';
require __DIR__ . '/../Mock/Mock.php';

class DoctrineDbLoaderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ZendI18nDoctrineLoader\RemoteLoader\DoctrineDbLoader
     */
    function testLoad()
    {
        $query = new Mock();
        $query->setMethod('setParameter', $query);
        $query->setMethod(
            'getArrayResult',
            array(array('key' => 'translate', 'text' => 'Translatadoralata'))
        );
        $entityMgr = $this->getMockBuilder('Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()->getMock();
        $entityMgr->expects($this->any())->method('createQuery')->willReturn($query);
        $unit = new DoctrineDbLoader($entityMgr);
        $textDomain = $unit->load('en_US');
        $this->assertInstanceOf('Zend\I18n\Translator\TextDomain', $textDomain);
        $this->assertEquals(
            array('translate' => 'Translatadoralata'), $textDomain->getArrayCopy()
        );
    }
} 