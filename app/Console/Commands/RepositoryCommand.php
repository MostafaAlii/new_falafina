<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;

class RepositoryCommand extends Command
{
    protected $files;

    protected $signature = 'make:repository {name}';

    protected $description = 'Create Custom Repository';

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function getSingularClassName($name)
    {
        return ucwords(Pluralizer::singular($name));
    }

    public function getStubPath()
    {
        return __DIR__.'/../../../stubs/repository.stub';
    }

    public function getStubVariables()
    {
        return [
            'REPOSITORY_NAMESPACE' => 'App\\Repositories\\Eloquents',
            'INTERFACE_NAMESPACE' => 'App\\Repositories\\Contracts'.'\\',
            'MODEL_NAMESPACE' => 'App\\Models'.'\\',
            'REPOSITORY_NAME' => $this->getSingularClassName($this->argument('name')),
        ];
    }

    public function getSourceFile()
    {
        return $this->getStubContents($this->getStubPath(), $this->getStubVariables());
    }

    public function getStubContents($stub, $stubVariables = [])
    {
        $contents = file_get_contents($stub);
        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace('$'.$search.'$', $replace, $contents);
        }

        return $contents;
    }

    public function getSourceFilePath()
    {
        return base_path('App\\Repositories\\Eloquents').'\\'.$this->getSingularClassName($this->argument('name')).'Repository.php';
    }

    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }

    public function handle()
    {
        $path = $this->getSourceFilePath();
        $this->makeDirectory(dirname($path));
        $contents = $this->getSourceFile();
        if (! $this->files->exists($path)) {
            $this->files->put($path, $contents);
            $this->info("File : {$path} Done The Repository Created Successfully");
        } else {
            $this->info("File : {$path} already exits");
        }
    }
}
