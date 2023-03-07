<?php
namespace Widget;

class Link extends Widget {
    public function draw() : void {
        $key = $this->key();
        echo "<a href = \"\" >$key</a> ";
    }
}