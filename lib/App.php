<?php

declare(strict_types=1);

namespace CLIgame;
use app\Conditions\GameConditions;
use App\Conditions\GameLevel;
use App\Conditions\GamePrompter;
use App\WinChecker;

class App
{
    protected $printer;
    protected $level;
    protected $drawResult;

    public function __construct(
    )
    {
        $this->printer = new CliPrinter();
        $this->drawResult = new Draw();
    }

    public function getPrinter()
    {
        return $this->printer;
    }

    public function getDrawResult()
    {
        return $this->drawResult;
    }

    /**
     * @param mixed $level
     */
    public function setLevel(string $level): void
    {
        $this->level = $level;
    }

    public function runCommand(array $argv)
    {
        $name = "Robinson Crusoe";
        if (isset($argv[1])) {
            $name = $argv[1];
        }

        $this->getPrinter()->display("Hello $name! Welcome to magnificient world of gambling. If you feel lucky today, 
        choose your level of difficulty (between ONE and FIVE, where ONE is the highest");
        $level = $this->getPrinter()->takeinput();
        $this->setLevel($level);
        $this->getPrinter()->display("Well done, $name! We will now display an equation. You simply have to type in your 
        result");
        $x = $this->getDrawResult()->generateDraw();
        $y = $this->getDrawResult()->generateDraw();
        $calc = new Calculator($x, $y);
        $calcResult = $calc->add($x, $y);
        $this->getPrinter()->display("$x + $y = ");
        $calcInput = (int) $this->getPrinter()->takeinput();
        $winOne = new WinChecker($calcInput, $calcResult, GameConditions::class->setCalcTries($level));
        $winOne->checkCalc();
        if($winOne)
        {
            $this->getPrinter()->display("Well done, $name! We will now draw a number betwen 1 and 100. You simply have 
            to guess your result. Type it below");
            $z = $this->getDrawResult()->generateDraw();
            $drawInput = (int) $this->getPrinter()->takeinput();
            $winTwo = new WinChecker($drawInput, $z, GameConditions::class->setDrawTries($level));
            $winTwo->checkDraw();
            if ($winTwo)
            {
                $prize = new Prize($calcInput, $drawInput);
                echo "Congratulations, you won a prize";
                $prize->drawPrize();
            }
            else
            {
                echo "Game over";
                exit();
            }
        }
        else {
            echo "Game over";
            exit();
        }
    }
}