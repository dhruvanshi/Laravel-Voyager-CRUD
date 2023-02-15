<?php

namespace Fen\Fenbooth\Console\Commands;

use Fen\Fenbooth\Providers\FenBoothServiceProvider;
use TCG\Voyager\Traits\Seedable;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    use Seedable;

    protected $seedersPath = __DIR__ .'/../../../database/seeds/';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fenbooth:publish';

    protected $name = 'fenbooth:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installing additional functionality to voyager package';

    /**
     * Get the composer command for the environment.
     *
     * @return string
     */
    protected function findComposer()
    {
        if (file_exists(getcwd() . '/composer.phar')) {
            return '"' . PHP_BINARY . '" ' . getcwd() . '/composer.phar';
        }

        return 'composer';
    }

    public function fire(Filesystem $filesystem)
    {
        return $this->handle($filesystem);
    }

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Publishing Fenbooth assets, database, and config files');
        $this->call('vendor:publish', ['--provider' => FenBoothServiceProvider::class]);

        $this->info('Dumping the autoloaded files and reloading all new files');
        $composer = $this->findComposer();
        $process = new Process([$composer, 'dump-autoload']);
        $process->setTimeout(null); // Setting timeout to null to prevent installation from stopping at a certain point in time
        $process->setWorkingDirectory(base_path())->mustRun();

        $this->info('Migrating the database tables into your application');
        $this->call('migrate');

        $this->info('Seeding data into the database');
        $this->seed('FenBoothDatabaseSeeder');

        // $this->call('vendor:publish', ['--provider' => FenBoothServiceProvider::class, '--tag' => 'public', '--force']);
        // $this->call('vendor:publish', ['--provider' => FenBoothServiceProvider::class, '--tag' => 'vue-components', '--force']);

        $this->info('Successfully installed Voyager Fenbooth AdditionalPackage! Enjoy');
    }
}
