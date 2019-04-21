<?php
declare(strict_types=1);

namespace App\Swiss;
/**
 * Class Layered - Support mocking during unit tests
 *
 * @package App\Swiss
 */
abstract class Layered {
    /** @var \App\Swiss\Layered[] */
    private static $instance;

    public static function getInstance() {
        $class = static::class;
        if (!(is_array(self::$instance) && array_key_exists($class, self::$instance))) {
            self::$instance[$class] = new static;
        }
        return self::$instance[$class];
    }

    public static function setInstance(Layered $instance) {
        $class = static::class;
        self::$instance[$class] = $instance;
    }

    public static function reset() {
        $class = static::class;
        unset(self::$instance[$class]);
    }
}
