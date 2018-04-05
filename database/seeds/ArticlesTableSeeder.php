<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 50; $i++) {

            // Generate Random Title
            $title = sprintf('%s %s %s %s', str_random(rand(3, 10)), str_random(rand(3, 10)), str_random(rand(3, 10)), str_random(rand(3, 10)));

            // Generate Random Text
            $content = '';
            for($j = 0; $j <= rand(20, 25); $j++){
                $content .= str_random(rand(3, 10)) . ' ';
            }

            // Generate true or false
            $isEnabled = (bool)random_int(0, 1);

            // Generate random date between now and 10 days ago
            $timestamp = rand(time() - (24 * 60 * 60 * 10), time());
            $createdAt = new DateTime();
            $createdAt = $createdAt->setTimestamp($timestamp);
            $createdAt = $createdAt->format('Y-m-d H:i:s');

            DB::table('articles')->insert([
                'title'      => $title,
                'content'    => $content,
                'is_enabled' => $isEnabled,
                'created_at' => $createdAt
            ]);
        }
    }
}
