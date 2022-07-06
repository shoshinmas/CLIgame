<?php

namespace App;

class WinChecker
{
    protected int $numberOfPrompts;

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
        $this->numberOfPrompts = ($this->numberOfTries);
        for ($i = 1; $i<=$this->numberOfTries; $i++){
            if(($this->userInput===$this->victoryCondition))
            {
                return 1;
            }
            else if(($this->userInput<=$this->victoryCondition))
            {
                echo "Not yet, it's too low";
                $this->userInput = (int)readline();
            }
            else
            {
                echo "Not yet, it's too high";
                $this->userInput = (int)readline();
            }
        }
        return 0;
    }
}