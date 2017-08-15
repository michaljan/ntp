<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace NTPBundle\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class TestCommand extends ContainerAwareCommand {
    protected function configure() {
        $this
                // the name of the command (the part after "app/console")
                ->setName('ntp:test')

                // the short description shown while running "php app/console list"
                ->setDescription('Test command')

                // the full command description shown when running the command with
                // the "--help" option
                ->setHelp('Test command helper')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $start=new \DateTime();
        $output->writeln([$start->format('Y-m-d H:i:s')]);
        $data = $this->getContainer()->get('app.pdf_generate')->pdfVolumePrepare();
        if (!is_null($data)) {
            $output->writeln(['Volme report completed']);
        }
        
        //send tractor usage report report
        $data = $this->getContainer()->get('app.pdf_generate')->pdfTractorUsagePrepare();
        if (!is_null($data)) {
            $output->writeln(['Transport report completed']);
        }
        $end=new \DateTime();  
        
        $output->writeln([$end->format('Y-m-d H:i:s')]);
        $output->writeln([
        'Command completed',
        '============',
        '',]);
    }
}
