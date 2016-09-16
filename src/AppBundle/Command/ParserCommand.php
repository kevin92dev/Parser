<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
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

    protected function execute(InputInterface $input)
    {
        // Get container
        $container = $this->getContainer();

        $url = $input->getArgument('url');

        $container->get('app.parser')->downloadProductsFeed($url);
    }

}
