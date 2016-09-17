<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class ParserCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this->setName('app:parser:import')
             ->setDescription('Download products feed and save parsed data.')
             ->setHelp(
                <<<EOT
Download products feed and save parsed data.
EOT
            )
            ->addArgument('url', InputArgument::REQUIRED, 'Feed URL');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Get container
        $container = $this->getContainer();

        $url = $input->getArgument('url');

        $container->get('app.parser')->downloadProductsFeed($output, $url);
    }

}
