<?php

namespace App\Workflows\Activities;

use Workflow\Activity;

class LogActivity extends Activity
{
    public $tries = 1;

    public function execute($params, $context = [])
    {
        return [
            $params['key'] => rand(1, 100),
        ];
    }
}
