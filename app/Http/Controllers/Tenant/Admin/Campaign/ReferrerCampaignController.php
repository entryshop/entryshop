<?php

namespace App\Http\Controllers\Tenant\Admin\Campaign;

use App\Http\Controllers\Controller;
use App\Models\Campaign;

class ReferrerCampaignController extends Controller
{
    public function setup()
    {
        return view('tenant.admin.campaign.referrer.setup');
    }

    public function show($id)
    {
        $model = Campaign::findOrFail($id);
        return $model;
    }
}
