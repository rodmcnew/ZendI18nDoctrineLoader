<?php

namespace ZendI18nDoctrineLoaderTest\Mock;

/**
 * This is a generic mock object
 *
 * Call setMethod with any methods that your mock should have and
 * tell it what the methods should return
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   ZendI18nDoctrineLoaderTest\Mock
 * @author    Rod Mcnew <rmcnew@relivinc.com>
 * @copyright 2014 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: <package_version>
 * @link      https://github.com/reliv
 */
class Mock
{
    protected $methods = array();

    function setMethod($methodName, $whatTheMethodReturns)
    {
        $this->methods[$methodName] = $whatTheMethodReturns;
    }

    function __call($name, $arguments)
    {
        return $this->methods[$name];
    }
} 