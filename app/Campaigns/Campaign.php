<?php

namespace App\Campaigns;

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
}
