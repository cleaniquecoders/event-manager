<?php

use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    use \App\Traits\SeedingProgressBar;

    public $seeders = [
        'seedUsers'       => false,
        'seedEvents'      => false,
        'seedSubscribers' => false,
    ];

    /**
     * Seed Users.
     */
    public function seedUsers()
    {
        $roles = collect(config('acl.roles'));

        $roles->each(function ($role) {
            $name = title_case($role);
            $email = $role . '@app.com';
            $password = bcrypt($role);

            $user = \App\Models\User::create([
                'name'     => $name,
                'email'    => $email,
                'password' => $password,
            ]);

            event(new Registered($user));

            if (! $user->hasRole($role)) {
                $user->assignRole($role);
            }
        });

        factory(\App\Models\User::class, 100)->create()->each(function ($user) {
            event(new Registered($user));
            $user->assignRole('user');
        });
    }

    private function seedEvents()
    {
        $user = \App\Models\User::first();
        factory(\App\Models\Event::class, 10)
            ->create(['user_id' => $user->id]);
    }

    private function seedSubscribers()
    {
        \App\Models\User::inRandomOrder()
            ->where('id', '>', 3)
            ->limit(10)
            ->get()
            ->each(function ($user) {
                \App\Models\Event::inRandomOrder()
                    ->limit(3)
                    ->get()
                    ->each(function ($event) use ($user) {
                        $user->subscriptions()->attach($event);
                    });
            });
    }
}
