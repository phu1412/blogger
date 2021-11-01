<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blogger;

class BloggerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = new Blogger();
        $blogs->name = "Tạo project";
        $blogs->description = "Mô tả";
        $blogs->content = "Tạo project Laravel";
        $blogs->date_write = "2018-09-26";
        $blogs->writter  = "Phước";

        $blogs->save();
    }
}
