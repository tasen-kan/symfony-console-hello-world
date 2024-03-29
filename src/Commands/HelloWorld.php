<?php

declare(strict_types=1);
namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorld extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'hello';

    protected function configure(): void
    {
        $this
            // If you don't like using the $defaultDescription static property,
            // you can also define the short description using this method:
            // ->setDescription('...')

            // the command help shown when running the command with the "--help" option
            ->setDescription('HelloWorld command')
            ->addArgument(
                'name',
                InputArgument::OPTIONAL,
                'Your name'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // ... put here the code to create the user

        // this method must return an integer number with the "exit status code"
        // of the command. You can also use these constants to make code more readable

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
//        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;

        // or return this to indicate incorrect command usage; e.g. invalid options
        // or missing arguments (it's equivalent to returning int(2))
        // return Command::INVALID
        if (!$name = $input->getArgument('name')) {
            $name = 'World';
        }
        $output->writeln('<info>Hello, ' . $name . '!</info>');
        return Command::SUCCESS;
    }
}
