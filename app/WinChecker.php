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

    public function checkCalc(){
        for ($i = 1; $i<=$this->numberOfTries; $i++){
            if($this->userInput==$this->victoryCondition)
            {
                return Memory::class->setCalcInput($this->userInput);
            }
            else
            {
                return $this->prompter->tryAgain();
            }
        }
    }

    public function checkDraw(): bool
    {
        for ($i = 1; $i<=$this->numberOfTries; $i++){
            if(($this->userInput==$this->victoryCondition))
            {
                return Memory::class->setDrawInput($this->userInput);
            }
            else if (($this->userInput<=$this->victoryCondition) && ($i <= $this->numberOfPrompts))
            {
                $prompter = $this->prompter->ifNumberLower();
                return false;
            }
            else if (($this->userInput>=$this->victoryCondition) && ($i <= $this->numberOfPrompts))
            {
                return $this->prompter->ifNumberHigher();
            }
            else
            {
                return $this->prompter->ifRunoutOfChances();
            }
        }
    }
}