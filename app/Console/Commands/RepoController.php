<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class RepoController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repocontroller {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate controller, repository, and interface for repository pattern';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $name = $this->removeControllerSuffix($name);
        $this->generateController($name);
        $this->repositoryGenerator($name);
        $this->interfaceGenerator($name);
        // $this->info('Controller, Repository, and Interface generated successfully.');
    }

    /**
     * Remove "Controller" suffix if present.
     */
    protected function removeControllerSuffix($name)
    {
        return preg_replace('/Controller$/', '', $name);
    }

    /**
     * Generate controller.
     */
    protected function generateController($name)
    {
        $controllerContent = $this->getControllerContent($name);
        $controllerFileName = "{$name}Controller.php";
        $controllerDirectory = app_path('Http/Controllers/');
        if (!File::isDirectory($controllerDirectory)) {
            File::makeDirectory($controllerDirectory, 0755, true);
        }
        $controllerPath = "{$controllerDirectory}/{$controllerFileName}";
        File::put($controllerPath, $controllerContent);
        $this->info("Controller [{$controllerPath}] created successfully");
    }

    /**
     * Generate repository.
     */
    protected function repositoryGenerator($name)
    {
        $repositoryContent = $this->getRepositoryContent($name);
        $repositoryFileName = "{$name}Repository.php";
        $repositoryDirectory = app_path('Repository');
        if (!File::isDirectory($repositoryDirectory)) {
            File::makeDirectory($repositoryDirectory, 0755, true);
        }
        $repositoryPath = "{$repositoryDirectory}/{$repositoryFileName}";
        File::put($repositoryPath, $repositoryContent);
        $this->info("Controller [{$repositoryPath}] created successfully");
    }

    /**
     * Generate repository interface.
     */
    protected function interfaceGenerator($name)
    {
        $interfaceContent = $this->getInterfaceContent($name);
        $interfaceFileName = "{$name}RepositoryInterface.php";
        $interfaceDirectory = app_path('Interfaces');
        if (!File::isDirectory($interfaceDirectory)) {
            File::makeDirectory($interfaceDirectory, 0755, true);
        }
        $interfacePath = "{$interfaceDirectory}/{$interfaceFileName}";
        File::put($interfacePath, $interfaceContent);
        $this->info("Controller [{$interfacePath}] created successfully");
    }

    /**
     * Generated controller contents.
     */
    protected function getControllerContent($name)
    {
        return "<?php\n\nnamespace App\Http\Controllers;\n\nclass {$name}Controller\n{\n    // Your controller logic goes here\n}";
    }

    /**
     * Generate repository contents.
     */
    protected function getRepositoryContent($name)
    {
        return "<?php\n\nnamespace App\Repository;\n\nclass {$name}Repository implements {$name}RepositoryInterface\n{\n    // Your repository logic goes here\n}";
    }

    /**
     * Generate repository interface contents.
     */
    protected function getInterfaceContent($name)
    {
        return "<?php\n\nnamespace App\Interfaces;\n\ninterface {$name}RepositoryInterface\n{\n    // Your interface methods go here\n}";
    }
}
