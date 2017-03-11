<?php

namespace Vindaloo;

class Curry {

  public static function curry(\Closure $closure) {
    return self::_curry($closure, 1);
  }

  public static function curry_right(\Closure $closure) {
    return self::_curry($closure, -1);
  }

  public static function _curry(\Closure $closure, $direction) {
    $argument_count = (new \ReflectionFunction($closure))->getNumberOfParameters();
    if ($argument_count < 2) {
      // We just return the plain closure.
      return $closure;
    }
    else {
      $remaining_steps = $argument_count;
      return function ($arg) use ($remaining_steps, $closure, $direction) {
        return self::_curry_step([$arg], $remaining_steps, $closure, $direction);
      };
    }
  }

  public static function _curry_step(array $args, $remaining_steps, \Closure $closure, $direction) {
    if ($remaining_steps > 1) {
      return function ($arg) use ($args, $remaining_steps, $closure, $direction) {
        $new_args = $direction > 0 ? array_merge($args, [$arg]) : array_merge([$arg], $args);
        return self::_curry_step($new_args, $remaining_steps - 1, $closure, $direction);
      };
    }
    else {
      return $closure(...$args);
    }
  }

}
