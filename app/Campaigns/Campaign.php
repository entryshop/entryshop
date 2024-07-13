<?php

namespace App\Campaigns;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Stancl\JobPipeline\JobPipeline;

abstract class Campaign
{
    public $name;
    public $description;
    public $image;
    public $model;
    public $code;

    public function __construct($model = null)
    {
        $this->model = $model;
    }

    public static function events()
    {
        return [];
    }

    public static function boot()
    {
        Log::debug('booting campaign: '. (new static())->name);

        foreach (static::events() as $event => $listeners) {
            foreach ($listeners as $listener) {
                if ($listener instanceof JobPipeline) {
                    $listener = $listener->toListener();
                }

                Event::listen($event, $listener);
            }
        }
    }

}
