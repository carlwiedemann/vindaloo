<?php

use PHPUnit\Framework\TestCase;
use Vindaloo\Partial;
use Vindaloo\Helper as V;

/**
 * Class PartialTest.
 */
class PartialTest extends TestCase {

  /**
   * @return \Closure
   */
  private function getClosure() {
    return function ($a, $b, $c) {
      return $a + $b - $c;
    };
  }

  /**
   * Tests Partial::bind().
   */
  public function testBind() {
    $closure = $this->getClosure();

    $boundWith2 = Partial::bind($closure, 2);
    $boundWith2And3 = Partial::bind($closure, 2, 3);
    $boundWith2And3And4 = Partial::bind($closure, 2, 3, 4);

    $this->assertEquals(1, $boundWith2(3, 4));
    $this->assertEquals(1, $boundWith2And3(4));
    $this->assertEquals(1, $boundWith2And3And4());

    $boundWith4 = Partial::bind($closure, 4);
    $boundWith4And3 = Partial::bind($closure, 4, 3);
    $boundWith4And3And2 = Partial::bind($closure, 4, 3, 2);

    $this->assertEquals(5, $boundWith4(3, 2));
    $this->assertEquals(5, $boundWith4And3(2));
    $this->assertEquals(5, $boundWith4And3And2());
  }

  /**
   * Tests Partial::bind_right().
   */
  public function testBindRight() {
    $closure = $this->getClosure();

    $boundRightWith4 = Partial::bind_right($closure, 4);
    $boundRightWith4And3 = Partial::bind_right($closure, 4, 3);
    $boundRightWith4And3And2 = Partial::bind_right($closure, 4, 3, 2);

    $this->assertEquals(1, $boundRightWith4(2, 3));
    $this->assertEquals(1, $boundRightWith4And3(2));
    $this->assertEquals(1, $boundRightWith4And3And2());

    $boundRightWith2 = Partial::bind_right($closure, 2);
    $boundRightWith2And3 = Partial::bind_right($closure, 2, 3);
    $boundRightWith2And3And4 = Partial::bind_right($closure, 2, 3, 4);

    $this->assertEquals(5, $boundRightWith2(4, 3));
    $this->assertEquals(5, $boundRightWith2And3(4));
    $this->assertEquals(5, $boundRightWith2And3And4());
  }

  /**
   * Tests bind() helper.
   */
  public function testBindHelper() {
    $closure = $this->getClosure();

    $boundWith2 = V\bind($closure, 2);
    $boundWith2And3 = V\bind($closure, 2, 3);
    $boundWith2And3And4 = V\bind($closure, 2, 3, 4);

    $this->assertEquals(1, $boundWith2(3, 4));
    $this->assertEquals(1, $boundWith2And3(4));
    $this->assertEquals(1, $boundWith2And3And4());

    $boundWith4 = V\bind($closure, 4);
    $boundWith4And3 = V\bind($closure, 4, 3);
    $boundWith4And3And2 = V\bind($closure, 4, 3, 2);

    $this->assertEquals(5, $boundWith4(3, 2));
    $this->assertEquals(5, $boundWith4And3(2));
    $this->assertEquals(5, $boundWith4And3And2());
  }

  /**
   * Tests bindRight() helper.
   */
  public function testBindRightHelper() {
    $closure = $this->getClosure();

    $boundRightWith4 = V\bind_right($closure, 4);
    $boundRightWith4And3 = V\bind_right($closure, 4, 3);
    $boundRightWith4And3And2 = V\bind_right($closure, 4, 3, 2);

    $this->assertEquals(1, $boundRightWith4(2, 3));
    $this->assertEquals(1, $boundRightWith4And3(2));
    $this->assertEquals(1, $boundRightWith4And3And2());

    $boundRightWith2 = V\bind_right($closure, 2);
    $boundRightWith2And3 = V\bind_right($closure, 2, 3);
    $boundRightWith2And3And4 = V\bind_right($closure, 2, 3, 4);

    $this->assertEquals(5, $boundRightWith2(4, 3));
    $this->assertEquals(5, $boundRightWith2And3(4));
    $this->assertEquals(5, $boundRightWith2And3And4());
  }

}
