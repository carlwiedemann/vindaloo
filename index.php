<?php

main();

function main() {

  $divide = function ($a, $b) {
    return $a / $b;
  };

  $zero = function () {
    return 0;
  };

  $one = function ($a) {
    return $a;
  };

  $two = function ($a, $b) {
    return $a / $b;
  };

  $three = function ($a, $b, $c) {
    return $a / $b / $c;
  };

  $divide10By = bind($divide, 10);
  $divideBy10 = bind_right($divide, 10);

  var_dump($divide10By(10));  // Outputs 1
  var_dump($divideBy10(100)); // Outputs 10

  var_dump($zero());
  $alpha = curry($zero);
  var_dump($alpha());

  var_dump($one(2));
  $alpha = curry($one);
  var_dump($alpha(2));

  var_dump($two(5, 2));
  $alpha = curry($two);
  $beta = $alpha(5);
  var_dump($beta(2));

  var_dump($three(2, 3, 4));
  $alpha = curry($three);
  $beta = $alpha(2);
  $gamma = $beta(3);
  $omega = $gamma(4);
  var_dump($omega);

  var_dump($three(4, 3, 2));
  $alpha = curry_right($three);
  $beta = $alpha(2);
  $gamma = $beta(3);
  $omega = $gamma(4);
  var_dump($omega);


}

function curry(Closure $closure) {
  return _curry($closure, 1);
}

function curry_right(Closure $closure) {
  return _curry($closure, -1);
}

function _curry(Closure $closure, $direction) {
  $argument_count = (new ReflectionFunction($closure))->getNumberOfParameters();
  if ($argument_count < 2) {
    // We just return the plain closure.
    return $closure;
  }
  else {
    $remaining_steps = $argument_count;
    return function ($arg) use ($remaining_steps, $closure, $direction) {
      return _curry_step([$arg], $remaining_steps, $closure, $direction);
    };
  }
}

function _curry_step(array $args, $remaining_steps, Closure $closure, $direction) {
  --$remaining_steps;
  if ($remaining_steps > 0) {
    return function ($arg) use ($remaining_steps, $closure, $args, $direction) {
      $to_merge = [
        $direction > 0 ? $args : [$arg],
        $direction > 0 ? [$arg] : $args,
      ];
      return _curry_step(array_merge(...$to_merge), $remaining_steps, $closure, $direction);
    };
  }
  else {
    return $closure(...$args);
  }
};

function bind(Closure $closure, ...$early_args): Closure {
  return function (...$late_args) use ($closure, $early_args) {
    $args = array_merge($early_args, $late_args);
    return $closure(...$args);
  };
}

function bind_right(Closure $closure, ...$early_args): Closure {
  return function (...$late_args) use ($closure, $early_args) {
    $args = array_merge($late_args, $early_args);
    return $closure(...$args);
  };
}

