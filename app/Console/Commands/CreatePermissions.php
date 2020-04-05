<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class CreatePermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:permissions {controller}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Permissions for all methods in Controller';

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
        $this->getRoutes($this->argument('controller'))->map(function ($route){
            Permission::create(['name' => $route->getName()]);
            $this->info('Permission Creates with name '. $route->getName());
        });
    }

    protected function getRoutes($controller)
    {
        return collect(Route::getRoutes())->filter(function ($route) use($controller) {
            return Str::contains($route->getActionName(), $controller);
        });
    }

}
