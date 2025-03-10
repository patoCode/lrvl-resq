<?php

namespace App\Listeners;

use App\Events\CategoryCreated;
use App\Models\Queue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CreateQueueCategory
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CategoryCreated $event): void
    {
        $category = $event->category;
        Queue::create([
            'category_id' => $category->id,
            'type' => 'public',
        ]);
        Log::info("Cola creada para la categoria ".$category->code);
    }
}
