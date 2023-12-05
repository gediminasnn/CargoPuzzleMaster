<?php

require_once __ROOT__ . "/Container/AbstractContainer.php";

class Standard40ftContainer extends AbstractContainer {
    public function __construct() {
        $this->width = 234.8;
        $this->height = 238.44;
        $this->length = 1203.1;
    }
}
