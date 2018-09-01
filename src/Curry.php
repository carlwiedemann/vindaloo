<?php

namespace Vindaloo;

class Curry {

  protected $reflected_closure;

  function __construct(\Closure $closure) {
    $this->reflected_closure = new ReflectedClosure($closure);
  }

  /**
   * Recursive curry.
   *
   * @param array $args
   *   Arguments, used internally.
   *
   * @return \Closure
   *   Curried closure.
   */
  private function recurse(array $args = []) {
    if ($this->reflected_closure->parameter_count > count($args)) {
      return function ($arg) use ($args) {
        return $this->recurse(array_merge($args, [$arg]));
      };
    }
    $closure = $this->reflected_closure;
    return $closure(...($this->transformArgs($args)));
  }

  public function execute() {
    return $this->recurse();
  }

  protected function transformArgs($args) {
    return $args;
  }

}
