<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class CreateSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:super-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $email = $this->ask('Enter Email Address ');
        $password = $this->secret('Enter Password');

        $user = User::create([
            'name' => 'SuperAdmin',
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        Role::create(['name' => 'super-admin']);
        $user->assignRole('super-admin');
        $this->info('Super admin created');
    }
}
