<x-maz-sidebar :href="route('dashboard')" :logo="asset('images/logo/logo.png')">

    <!-- Add Sidebar Menu Items Here -->

    <x-maz-sidebar-item name="Dashboard" :link="route('dashboard')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Kandidat" icon="bi bi-people-fill" :link="route('pages.kandidat')"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Skor" icon="bi bi-clipboard-check-fill" :link="route('pages.skor')"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Seleksi" icon="bi bi-check2-square">
        <x-maz-sidebar-sub-item name="Entropy" :link="route('pages.entropy')"></x-maz-sidebar-sub-item>
        <x-maz-sidebar-sub-item name="Ranking" :link="route('pages.ranking')"></x-maz-sidebar-sub-item>
    </x-maz-sidebar-item>

</x-maz-sidebar>
