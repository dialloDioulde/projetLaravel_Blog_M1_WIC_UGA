<?php
use App\User;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        factory(App\User::class, 10)->create()->each(function ($user) {
            $user->posts()->save(factory(App\posts::class)->create());

        });


        DB::table('role_user')->truncate();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.fr',
            'password' => Hash::make('password')
        ]);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.fr',
            'password' => Hash::make('password')
        ]);


        $adminRole = Role::where('name','admin')->first();
        $userRole = Role::where('name','user')->first();

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);



    }
}
