<?php

namespace App\Actions;

use Illuminate\Http\Request;
use Parse\Admin\Concerns\AsAction;

class ControllerAction
{
    use AsAction;

    public function handle($request)
    {
        $actionClass = request('action_class');

        if (class_exists($actionClass) === false) {
            return response()->json([
                'message' => 'Action class not found',
            ]);
        }

        return $actionClass::run($request);
    }

    public function asController(Request $request)
    {
        return $this->handle($request);
    }
}
