<?php

namespace App\Conditions;

enum GameLevel
{
    case ONE;
    case TWO;
    case THREE;
    case FOUR;
    case FIVE;

    public function setCalcTries(): int
    {
        return match($this)
        {
            self::ONE=> 1,
            self::TWO=> 2,
            self::THREE=> 3,
            self::FOUR=> 4,
            self::FIVE=> 5,
        };
    }

    public function setDrawTries(): int
    {
        return match($this)
        {
            self::ONE=> 2,
            self::TWO=> 4,
            self::THREE=> 6,
            self::FOUR=> 8,
            self::FIVE=> 10,
        };
    }

    public function setDrawPromptsCount(): int
    {
        return match($this)
        {
            self::ONE=> 1,
            self::TWO=> 2,
            self::THREE=> 3,
            self::FOUR=> 4,
            self::FIVE=> 5,
        };
    }
}