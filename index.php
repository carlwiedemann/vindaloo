<?php

require './vendor/autoload.php';

use Vindaloo\Helper as V;

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

  $divide10By = V\bind($divide, 10);
  $divideBy10 = V\bind_right($divide, 10);

  var_dump($divide10By(10));  // Outputs 1
  var_dump($divideBy10(100)); // Outputs 10

  var_dump($zero());
  $alpha = V\curry($zero);
  var_dump($alpha());

  var_dump($one(2));
  $alpha = V\curry($one);
  var_dump($alpha(2));

  var_dump($two(5, 2));
  $alpha = V\curry($two);
  $beta = $alpha(5);
  var_dump($beta(2));

  var_dump($three(2, 3, 4));
  $alpha = V\curry($three);
  $beta = $alpha(2);
  $gamma = $beta(3);
  $omega = $gamma(4);
  var_dump($omega);

  var_dump($three(4, 3, 2));
  $alpha = V\curry_right($three);
  $beta = $alpha(2);
  $gamma = $beta(3);
  $omega = $gamma(4);
  var_dump($omega);

}

