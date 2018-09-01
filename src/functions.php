<?php

namespace Vindaloo\Helper;

use Vindaloo\Curry;
use Vindaloo\CurryRight;
use Vindaloo\Partial;

function curry(\Closure $closure) {
  return (new Curry($closure))->execute();
}

function curry_right(\Closure $closure) {
  return (new CurryRight($closure))->execute();
}

function bind(\Closure $closure, ...$early_args) {
  return Partial::bind($closure, ...$early_args);
}

function bind_right(\Closure $closure, ...$early_args) {
  return Partial::bindRight($closure, ...$early_args);
}
