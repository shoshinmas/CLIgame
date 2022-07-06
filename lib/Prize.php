<?php

declare(strict_types=1);

namespace CLIgame;

class Prize
{

    public function __construct(
        private readonly int $calcInput,
        private readonly int $drawInput
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

    /**
     * @param int $drawInput
     * @param int $calcInput
     */
    public function drawPrize(int $drawInput, int $calcInput): void
    {
        for ($i = 1; $i <= $drawInput; $i++) {
            for ($j = 1; $j <= $calcInput; $j++) {
                if ($i == 1 || $i == $drawInput || $j == 1 || $j == $calcInput)
                    CliPrinter::class->out("*  ");
                else
                    echo CliPrinter::class->out("   ");
            }
            CliPrinter::class->newLine();
        }
    }
}