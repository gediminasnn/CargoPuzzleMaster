<?php
require_once __ROOT__ . "/Package/AbstractPackage.php";

class SmallPackage extends AbstractPackage {
    public function __construct() {
        $this->width = 30;
        $this->height = 60;
        $this->length = 90;
    }
}
