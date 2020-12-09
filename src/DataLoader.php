<?php

namespace Tsekka\DataLoader;

use SplFileInfo;
use Symfony\Component\Finder\Finder;
use Tsekka\DataLoader\DataRepository;

class DataLoader
{
    /**
     * @var DataRepository
     */
    public $repository;

    public function __construct()
    {
        $this->repository = new DataRepository();
        $this->load($this->repository);
    }

    /**
     * Load the files
     *
     * @param DataRepository $repository
     * @return void
     */
    public function load(DataRepository $repository)
    {
        $files = $this->getDataFiles();

        foreach ($files as $key => $path) {
            $repository->set($key, require $path);
        }
    }

    /**
     * Get the array of files
     *
     * @return array
     */
    public function getDataFiles(): array
    {
        $files = [];
        $configPath = base_path(config('data-loader.path'));
        foreach (Finder::create()->files()->name('*.php')->in($configPath) as $file) {
            $directory = $this->getNestedDirectory($file, $configPath);

            $files[$directory . basename($file->getRealPath(), '.php')] = $file->getRealPath();
        }

        ksort($files, SORT_NATURAL);

        return $files;
    }

    /**
     * Get nested direcotry
     *
     * @param SplFileInfo $file
     * @param string $configPath
     * @return string
     */
    protected function getNestedDirectory(SplFileInfo $file, string $configPath): string
    {
        $directory = $file->getPath();

        if ($nested = trim(str_replace($configPath, '', $directory), DIRECTORY_SEPARATOR)) {
            $nested = str_replace(DIRECTORY_SEPARATOR, '.', $nested) . '.';
        }

        return $nested;
    }
}
