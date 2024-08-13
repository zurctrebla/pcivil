<div>
    <x-mary-header :title="$title" subtitle="" separator>
        <x-slot name="actions">
            @if(auth()->guard('agent')->check())
                <a href="{{route('point.point-add')}}" class="btn btn-primary" role="button">
                    <i data-feather="plus" height="1rem" width="1rem"></i>
                    <span class="sm:inline-block">Registrar</span>
                </a>
            @endif
        </x-slot>
    </x-mary-subheader>

    @if(session('success'))
        <x-mary-alert class="alert-success">
            {{ session('success') }}
        </x-mary-alert>
    @endif

    <!-- TABLE  -->
    <x-mary-card>
        <x-mary-table :headers="$headers" :rows="$points" :sort-by="$sortBy">
            @scope('actions', $point)
            {{-- <x-mary-button icon="o-trash" wire:click="delete({{ $point['id'] }})" spinner class="btn-ghost btn-sm text-red-500" /> --}}
            @endscope
        </x-mary-table>
    </x-mary-card>

    <!-- FILTER DRAWER -->
    <x-mary-drawer wire:model="drawer" title="Filters" right separator with-close-button class="lg:w-1/3">
        <x-mary-input placeholder="Search..." wire:model.live.debounce="search" icon="o-magnifying-glass" @keydown.enter="$wire.drawer = false" />

        <x-slot:actions>
            {{-- <x-mary-button label="Reset" icon="o-x-mark" wire:click="clear" spinner /> --}}
            {{-- <x-mary-button label="Done" icon="o-check" class="btn-primary" @click="$wire.drawer = false" /> --}}
        </x-slot:actions>
    </x-mary-drawer>
</div>
