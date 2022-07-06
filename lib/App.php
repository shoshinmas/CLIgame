<?php

declare(strict_types=1);

namespace CLIgame;


class App
{
    protected $printer;

    public function __construct(
    )
    {
        $this->printer = new CliPrinter();
    }

    public function getPrinter()
    {
        return $this->printer;
    }
    public function runCommand(array $argv)
    {
        $name = "World";
        if (isset($argv[1])) {
            $name = $argv[1];
        }

        $this->getPrinter()->display("Hello $name!!!");
    }
}