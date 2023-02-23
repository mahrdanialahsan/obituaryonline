<?php
use Illuminate\Database\Seeder;
use App\User;
use App\SiteSettings;

class UsersSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void */
    public function run() {
        User::truncate();
        SiteSettings::truncate();
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => 'Alpha@123',
                'is_admin' => '1',
                'status'  => 1
            ]
        ];
        foreach($users as $user)
        {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'is_admin' => $user['is_admin'],
                'status' => $user['status'],
                'password' => Hash::make($user['password'])
            ]);
        }
        SiteSettings::insert([
            'site_title' => 'Arbituary Online',
        ]);
    }
}