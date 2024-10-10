<?php

namespace Database\Seeders\Partials;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if (DB::table('testimonials')->count() === 0) {
            Testimonial::create([
                'type' => 'youtube',
                'link' => 'https://www.youtube.com/embed/tf88GFLtj18?autoplay=0&controls=0&showinfo=0&title=0&rel=0&wmode=transparent'
            ]);
            Testimonial::create([
                'type' => 'youtube',
                'link' => 'https://www.youtube.com/embed/tf88GFLtj18?autoplay=0&controls=0&showinfo=0&title=0&rel=0&wmode=transparent'
            ]);
            Testimonial::create([
                'type' => 'youtube',
                'link' => 'https://www.youtube.com/embed/tf88GFLtj18?autoplay=0&controls=0&showinfo=0&title=0&rel=0&wmode=transparent'
            ]);
            Testimonial::create([
                'type' => 'youtube',
                'link' => 'https://www.youtube.com/embed/tf88GFLtj18?autoplay=0&controls=0&showinfo=0&title=0&rel=0&wmode=transparent'
            ]);
            Testimonial::create([
                'type' => 'feedback',
                'title' => "It's legit, I've been here for 7 months & 20x'd my money",
                'text' => 'Most people out there are just out to take your money, Magz was doing this for himself before inviting anyone else onboard, I respect it.',
                'sign' => 'Jake G.'
            ]);
            Testimonial::create([
                'type' => 'feedback',
                'title' => "He's the real deal. One of the few out there that are",
                'text' => 'Most people out there are just out to take your money, Magz was doing this for himself before inviting anyone else onboard, I respect it.',
                'sign' => 'Mark S.'
            ]);
            Testimonial::create([
                'type' => 'feedback',
                'title' => "Nothing to lose with the 3 day free trial, try it",
                'text' => 'Most people out there are just out to take your money, Magz was doing this for himself before inviting anyone else onboard, I respect it.',
                'sign' => 'Alex R.'
            ]);
		}
    }
}
