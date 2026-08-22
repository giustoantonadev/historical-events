<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\HistoricalEvent;

class AssignEventImagesSeeder extends Seeder
{
    public function run(): void
    {
        $diskPath = public_path('storage/events');
        if (!is_dir($diskPath)) {
            $this->command->info("Directory not found: {$diskPath}");
            return;
        }

        $files = array_values(array_filter(scandir($diskPath), function ($f) use ($diskPath) {
            return is_file($diskPath . DIRECTORY_SEPARATOR . $f) && !in_array($f, ['.', '..']);
        }));

        foreach ($files as $file) {
            $name = pathinfo($file, PATHINFO_FILENAME); // slug like 'fondazione-roma'

            // try to find an event whose title slug matches any title field
            $event = HistoricalEvent::all()->first(function ($e) use ($name) {
                $possibleTitles = array_filter([
                    $e->title_it ?? null,
                    $e->title ?? null,
                    $e->title_en ?? null,
                    $e->title_fr ?? null,
                ]);

                foreach ($possibleTitles as $title) {
                    $slug = Str::slug($title);
                    if ($slug === $name) return true;
                    if (Str::contains($slug, $name) || Str::contains($name, $slug)) return true;
                    $normalized = str_replace(['-di-', '-del-', '-della-', '-dello-'], '-', $slug);
                    if (Str::contains($normalized, $name)) return true;
                }

                return false;
            });

            if ($event) {
                $event->image = 'events/' . $file;
                $event->save();
                $this->command->info("Assigned image {$file} to event id={$event->id} title='" . ($event->title ?? $event->title_it ?? $event->title_en ?? $event->title_fr) . "'");
            } else {
                $this->command->warn("No matching event for file: {$file} (slug: {$name})");
            }
        }
    }
}
