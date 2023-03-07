<?php

namespace Storage ;

use Concept\Distinguishable;

interface Storage{
    public function store(Distinguishable $x) : void;
    /**
     * @return Distinguishable[]
     */
    public function loadAll():array  ; //  : Distinguishable[];
}