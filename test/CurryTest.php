<?php

use PHPUnit\Framework\TestCase;
use Vindaloo\Curry;
use Vindaloo\Helper as V;

/**
 * Class CurryTest.
 */
class CurryTest extends TestCase {

  /**
   * @return \Closure
   */
  private function getClosure() {
    return function ($a, $b, $c) {
      return $a + $b - $c;
    };
  }

  /**
   * Just a sanity check on the closure we're using for the tests.
   */
  public function testInternalClosure() {
    $closure = $this->getClosure();
    $result = $closure(2, 3, 4);
    $this->assertEquals(1, $result);
    $result = $closure(4, 3, 2);
    $this->assertEquals(5, $result);
  }

  /**
   * Tests Curry::curry().
   */
  public function testCurry() {
    $closure = $this->getClosure();

    $a = Curry::curry($closure);
    $b = $a(2);
    $c = $b(3);
    $d = $c(4);
    $this->assertEquals(1, $d);

    $e = Curry::curry($closure);
    $f = $e(4);
    $g = $f(3);
    $h = $g(2);
    $this->assertEquals(5, $h);
  }

  /**
   * Tests Curry::curryRight().
   */
  public function testCurryRight() {
    $closure = $this->getClosure();

    $a = Curry::curry_right($closure);
    $b = $a(4);
    $c = $b(3);
    $d = $c(2);
    $this->assertEquals(1, $d);

    $e = Curry::curry_right($closure);
    $f = $e(2);
    $g = $f(3);
    $h = $g(4);
    $this->assertEquals(5, $h);
  }

  /**
   * Tests curry() helper.
   */
  public function testCurryHelper() {
    $closure = $this->getClosure();

    $a = V\curry($closure);
    $b = $a(2);
    $c = $b(3);
    $d = $c(4);
    $this->assertEquals(1, $d);

    $e = V\curry($closure);
    $f = $e(4);
    $g = $f(3);
    $h = $g(2);
    $this->assertEquals(5, $h);
  }

  /**
   * Tests curry_right() helper.
   */
  public function testCurryRightHelper() {
    $closure = $this->getClosure();

    $a = V\curry_right($closure);
    $b = $a(4);
    $c = $b(3);
    $d = $c(2);
    $this->assertEquals(1, $d);

    $e = V\curry_right($closure);
    $f = $e(2);
    $g = $f(3);
    $h = $g(4);
    $this->assertEquals(5, $h);
  }

}
