<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class RepoBind extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repo:bind {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bind a repository to its corresponding interface';

    /**
     * The repository file path.
     */
    protected $repositoryPath;

    /**
     * The repository interface file path.
     */
    protected $interfacePath;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        $this->repositoryPath = app_path("Libs/Repositories/{$name}Repository.php");
        $this->interfacePath = app_path("Libs/RepositoryInterfaces/{$name}RepositoryInterface.php");

        $interfaceNamespace = "App\\Libs\\RepositoryInterfaces\\{$name}RepositoryInterface";
        $repositoryNamespace = "App\\Libs\\Repositories\\{$name}Repository";

        $this->validateFiles($name);
        $this->bind($name, $repositoryNamespace, $interfaceNamespace);
    }

    /**
     * Checks if repository and interface files exist.
     *
     * @param string $name
     */
    private function validateFiles($name): void
    {
        if (!File::exists($this->repositoryPath)) {
            $this->error("{$name}Repository file not found!");
            exit(1); // Exit with an error code
        }

        if (!File::exists($this->interfacePath)) {
            $this->error("{$name}RepositoryInterface file not found!");
            exit(1); // Exit with an error code
        }
    }

    /**
     * Perform the binding logic.
     *
     * @param string $name
     * @param string $repositoryNamespace
     * @param string $interfaceNamespace
     */
    private function bind($name, $repositoryNamespace, $interfaceNamespace): void
    {
        // Provider file path
        $providerPath = app_path('Providers/RepositoryServiceProvider.php');

        // Check if the provider file exists, and create it if not
        if (!File::exists($providerPath)) {
            $this->call('make:provider', ['name' => 'RepositoryServiceProvider']);
            $config = base_path('config/app.php');
            $this->info(' ');
            $this->getOutput()->write("  <fg=white;bg=blue;options=bold> INFO </> Bind Add <options=bold>['App\Providers\RepositoryServiceProvider::class']</> to the providers array in <options=bold>[{$config}]</>");
            $this->info(' ');
        }

        // Read the content of the provider file
        $providerContent = File::get($providerPath);

        // Check if the namespaces are already bound
        $repositoryBinding = "\$this->app->bind({$name}RepositoryInterface::class, {$name}Repository::class);";

        if (Str::contains($providerContent, $repositoryBinding)) {
            $this->info(' ');
            $this->getOutput()->write("  <fg=white;bg=blue;options=bold> INFO </> Bind <options=bold>[{$this->interfacePath}]</> is already bonded to <options=bold>[{$this->repositoryPath}]</>");
            $this->info(' ');
        } else {
            // Find the position to insert the binding inside the register method after the opening curly brace
            $insertPosition = strpos($providerContent, '{', strpos($providerContent, 'public function register(): void')) + 1;

            // Insert the binding into the register method
            $providerContent = substr_replace($providerContent, "\n\t\t" . $repositoryBinding . "\n\t", $insertPosition, 0);

            // Check if the namespaces are already imported
            $namespaceImport = "use {$interfaceNamespace};\nuse {$repositoryNamespace};";

            if (!Str::contains($providerContent, $namespaceImport)) {
                // Insert the namespace imports at the top of the file
                $providerContent = "<?php\n\nnamespace App\Providers;\n\nuse Illuminate\Support\ServiceProvider;\n\n"
                . "{$namespaceImport}\n\n" . substr($providerContent, strlen("<?php\n\nnamespace App\Providers;\n\nuse Illuminate\Support\ServiceProvider;\n\n"));
            }

            // Write the modified content back to the provider file
            File::put($providerPath, $providerContent);

            $this->info(' ');
            $this->getOutput()->write("  <fg=white;bg=blue;options=bold> INFO </> Bind <options=bold>[{$this->interfacePath}]</> successfully bond to <options=bold>[{$this->repositoryPath}]</>");
            $this->info(' ');
        }
    }


}
