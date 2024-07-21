<x-admin::layouts.app>
    <div id="root"></div>

    @push('scripts')
        @viteReactRefresh
        @vite('resources/js/tenant/campaign_builder/app.tsx')
    @endpush
</x-admin::layouts.app>
