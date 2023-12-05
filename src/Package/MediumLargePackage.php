<?php

require_once __ROOT__ . "/Package/AbstractPackage.php";

class MediumLargePackage extends AbstractPackage {
    public function __construct() {
        $this->width = 75;
        $this->height = 100;
        $this->length = 200;
    }
}
