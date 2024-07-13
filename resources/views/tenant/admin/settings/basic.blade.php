<x-admin::layouts.app>
    <x-admin::widgets.breadcrmbs title="Basic setting"/>

    <div class="container">
        <div class="card">
            <x-admin::forms.form hasFiles="true">
                <div class="card-body">
                    <div class="d-flex gap-3 flex-wrap">
                        <x-admin::forms.fields :fields="$fields"/>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">@lang('admin::base.submit')</button>
                </div>
            </x-admin::forms.form>
        </div>
    </div>

</x-admin::layouts.app>
