<?php

namespace App\Actions\Tenant\Campaign;

use App\Models\Campaign;
use Parse\Admin\Concerns\AsAction;

class TestAction
{
    use AsAction;

    public function handle($request)
    {
        $campaign = Campaign::find($request->id);
        return response()->json([
            'message'  => 'Test action executed successfully!',
            'campaign' => $campaign,
        ]);
    }
}
