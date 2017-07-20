<?php

namespace NTPBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CronTriggersCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
                // the name of the command (the part after "app/console")
                ->setName('ntp:send-email')

                // the short description shown while running "php app/console list"
                ->setDescription('Sends cron emails weekly')

                // the full command description shown when running the command with
                // the "--help" option
                ->setHelp('This command should be used by corn jobs to send automated emails')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        //send paragon data
        $data = $this->getContainer()->get('ntp.weekly_cron_extract')->readVolume();
        if (!is_null($data)) {
            $this->getContainer()->get('app.custom_mailer')->weekExtractMail($data);
        }

        //send volume report
        $data = $this->getContainer()->get('app.pdf_generate')->pdfVolumePrepare();
        if (!is_null($data)) {
            $this->getContainer()->get('app.custom_mailer')->weekExtractMail($data);
        }
        
        //send tractor usage report report
        $data = $this->getContainer()->get('app.pdf_generate')->pdfTractorUsagePrepare();
        if (!is_null($data)) {
            $this->getContainer()->get('app.custom_mailer')->weekExtractMail($data);
        }
    }

}
