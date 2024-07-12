<?php

namespace App\Http\Controllers\Tenant\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Support\Helper;

class BasicSettingController extends Controller
{
    public function index()
    {
        $fields = [
            [
                'name'  => 'site_name',
                'value' => Helper::setting('site_name'),
            ],
            [
                'name'  => 'logo',
                'value' => Helper::setting('logo'),
                'type'  => 'image',
            ],
            [
                'name'  => 'logo_mini',
                'value' => Helper::setting('logo_mini'),
                'type'  => 'image',
            ],
        ];
        return view('tenant.admin.settings.basic', compact('fields'));
    }

    public function store()
    {

        $settings = [
            'site_name' => request('site_name') ?? '',
        ];

        if (request()->hasFile('logo')) {
            $settings['logo'] = admin()->upload(request()->file('logo'));
        }

        if (request()->hasFile('logo_mini')) {
            $settings['logo_mini'] = admin()->upload(request()->file('logo_mini'));
        }

        Helper::setting($settings);

        admin()->success('Settings updated successfully');
        // Redirect back
        return back();
    }
}
