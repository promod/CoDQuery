<?php

namespace Promod\CoDQuery;

class CoDClient
{
    $name;
    $score;
    $ping;

    function __construct($name, $score, $ping)
    {
        $this->name = $name;
        $this->score = $score;
        $this->ping = $ping;
    }
}
