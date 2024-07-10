<div class="d-flex align-items-center gap-1">
    <div>{{$model->event->name}}</div>
    @foreach($model->attributes as $attribute_name => $attribute_value)
        @if($loop->index > 2)
            <div class="badge bg-primary">...</div>
            @break
        @else
            <div class="badge bg-primary">{{$attribute_name}}: {{$attribute_value}}</div>
        @endif
    @endforeach
</div>
