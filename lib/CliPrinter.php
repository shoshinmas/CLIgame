<?php

declare(strict_types=1);

namespace CLIgame;

class CliPrinter
{
    public function out($message)
    {
        echo $message;
    }

    public function newline()
    {
        $this->out("\n");
    }

    public function display($message)
    {
        $this->newline();
        $this->out($message);
        $this->newline();
        $this->newline();
    }

    public function takeinput()
    {
        return readline('');
    }
}