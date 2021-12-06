<?php
declare(strict_types=1);

namespace {{ cookiecutter.project_namespace }}\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Laminas\Log\LoggerAwareInterface;
use Laminas\Log\LoggerAwareTrait;
use Exception;

class ExampleCommand extends Command implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    protected static $defaultName = "example";

    public function execute(InputInterface $input, OutputInterface $output) : int
    {
        $output->writeln("example called");
        return Command::SUCCESS;
    }
}
