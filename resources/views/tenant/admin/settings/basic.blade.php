<x-admin::layouts.app>
    <x-admin::widgets.breadcrmbs title="Basic setting"/>

    <div class="container">
        <div class="card">
            <x-admin::forms.form :$fields fields_container="class='card-body d-flex gap-3 flex-wrap'" hasFiles="true">
                <div class="card-footer">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </x-admin::forms.form>
        </div>
    </div>

</x-admin::layouts.app>
