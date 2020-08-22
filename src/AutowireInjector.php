<?php

namespace Zhwei\LaravelAutowire;

use Illuminate\Contracts\Container\Container;
use PhpDocReader\PhpDocReader;

class AutowireInjector
{
    private const TOKEN = '@autowire';

    public static function inject(Container $container, object $instance)
    {
        $rfo = new \ReflectionObject($instance);
        if (!$properties = $rfo->getProperties()) {
            return;
        }

        static $reader;
        $reader || $reader = new PhpDocReader();

        foreach ($properties as $property) {
            if (strpos($property->getDocComment(), self::TOKEN) === false) {
                continue;
            }

            // 设置可见性，方便下面读写
            if ($property->isPublic() === false) {
                $property->setAccessible(true);
            }

            // 如果有值，则跳过注入
            if ($property->getValue($instance) !== null) {
                continue;
            }

            if ($class = $reader->getPropertyClass($property)) {
                $property->setValue($instance, $container->make($class));
            }
        }
    }
}
