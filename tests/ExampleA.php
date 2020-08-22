<?php

namespace Zhwei\LaravelAutowireTests;

use Zhwei\LaravelAutowire\AutowireAble;

class ExampleA implements AutowireAble
{
    /**
     * @var ExampleB
     */
    private $privatePropertyNotWire;

    /**
     * @autowire
     * @var ExampleB
     */
    private $privateProperty;

    /**
     * @autowire
     * @var ExampleB
     */
    protected $protectedProperty;

    /**
     * @autowire
     * @var ExampleB
     */
    public $publicProperty;

    /**
     * @autowire
     * @var ExampleB
     */
    private static $privateStatic;

    /**
     * @autowire
     * @var ExampleB
     */
    protected static $protectedStatic;

    /**
     * @autowire
     * @var ExampleB
     */
    public static $publicStatic;

    /**
     * @return ExampleB
     */
    public function getPrivateProperty(): ExampleB
    {
        return $this->privateProperty;
    }

    /**
     * @return ExampleB
     */
    public function getProtectedProperty(): ExampleB
    {
        return $this->protectedProperty;
    }

    /**
     * @return ExampleB
     */
    public function getPublicProperty(): ExampleB
    {
        return $this->publicProperty;
    }

    /**
     * @return ExampleB
     */
    public static function getPrivateStatic(): ExampleB
    {
        return self::$privateStatic;
    }

    /**
     * @return ExampleB
     */
    public static function getProtectedStatic(): ExampleB
    {
        return self::$protectedStatic;
    }

    /**
     * @return ExampleB
     */
    public static function getPublicStatic(): ExampleB
    {
        return self::$publicStatic;
    }

    /**
     * @return ExampleB
     */
    public function getPrivatePropertyNotWire()
    {
        return $this->privatePropertyNotWire;
    }
}
