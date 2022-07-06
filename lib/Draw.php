<?php

declare(strict_types=1);

namespace CLIgame;

class Draw
{

    public function __construct()
    {
    }

    public function generateDraw(): int
    {
        return rand(1, 100);
    }



}