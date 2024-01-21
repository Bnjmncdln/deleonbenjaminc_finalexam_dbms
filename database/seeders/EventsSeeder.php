<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Attendee;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Event::truncate();
        Attendee::truncate();

        Event::create([
            'name' => 'Event 1',
            'date' => now()->addDays(2)->format('Y-m-d'),
            'location' => 'Location 1',
        ]);

        Event::create([
            'name' => 'Event 2',
            'date' => now()->addDays(4)->format('Y-m-d'),
            'location' => 'Location 2',
        ]);

        Event::create([
            'name' => 'Event 3',
            'date' => now()->addDays(6)->format('Y-m-d'),
            'location' => 'Location 3',
        ]);

        Event::create([
            'name' => 'Event 4',
            'date' => now()->addDays(8)->format('Y-m-d'),
            'location' => 'Location 4',
        ]);

        Event::create([
            'name' => 'Event 5',
            'date' => now()->addDays(10)->format('Y-m-d'),
            'location' => 'Location 5',
        ]);

        Event::create([
            'name' => 'Event 6',
            'date' => now()->addDays(12)->format('Y-m-d'),
            'location' => 'Location 6',
        ]);

        Event::create([
            'name' => 'Event 7',
            'date' => now()->addDays(14)->format('Y-m-d'),
            'location' => 'Location 7',
        ]);

        Event::create([
            'name' => 'Event 8',
            'date' => now()->addDays(14)->format('Y-m-d'),
            'location' => 'Location 8',
        ]);

        Event::create([
            'name' => 'Event 9',
            'date' => now()->addDays(16)->format('Y-m-d'),
            'location' => 'Location 9',
        ]);

        Event::create([
            'name' => 'Event 10',
            'date' => now()->addDays(18)->format('Y-m-d'),
            'location' => 'Location 10',
        ]);

        Event::create([
            'name' => 'Event 10',
            'date' => now()->addDays(18)->format('Y-m-d'),
            'location' => 'Location 10',
        ]);
    }
}
