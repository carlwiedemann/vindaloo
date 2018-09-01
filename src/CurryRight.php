<?php

namespace Vindaloo;

class CurryRight extends Curry {

  protected function transformArgs($args) {
    return array_reverse($args);
  }

}
