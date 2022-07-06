<?php

namespace App;

class Memory
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


}