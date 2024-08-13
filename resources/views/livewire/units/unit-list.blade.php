<div>
    <x-mary-header :title="$title" subtitle="" separator>
        <x-slot name="actions">
            <a href="{{route('unit.unit-add')}}" class="btn btn-primary" role="button">
                <i data-feather="plus" height="1rem" width="1rem"></i>
                <span class="sm:inline-block">Nova Unidade</span>
            </a>
        </x-slot>
    </x-mary-subheader>

    @if(session('success'))
        <x-mary-alert class="alert-success">
            {{ session('success') }}
        </x-mary-alert>
    @endif

    <!-- TABLE  -->
    <x-mary-card>
        <x-mary-table :headers="$headers" :rows="$units" :sort-by="$sortBy">
            @scope('actions', $unit)
            <x-mary-button icon="o-user" link="{{ route('unit.unit-agents', $unit['id']) }}" spinner class="btn-ghost btn-sm text-green-500" />
            <x-mary-button icon="o-pencil" href="{{ route('unit.unit-edit', $unit['id']) }}" wire:click="edit({{ $unit['id'] }})"  spinner class="btn-ghost btn-sm" />
            <x-mary-button icon="o-trash" wire:click="delete({{ $unit['id'] }})" spinner class="btn-ghost btn-sm text-red-500" />
            @endscope
        </x-mary-table>
    </x-mary-card>

    <!-- FILTER DRAWER -->
    <x-mary-drawer wire:model="drawer" title="Filters" right separator with-close-button class="lg:w-1/3">
        <x-mary-input placeholder="Search..." wire:model.live.debounce="search" icon="o-magnifying-glass" @keydown.enter="$wire.drawer = false" />

        <x-slot:actions>
            <x-mary-button label="Reset" icon="o-x-mark" wire:click="clear" spinner />
            <x-mary-button label="Done" icon="o-check" class="btn-primary" @click="$wire.drawer = true" />
        </x-slot:actions>
    </x-mary-drawer>
</div>
