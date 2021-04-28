<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment')->insert([
            'note' => 4.44,
            'user_id' => 1,
            'establishment_id' => 2,
            'comment' => 'Interessant',
        ]);

        DB::table('comment')->insert([
            'note' => 1.1,
            'user_id' => 2,
            'establishment_id' => 1,
            'comment' => 'Nul',
        ]);
    }
}
