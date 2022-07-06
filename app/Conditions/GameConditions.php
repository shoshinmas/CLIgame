<?php

declare(strict_types=1);

namespace app\Conditions;

class GameConditions
{
    public function setCalcTries(): int
    {
        return match($this)
        {
            GameLevel::ONE=> 1,
            GameLevel::TWO=> 2,
            GameLevel::THREE=> 3,
            GameLevel::FOUR=> 4,
            GameLevel::FIVE=> 5,
        };
    }

    public function setDrawTries(): int
    {
        return match($this)
        {
            GameLevel::ONE=> 2,
            GameLevel::TWO=> 4,
            GameLevel::THREE=> 6,
            GameLevel::FOUR=> 8,
            GameLevel::FIVE=> 10,
        };
    }

    public function setDrawPromptsCount(): int
    {
        return match($this)
        {
            GameLevel::ONE=> 1,
            GameLevel::TWO=> 2,
            GameLevel::THREE=> 3,
            GameLevel::FOUR=> 4,
            GameLevel::FIVE=> 5,
        };
    }
}