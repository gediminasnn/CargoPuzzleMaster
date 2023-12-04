<?php
require_once __ROOT__ . "/Container/AbstractContainer.php";

class Standard10ftContainer extends AbstractContainer {
    public function __construct() {
        $this->width = 234.8;
        $this->height = 238.44;
        $this->length = 279.4;
    }
}
