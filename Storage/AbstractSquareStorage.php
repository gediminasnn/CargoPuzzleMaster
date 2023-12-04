<?php

abstract class AbstractSquareStorage {
    protected float $width;
    protected float $height;
    protected float $length;

    public function getWidth(): float {
        return $this->width;
    }

    public function getHeight(): float {
        return $this->height;
    }

    public function getLength(): float {
        return $this->length;
    }

    public function getVolume(): float {
        return $this->width * $this->height * $this->length;
    }
}
