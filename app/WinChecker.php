<?php

namespace App;

use App\Conditions\GamePrompter;

class WinChecker
{
    protected int $numberOfPrompts;
    protected GamePrompter $prompter;

    public function __construct(
        private int $userInput,
        private int $victoryCondition,
        private int $numberOfTries
    )
    {
    }

    public function checkCalc(): bool
    {
        for ($i = 1; $i<=$this->numberOfTries; $i++){
            if($this->userInput==$this->victoryCondition)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
        return 0;
    }

    public function checkDraw(): bool
    {
        $this->numberOfPrompts = (int)(($this->numberOfTries)/2);
        for ($i = 1; $i<=$this->numberOfTries; $i++){
            if(($this->userInput==$this->victoryCondition))
            {
                return 1;
            }
            else if (($this->userInput<=$this->victoryCondition) && ($i <= $this->numberOfPrompts))
            {
                echo "The number is lower than your guess, try again";
            }
            else if (($this->userInput>=$this->victoryCondition) && ($i <= $this->numberOfPrompts))
            {
                echo "The number is higher than your guess, try again";
            }
        }
        return 0;
    }
}