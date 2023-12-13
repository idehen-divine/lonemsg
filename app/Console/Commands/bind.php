<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class bind extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bind {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bind a repository to its corresponding interface';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $repositoryPath = app_path("Repository/{$name}.php");
        $interfacePath = app_path("Interfaces/{$name}Interface.php");
        $interfaceNamespace = "App\\Interfaces\\{$name}Interface";
        $repositoryNamespace = "App\\Repository\\{$name}";
        $interfaceFilename = "{$name}Interface";
        $repositoryFilename = "{$name}";
        if (File::exists($repositoryPath) && File::exists($interfacePath)) {
            $this->info("Binding {$name}Repository to {$name}RepositoryInterface.");
            $this->addBindingToServiceProvider($interfaceNamespace, $repositoryNamespace, $interfaceFilename, $repositoryFilename);
        } else {
            $this->error("Repository or Interface file not found for {$name}.");
        }
    }

    /**
     * Add the binding code generated to repository service provider.
     */
    protected function addBindingToServiceProvider($interfaceNamespace, $repositoryNamespace, $interfaceFilename, $repositoryFilename)
    {
        $serviceProviderPath = app_path('Providers/RepositoryServiceProvider.php');
        if (!File::exists($serviceProviderPath)) {
            $this->call('make:provider', ['name' => 'RepositoryServiceProvider']);
            $this->info("Don't forget to add 'App\Providers\RepositoryServiceProvider::class' to the providers array in config/app.php");
        }
        if (File::exists($serviceProviderPath)) {
            $serviceProviderContent = File::get($serviceProviderPath);
            $useStatements = "use {$interfaceNamespace};\nuse {$repositoryNamespace};";
            $serviceProviderContent = preg_replace(
                '/<\?php\s+namespace App\\\\Providers;/',
                "<?php\n\nnamespace App\\Providers;\n{$useStatements}",
                $serviceProviderContent
            );
            $bindingCode = "\$this->app->bind({$interfaceFilename}::class, {$repositoryFilename}::class);";
            if (strpos($serviceProviderContent, $bindingCode) === false) {
                $serviceProviderContent = preg_replace(
                    '/public\s+function\s+register\s*\(\s*\)\s*\:\s+void\s*\{/',
                    "public function register(): void\n    {\n        // Automatically generated binding code\n        {$bindingCode}",
                    $serviceProviderContent
                );
                File::put($serviceProviderPath, $serviceProviderContent);
                $this->info('Binding and namespaces added to RepositoryServiceProvider.');
            } else {
                $this->info('Binding and namespaces already exist in RepositoryServiceProvider.');
            }
        } else {
            $this->error('Failed to create or locate RepositoryServiceProvider.');
        }
    }

}
