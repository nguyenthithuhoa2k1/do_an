<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AddUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            [
                'name'=>'hoa',
                'email'=>'hoa@gmail.com',
                'password'=>'123',
                'phone'=>123456,
                'address'=>'quang nam',
                'avatar'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyfW1RdSwZE8xd2n8iW0a_lUTS6VEOiGK1EQ&usqp=CAU',
            ],
            [
                'name'=>'hoa01',
                'email'=>'hoa01@gmail.com',
                'password'=>'123',
                'phone'=>123456,
                'address'=>'quang nam',
                'avatar'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmEC6BvqEGZfkwufxPA1ljZvgmQawFVqmWIQ&usqp=CAU',
            ],
        ];
        User::insert($arr);
    }
}
