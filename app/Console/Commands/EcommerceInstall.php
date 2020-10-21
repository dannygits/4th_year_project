<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class EcommerceInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ecommerce:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'dummy data for the ecommerce app will be installed';

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
     * @return mixed
     */
    public function handle()
    {
        if ($this->confirm('THIS WILL DELETE ALL YOUR DATA AND INSTALL THE DEFAULT DUMMY DATA. ARE YOU SURE?')) {
            # code...
            
            File::deleteDirectory(public_path('storage/products/dummy'));
            $this->callSilent('storage:link');

            $copySuccess = File::copyDirectory(public_path('img/products'), public_path('storage/products/dummy'));

            if ($copySuccess) {
                # code...
                $this->info('images have been successfully copied to storage folder');
            }

            $this->call('migrate:fresh', [
                '--seed' => true,
            ]);

            $this->call('db:seed', [
                '--class' => 'VoyagerDatabaseSeeder',
            ]);

            $this->call('db:seed', [
                '--class' => 'VoyagerDummyDatabaseSeeder',
            ]);

            $this->call('db:seed', [
                '--class' => 'DataTypesTableSeederCustom',
            ]);

            $this->call('db:seed', [
                '--class' => 'DataRowsTableSeederCustom',
            ]);

            $this->call('db:seed', [
                '--class' => 'MenusTableSeederCustom',
            ]);

            $this->call('db:seed', [
                '--class' => 'MenuItemsTableSeederCustom',
            ]);

            $this->call('db:seed', [
                '--class' => 'RolesTableSeederCustom',
            ]);

            $this->call('db:seed', [
                '--class' => 'PermissionsTableSeederCustom',
            ]);

            $this->call('db:seed', [
                '--class' => 'PermissionRoleTableSeeder',
            ]);
            
            $this->call('db:seed', [
                '--class' => 'PermissionRoleTableSeederCustom',
            ]);

            $this->call('db:seed', [
                '--class' => 'SettingsTableSeederCustom',
                '--force' => true,
            ]);

            $this->call('db:seed', [
                '--class' => 'UsersTableSeederCustom',
            ]);
    

            $this->info('all dummy data installed');

            }        
    }
}
