<?php

declare(strict_types=1);

namespace CLIgame;

class Prize
{

    public function __construct(
        private int $calcInput,
        private int $drawInput
    )
    {
    }

    /**
     * @return int
     */
    public function getCalcInput(): int
    {
        return $this->calcInput;
    }

    /**
     * @param int $calcInput
     */
    public function setCalcInput(int $calcInput): void
    {
        $this->calcInput = $calcInput;
    }

    /**
     * @return int
     */
    public function getDrawInput(): int
    {
        return $this->drawInput;
    }

    /**
     * @param int $drawInput
     */
    public function setDrawInput(int $drawInput): void
    {
        $this->drawInput = $drawInput;
    }

    public function drawPrize(): void
    {

        for ($i = 1; $i <= $this->drawInput; $i++) {
            for ($j = 1; $j <= $this->calcInput; $j++) {
                if ($i == 1 || $i == $this->drawInput || $j == 1 || $j == $this->calcInput)
                    echo "*  ";
                else
                    echo "   ";
            }
            echo "\n";
        }
    }
}