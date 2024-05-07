<?php

namespace Database\Seeders\Partials;

use App\Models\UDText;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if (DB::table('u_d_texts')->count() === 0) {
            UDText::create([
                'field' => 'dashboard',
                'text' => 'Hello, New text is here!',
            ]);
		}
    }
}
