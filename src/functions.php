<?php

namespace Vindaloo\Helper;

use Vindaloo\Curry;
use Vindaloo\Partial;

function curry(\Closure $closure) {
  return Curry::curry($closure);
}

function curry_right(\Closure $closure) {
  return Curry::curry_right($closure);
}

function bind(\Closure $closure, ...$early_args) {
  return Partial::bind($closure, ...$early_args);
}

function bind_right(\Closure $closure, ...$early_args) {
  return Partial::bind_right($closure, ...$early_args);
}
