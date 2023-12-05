<?php

require_once __ROOT__ . "/Package/AbstractPackage.php";

class MediumPackage extends AbstractPackage {
    public function __construct() {
        $this->width = 60;
        $this->height = 80;
        $this->length = 150;
    }
}
