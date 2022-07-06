<?php

declare(strict_types=1);

namespace App\Conditions;

class GamePrompter
{

    public function __construct(
        private int $drawPrompts
    )
    {
    }

    /**
     * @return int
     */
    public function getDrawPrompts(): int
    {
        return $this->drawPrompts;
    }

    /**
     * @param int $drawPrompts
     */
    public function setDrawPrompts(int $drawPrompts): void
    {
        $this->drawPrompts = $drawPrompts;
    }

    public function ifNumberHigher(): string
    {
        return "The number is higher than your guess, try again";
    }

    public function ifNumberLower(): string
    {
        return "The number is lower than your guess, try again";
    }

    public function ifRunoutOfChances(): string
    {
        return "You run out of chances, game over";
    }
}