<x-admin::layouts.app>
    <x-admin::widgets.breadcrmbs title="Campaign builder"/>
    <div id="root"></div>

    @push('scripts')
        @viteReactRefresh
        @vite('resources/js/tenant/campaign_builder/app.tsx')
    @endpush
</x-admin::layouts.app>
