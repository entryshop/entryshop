<x-admin::layouts.app>
    <x-admin::widgets.breadcrmbs :title="'Tenant: '. $model->name" back="/admin/tenants"/>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0">Modules</h3>
                </div>
                <x-admin::forms.form action="{{route('admin.tenants.settings', $model->id)}}">
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-4">
                            @foreach($modules as $module)
                                <x-admin::forms.inputs.switch
                                    :id="'module_'.$module['name']"
                                    :name="$module['name']"
                                    :label="$module['label']"
                                    :value="$module['value'] ?? false"/>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">@lang('admin::base.submit')</button>
                    </div>
                </x-admin::forms.form>
            </div>
        </div>
    </div>
</x-admin::layouts.app>
