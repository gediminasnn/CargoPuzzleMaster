<?php
require_once __ROOT__ . "/Package/AbstractPackage.php";

class ToysPackage extends AbstractPackage {
    public function __construct() {
        $this->width = 78;
        $this->height = 79;
        $this->length = 93;
    }
}
