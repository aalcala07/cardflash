<?php

use App\User;
use Illuminate\Database\Seeder;
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
        $user = new User();
        $user->name = 'Test User';
        $user->email = 'test@example.com';
        $user->email_verified_at = now();
        $user->password = '$2y$10$qzkj8vBbDB.sJ5twTmaKIOL6S3O1smvOs79m0UYARtSa7AbgwOEJy'; // 12341234
        $user->remember_token = Str::random(10);
        $user->save();
    }
}
