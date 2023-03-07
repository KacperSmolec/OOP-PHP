<?php
namespace Widget;

class Button extends Widget {

    public function draw() : void {
        $key = $this->key();
        echo "<input type=\"button\" value= \"$key\">";
    }
}
