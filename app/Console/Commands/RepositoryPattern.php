<?php

namespace App\Console\Commands;


use Illuminate\Support\Facades\File;

trait RepositoryPattern
{


    /**
     * The base template dirctory.
     *
     * @var string
     */
    protected $baseTemplateDir;

    /**
     * The file path where the created files would be kept.
     *
     * @var string
     */
    protected $filePath;
    
    /**
     * responsible for creating the repository interface file
     * 
     * @param $name
     * @return void
     */
    private function interface($name): void
    {
        // Load the code template file and replace the placeholders
        $interfaceTemplateFile = $this->baseTemplateDir . "interface.stub";
        $interfaceTemplate = str_replace('{name}', $name, file_get_contents($interfaceTemplateFile));

        // Create the path to the files
        $interfaceFile = $this->filePath . '/RepositoryInterfaces/' . $this->getCreatedFileName($name, "interface");

        // create boilerplates in the various paths
        $this->createDirectory($this->filePath . '/RepositoryInterfaces/');
        file_put_contents($interfaceFile, $interfaceTemplate);

        $this->response("Interface", $interfaceFile);
    }

    /**
     * responsible for creating the repository file
     * 
     * @param $name
     * @return void
     */
    private function repository($name): void
    {
        // Load the code template file and replace the placeholders
        $repositoryTemplateFile = $this->baseTemplateDir . "repository.stub";
        $repositoryTemplate = str_replace('{name}', $name, file_get_contents($repositoryTemplateFile));

        // Create the path to the files
        $repositoryFile = $this->filePath . '/Repositories/' . $this->getCreatedFileName($name, "repository");

        // create boilerplates in the various paths
        $this->createDirectory($this->filePath . '/Repositories/');
        file_put_contents($repositoryFile, $repositoryTemplate);

        $this->response("Repository", $repositoryFile);
    }

    /**
     * responsible for creating the action files
     * 
     * @param $name
     * @return void
     */
    private function action($name): void
    {
        // Load the code template file and replace the placeholders
        $actionTemplateFile = $this->baseTemplateDir . "action.stub";
        $actionTemplate = str_replace('{name}', $name, file_get_contents($actionTemplateFile));

        // Create the path to the files
        $actionFile = $this->filePath . '/Actions/' . $this->getCreatedFileName($name, "action");

        // create boilerplates in the various paths
        $this->createDirectory($this->filePath . '/Actions/');
        file_put_contents($actionFile, $actionTemplate);

        $this->response("Action", $actionFile);
    }

    /**
     * responsible for creating the directories
     * 
     * @param $path
     * @return void
     */
    private function createDirectory($path): void
    {
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0755, true);
        }
    }

    /**
     * response handler
     * 
     * @param $path
     * @return void
     */
    private function response($name, $path): void
    {
        // Add empty lines at the top
        $this->info(' ');

        // Format the response
        $this->getOutput()->write("  <fg=white;bg=blue;options=bold> INFO </> {$name} <options=bold>[{$path}]</> created successfully");

        // Add empty lines at the bottom
        $this->info(' ');
    }

    /**
     * returns a valid php filename
     *
     * @param string $name
     * @param string $fileType
     * @return void
     */
    private function getCreatedFileName(string $name, string $fileType): string|null
    {

        switch ($fileType) {
            case "interface":
                $name = ucfirst($name) . "RepositoryInterface.php";
                break;
            case "repository":
                $name = ucfirst($name) . "Repository.php";
                break;
            case "action":
                $name = ucfirst($name) . "Action.php";
                break;
        }

        return $name;
    }
}