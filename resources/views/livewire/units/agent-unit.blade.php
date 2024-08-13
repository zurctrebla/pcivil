<div>
    <x-mary-header :title="$title" subtitle="" separator>
        <x-slot name="actions">
            <a href="{{route('unit.units-list')}}" class="btn btn-primary" role="button">  
                <i data-feather="plus" height="1rem" width="1rem"></i>
                <span class="sm:inline-block">Voltar</span>
            </a>
        </x-slot>
    </x-mary-header>

    @if(session('success'))
        <x-mary-alert class="alert-success">
            {{ session('success') }}
        </x-mary-alert>
    @endif

    <x-mary-card title="{{ $unit->city }} | {{ $unit->district }}">
        {{ $unit->address }}
    </x-mary-card>

    <form wire:submit.prevent="attach">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="card-title">Agente em unidade</h4>
            </div>
            <div class="card-body">
                <div class="flex flex-col gap-4">
                    <div class="flex w-full flex-col items-center gap-4 md:flex-row">
                        <div class="flex w-full flex-col items-center gap-4 md:flex-row">
                            <div class="w-full md:w-full">
                                <x-mary-select
                                    label="Agentes"
                                    :options="$agents"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 flex w-full items-center justify-end mt-4">
            <button class="btn btn-primary" type="submit">Vincular</button>
        </div>
    </form>
</div>
