<?php

namespace Vindaloo;

class ReflectedClosure {

  public $closure;

  public $parameter_count;

  public function __construct(\Closure $closure) {
    $this->closure = $closure;
    $this->parameter_count = (new \ReflectionFunction($closure))->getNumberOfParameters();
  }

  public function __invoke(...$args) {
    $closure = $this->closure;
    return $closure(...$args);
  }

}

