<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feedbacks = [];

        for ($i = 1; $i <= 10; $i++) {
            $feedbacks[] = [
                'user_id' => 5,
                'subject' => "Тестовая заявка {$i}",
                'message' => "Это тестовая заявка номер {$i}.",
                'attachment_link' => "http://example.com/file{$i}.pdf",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('feedback')->insert($feedbacks);
    }
}
