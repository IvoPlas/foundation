<?php

declare(strict_types=1);

namespace IvoPlas\SymfonyFoundationBundle\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'foundation:hello',
    description: 'A hello command from the Foundation bundle',
)]
class HelloCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->addArgument('name', InputArgument::OPTIONAL, 'Your name')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $name = $input->getArgument('name');

        if ($name) {
            $io->success(sprintf('Hello %s from the Foundation bundle!', $name));
        } else {
            $io->success('Hello from the Foundation bundle!');
        }

        return Command::SUCCESS;
    }
}
