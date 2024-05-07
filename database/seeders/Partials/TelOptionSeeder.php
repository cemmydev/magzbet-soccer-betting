<?php

namespace Database\Seeders\Partials;

use App\Models\TelegramOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TelOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TelegramOption::create([
            'message_title'=>'New Bet Announced!',
            'message_description'=>'New bet on event $event$ has announced',
            'message_link_to' => 'https://magzbet.com/bets',
            'message_link_text' => 'Check it out',
        ]);
    }
}
