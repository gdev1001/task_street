<?php
/**
 * Created by PhpStorm.
 * User: bento
 * Date: 5/31/16
 * Time: 7:03 AM
 */

namespace Shokse\Notice;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Finder\Finder;

class NoticeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadAutoloader(base_path('packages'));
//        require __DIR__ . '/../vendor/autoload.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        // create instance
        $app['notice'] = $app->share(function ($app) {
            return new Notice( $app['config']->get('notice') );
        });

        $app->alias('notice', 'Shokse\Notice\Notice');

    }

    /**
     * Require composer's autoload file the packages.
     *
     * @param $path
     */
    protected function loadAutoloader($path)
    {
        $finder = new Finder;
        $files = new Filesystem;

        $autoloads = $finder->in($path)->files()->name('autoload.php')->depth('<= 3')->followLinks();

        foreach ($autoloads as $file)
        {
            $files->requireOnce($file->getRealPath());
        }
    }
}
