<?php

require_once __ROOT__ . "/Package/AbstractPackage.php";

class LargePackage extends AbstractPackage {
    public function __construct() {
        $this->width = 80;
        $this->height = 100;
        $this->length = 200;
    }
}
