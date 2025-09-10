<?php
namespace Veneridze\LaravelOpenobserveLogs;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
// use Spatie\LaravelPackageTools\Commands\InstallCommand;

class LogsHandlerProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-openobserver-logs');
    }
}
//->hasConfigFile()
// ->hasRoute('forms')
// ->hasMigration('create_form_drafts_table')
// ->publishesServiceProvider('FormsProvider')
// ->hasInstallCommand(function (InstallCommand $command) {
//     $command->publishMigrations();
//     //->publishConfigFile()
//     //->copyAndRegisterServiceProviderInApp();
// });

// public function packageBooted(): void
// {

// }

// public function packageRegistered(): void
// {

// }
