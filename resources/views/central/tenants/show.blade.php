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
                        <div class="d-flex flex-wrap gap-3">
                            <x-admin::forms.inputs.switch
                                name="module_coupons"
                                :value="$settings['module_coupons'] ?? false"
                                label="Coupons module"/>
                            <x-admin::forms.inputs.switch
                                name="module_campaigns"
                                :value="$settings['module_campaigns'] ?? false"
                                label="Campaigns module"/>
                            <x-admin::forms.inputs.switch
                                name="module_content"
                                :value="$settings['module_content'] ?? false"
                                label="Content module"/>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </x-admin::forms.form>
            </div>
        </div>
    </div>
</x-admin::layouts.app>
