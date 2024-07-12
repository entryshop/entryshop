<x-admin::layouts.guest>
    <div class="card container mt-4">
        <div class="card-header">
            {{admin()->getBrandName()}}
        </div>
        <x-admin::forms.form action="{{ route('central.tenants.register.submit') }}" method="post">
            <div class="card-body d-flex">
                <x-admin::forms.inputs.input name="company" id="company" label="Company"/>
            </div>
        </x-admin::forms.form>
    </div>
</x-admin::layouts.guest>
