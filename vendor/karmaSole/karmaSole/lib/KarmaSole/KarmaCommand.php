<?php
namespace KarmaSole;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use KarmaSole\Console;

class KarmaCommand extends Command
{
    private $conf, $container;

    public function __construct(\Pimple $container)
    {
        $this->container = $container;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('karmaSole:acorta')
                ->setDescription('Acorta url con karmacracy')
                ->addArgument('url', InputArgument::OPTIONAL, 'Url a acortar');
    }

    protected function formatOutput(OutputInterface $output, $result)
    {
        $output->writeln("<comment>shorturl:</comment> http://kcy.me/" . $result["shorturl"]);
        $output->writeln("<comment>mykcytype:</comment> " . $result["mykcytype"]);
        $output->writeln("<comment>mykclicks:</comment> " . $result["mykclicks"]);
        $output->writeln('');
        $output->writeln("<comment>Personas que han compartido este enlace:</comment> ");
        foreach ($result["humans"] as $human) {
            $output->writeln(
                "  <comment>Usuario:</comment> {$human["username"]}. <comment>kcyrank:</comment> {$human["kcyrank"]}"
            );
        }
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = $input->getArgument('url');
        if ($url == '') {
            $dialog = $this->getHelperSet()->get('dialog');
            $url    = $dialog->ask($output, '<question>Dame la url</question>  ');
        }
        $output->writeln("<info>Acortando: {$url} ...</info>");

        $kcy = new Console($this->container);
        $result = $kcy->shorten($url);
        $this->formatOutput($output, $result);
    }
}