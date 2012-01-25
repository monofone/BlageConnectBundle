<?php

namespace Blage\ConnectBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

/**
 * Fetch sensio profile for a user
 *
 */
class ForceFetchProfileCommand extends ContainerAwareCommand
{
    private $generator;

    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setDefinition(array(
                new InputArgument('username', InputArgument::REQUIRED, 'sensio connect username'),
            ))
            ->setDescription('fetches the sensio connect profile')
            ->setHelp(<<<EOT
The <info>kaoz4:force-fetch-profile</info> command fetches the sensio profile for a given username.

It is useful to force the caching via a cron job rather than letting a visitor request do it.

<info>php app/console kaoz4:force-fetch-sensio digitalkaoz</info>
EOT
            )
            ->setName('blage:force-fetch')
        ;
    }

    /**
     * @see Command
     *
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $cache = $this->getContainer()->get('blage_connect.cache');
       
        $username = $input->getArgument('username');
        
        $output->writeln('Fetching the Sensio Profile for <info>'.$username.'</info>');

        try {
            $cache->fetchProfile(true);
        } catch (\Exception $e) {
            $output->writeln('<error>Unable to fetch Sensio Profile: '.$e->getMessage().'</error>');
        }
    }

}
