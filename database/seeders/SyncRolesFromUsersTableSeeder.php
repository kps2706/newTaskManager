<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SyncRolesFromUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = User::all();

        foreach ($users as $user) {
            if ($user->role) {
                // Check if role exists in Spatie
                if (! $user->hasRole($user->role)) {
                    $user->assignRole($user->role);
                    $this->command->info("Assigned role '{$user->role}' to user {$user->name}");
                }
            }
        }

        $this->command->info('All user roles synced successfully from users table.');
    }
}
