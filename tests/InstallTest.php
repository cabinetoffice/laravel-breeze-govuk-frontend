<?php

namespace CabinetOffice\LaravelBreezeGovukFrontend\Tests;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Orchestra\Testbench\TestCase;
use CabinetOffice\LaravelBreezeGovukFrontend\LaravelBreezeGovukFrontendServiceProvider;

class InstallTest extends TestCase
{
    const VIEWS_FOLDER_FILES = [
        'views/auth/confirm-password.blade.php',
        'views/auth/forgot-password.blade.php',
        'views/auth/login.blade.php',
        'views/auth/register.blade.php',
        'views/auth/reset-password.blade.php',
        'views/auth/verify-email.blade.php'
    ];

    const JS_FILES = [
        'js/app.js',
        'js/bootstrap.js'
    ];

    const LAYOUT_FILES = [
        'views/layouts/app.blade.php',
        'views/layouts/auth.blade.php'
    ];

    const SASS_FILES = [
        'sass/components/alert.scss',
        'sass/components/pagination.scss',
        'sass/app.scss',
        'sass/app-ie8.scss'
    ];

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMockingConsoleOutput();
        $this->clean_directories();
    }

    protected function getPackageProviders($app)
    {
        return [\Laravel\Breeze\BreezeServiceProvider::class, LaravelBreezeGovukFrontendServiceProvider::class];
    }

    function test_the_install_command_copies_the_govuk_frontend_views_files()
    {

        $randomFile = self::VIEWS_FOLDER_FILES[rand(0,count(self::VIEWS_FOLDER_FILES)-1)];

        $this->assertFileDoesNotExist(resource_path($randomFile));
        Artisan::call('breeze:install-govuk --ignoreBreezeError=true');
        $this->assertFileExists(resource_path($randomFile));
        $this->assertFileContainsMatchingString(resource_path($randomFile), 'govuk');
    }

    function test_the_install_command_copies_the_govuk_frontend_layout_files()
    {

        $randomFile = self::LAYOUT_FILES[rand(0,count(self::LAYOUT_FILES)-1)];

        $this->assertFileDoesNotExist(resource_path($randomFile));
        Artisan::call('breeze:install-govuk --ignoreBreezeError=true');
        $this->assertFileExists(resource_path($randomFile));
        $this->assertFileContainsMatchingString(resource_path($randomFile), 'govuk-template');
    }

    function test_the_install_command_copies_the_style_files()
    {
        Artisan::call('breeze:install-govuk --ignoreBreezeError=true');
        foreach (self::SASS_FILES as $file)
        {
            $this->assertFileExists(resource_path($file));
        }
    }

    function test_the_install_command_copies_the_js_files()
    {
        Artisan::call('breeze:install-govuk --ignoreBreezeError=true');
        foreach (self::JS_FILES as $file)
        {
            $this->assertFileExists(resource_path($file));
        }
        $this->assertFileContainsMatchingString(resource_path('js/bootstrap.js'), 'govuk-frontend');
    }

    function test_the_install_command_copies_html5shiv_files()
    {
        Artisan::call('breeze:install-govuk --ignoreBreezeError=true');
        $this->assertFileExists(resource_path('js/html5shiv/html5shiv.min.js'));
    }

    function test_the_install_command_copies_webpack_mix_file()
    {
        Artisan::call('breeze:install-govuk --ignoreBreezeError=true');
        $this->assertFileExists(base_path('webpack.mix.js'));
        $this->assertFileContainsMatchingString(base_path('webpack.mix.js'), 'public/html5shiv');
    }

    function clean_directories()
    {
        $fs = new Filesystem();
        foreach (self::VIEWS_FOLDER_FILES as $file)
        {
            $fs->delete(resource_path($file));
        }

        foreach (self::LAYOUT_FILES as $file)
        {
            $fs->delete(resource_path($file));
        }
    }

    private function assertFileContainsMatchingString($file, $matchingString)
    {
        $contents = file_get_contents($file);
        $this->assertNotFalse(strpos($contents, $matchingString));
    }
}
