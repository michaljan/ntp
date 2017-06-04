<?php

namespace NTPBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use \NTPBundle\Cron\CronTriggers;

class SendEmailCommand extends Command
{
    protected function configure()
    {
        $this
        // the name of the command (the part after "app/console")
        ->setName('ntp:send-email')

        // the short description shown while running "php app/console list"
        ->setDescription('Sends cron emails')

        // the full command description shown when running the command with
        // the "--help" option
        ->setHelp('This command should be used by corn jobs to send automated emails')
    ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $mailer=new CronTriggers;
        $mailer->weekExtractTrigger();
        
        
    }
}
