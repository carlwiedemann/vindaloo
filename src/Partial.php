<?php

namespace Vindaloo;

class Partial {

  public static function bind(\Closure $closure, ...$early_args): \Closure {
    return function (...$late_args) use ($closure, $early_args) {
      return $closure(...array_merge($early_args, $late_args));
    };
  }

  public static function bindRight(\Closure $closure, ...$early_args): \Closure {
    return function (...$late_args) use ($closure, $early_args) {
      return $closure(...array_merge($late_args, array_reverse($early_args)));
    };
  }

}
