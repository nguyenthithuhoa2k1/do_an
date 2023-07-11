<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataBlog = [
            [
                'title_blog'=>'mèo con',
                'image_blog'=>'https://top10camau.vn/wp-content/uploads/2022/10/avatar-meo-cute-5.jpg',
                'description_blog'=>'mèo con là một động vật đáng yêu',
                'content_blog'=>'',
            ],
            [
                'title_blog'=>'mèo con',
                'image_blog'=>'https://i.pinimg.com/736x/74/b1/10/74b110781d66cd3b501bc85c469f93be.jpg',
                'description_blog'=>'mèo con là một động vật đáng yêu',
                'content_blog'=>'',
            ],
            [
                'title_blog'=>'mèo con',
                'image_blog'=>'https://technewsdaily.vn/uploads/2022/12/25/meo-8.jpg',
                'description_blog'=>'mèo con là một động vật đáng yêu',
                'content_blog'=>'',
            ],
        ];
        Blog::insert($dataBlog);
    }
}
