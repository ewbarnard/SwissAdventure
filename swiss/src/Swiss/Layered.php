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
        if (!self::$instance[$class]) {
            self::$instance[$class] = new static;
        }
        return self::$instance[$class];
    }

    public static function setInstance(Layered $instance) {
        $class = static::class;
        self::$instance[$class] = $instance;
    }

}
