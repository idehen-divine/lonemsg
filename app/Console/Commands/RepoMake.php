<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Commands\RepositoryPattern;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class RepoMake extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repo {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates the required tooling for new repositories automatically';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the name of the group from the command line arguments
        $name = $this->argument('name');

        return $this->createFiles($name);
    }

    use RepositoryPattern;

    /**
     * responsible for creating the files
     * 
     * @param $name
     * @return void
     */
    private function createFiles($name): void
    {
        $this->filePath = app_path('Libs');
        $this->baseTemplateDir = __DIR__ . "/Stubs/";

        // Set the output format to make it blue
        $this->getOutput()->getFormatter()->setStyle('info', new OutputFormatterStyle('white'));
        
        $this->interface($name);
        $this->repository($name);
        $this->action($name);
    }
}
