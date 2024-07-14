<?php

namespace App\Campaigns;

use App\Events\Contracts\HasCustomer;
use Illuminate\Support\Facades\Event;

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
        foreach (static::events() as $event) {
            Event::listen($event, function (HasCustomer $event) {
                static::triggeredByEvent($event);
            });
        }
    }

    public static function triggeredByEvent(HasCustomer $event)
    {
        // should be implemented in child class
    }

}
