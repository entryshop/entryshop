<x-admin::layouts.app>
    <x-admin::widgets.breadcrmbs :title="'Campaign: '. $model->name" back="/admin/campaigns"/>
    {{$slot}}
</x-admin::layouts.app>
