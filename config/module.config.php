<?php

/**
 * ZF2 Plugin Config file
 *
 * This file contains all the configuration for the Module as defined by ZF2.
 * See the docs for ZF2 for more information.
 *
 * PHP version 5.3
 *
 * LICENSE: No License yet
 *
 * @category  Reliv
 * @author    Westin Shafer <wshafer@relivinc.com>
 * @copyright 2012 Reliv International
 * @license   License.txt New BSD License
 * @version   GIT: <git_id>
 */

return array(
    'translator' => array(

        'locale' => 'en_US',
        'remote_translation' => array(
            array(
                'type' => 'ZendI18nDoctrineLoader\DbLoader',
            ),
        ),
    ),

    /**
     * Can be removed after ZF2 PR
     */
    'service_manager' => array(
        'factories' => array(
            'MvcTranslator' => 'ZendI18nDoctrineLoader\Factory\TranslatorFactory',
        )
    ),

    'translator_loaders' => array(
        'factories' => array(
            'ZendI18nDoctrineLoader\DbLoader' => 'ZendI18nDoctrineLoader\Factory\LoaderFactory',
        )
    ),

    'doctrine' => array(
        'driver' => array(
            'ZendI18nDoctrineLoader' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/ZendI18nDoctrineLoader/Entity'
                )
            ),

            'orm_default' => array(
                'drivers' => array(
                    'ZendI18nDoctrineLoader' => 'ZendI18nDoctrineLoader'
                )
            )
        ),
    )
);