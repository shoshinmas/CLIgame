<?php

declare(strict_types=1);

namespace CLIgame;

class Draw
{
    private int $drawResult;
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getDrawResult()
    {
        return $this->drawResult;
    }

    /**
     * @param mixed $drawResult
     */
    public function setDrawResult(int $drawResult): void
    {
        $this->drawResult = $drawResult;
    }

    public function generateDraw(): int
    {
        return rand(1, 100);
    }



}