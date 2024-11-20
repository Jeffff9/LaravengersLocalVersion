<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run()
    {
        $events = [
            [
                'title' => '天神祭',
                'description' => '日本三大祭の一つ。大阪天満宮の祭礼で、船渡御や奉納花火など様々な行事が行われます。',
                'image_url' => '/images/events/default-event.jpg',
                'start_date' => now()->addDays(30),
                'end_date' => now()->addDays(31),
                'category' => '祭り',
                'location' => '大阪天満宮',
                'status' => '開催予定'
            ],
            [
                'title' => '住吉祭',
                'description' => '住吉大社の夏祭。御鳳輦(ごほうれん)渡御をはじめ、様々な神事が執り行われます。',
                'image_url' => '/images/events/default-event.jpg',
                'start_date' => now()->addDays(45),
                'end_date' => now()->addDays(46),
                'category' => '祭り',
                'location' => '住吉大社',
                'status' => '開催予定'
            ],
            [
                'title' => '岸和田だんじり祭',
                'description' => '大阪府岸和田市の秋祭。豪快なだんじりの曳行が見どころです。',
                'image_url' => '/images/events/default-event.jpg',
                'start_date' => now()->addDays(90),
                'end_date' => now()->addDays(91),
                'category' => '祭り',
                'location' => '岸和田市内',
                'status' => '開催予定'
            ]
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
