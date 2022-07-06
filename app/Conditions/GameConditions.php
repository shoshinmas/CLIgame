<?php

declare(strict_types=1);

namespace App\Conditions;

class GameConditions
{

    public function __construct(
        private int $calcTries,
        private int $drawTries
    )
    {
    }

    /**
     * @return int
     */
    public function getCalcTries(): int
    {
        return $this->calcTries;
    }

    /**
     * @return int
     */
    public function getDrawTries(): int
    {
        return $this->drawTries;
    }

    public function setCalcTries(int $level)
    {
        $this->calcTries = $level;
    }

    public function setDrawTries(int $level)
    {
        $this->drawTries = 2 * $level;
    }
}