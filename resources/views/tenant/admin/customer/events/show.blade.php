<x-admin::layouts.app>
    <x-admin::widgets.breadcrmbs title="Custom events" back="/admin/customer-events"/>
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0 card-title">{{$model->event->name}}</h3>
        </div>
        <div class="card-body">
            <div class="d-flex align-items-center gap-1">
                @foreach($model->attributes as $attribute_name => $attribute_value)
                    <div class="badge fs-6 bg-primary">{{$attribute_name}}: {{$attribute_value}}</div>
                @endforeach
            </div>
        </div>
        <div class="card-footer">
            Created at : {{$model->created_at}}
        </div>
    </div>
</x-admin::layouts.app>
