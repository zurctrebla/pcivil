<div>
    <x-mary-header :title="$title" subtitle="" separator>
        <x-slot name="actions">
            <a href="{{route('agent.agents-list')}}" class="btn btn-primary" role="button">  
                <i data-feather="plus" height="1rem" width="1rem"></i>
                <span class="sm:inline-block">Voltar</span>
            </a>
        </x-slot>
    </x-mary-header>
     
    <form wire:submit.prevent="save">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="card-title">Agente</h4>
            </div>
            <div class="card-body">
                <div class="flex flex-col gap-4">
                    <div class="flex w-full flex-col items-center gap-4 md:flex-row">
                        <div class="w-full md:w-1/2">
                            <div>
                                @error('form.name') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <x-mary-input
                                label="Nome"
                                wire:model="form.name"
                            />
                        </div>
                        <div class="w-full md:w-1/2">
                            <div>
                                @error('form.register') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <x-mary-input
                                label="Matricula"
                                wire:model="form.register"
                            />
                        </div>
                    </div>
                    
                    <div class="flex w-full flex-col items-center gap-4 md:flex-row">
                        <div class="w-full md:w-full">
                            <x-mary-select
                                label="Patentes"
                                wire:model="form.hierarchy_id"
                                :options="$hierarchies"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 flex w-full items-center justify-end mt-4">
            <button class="btn btn-primary" type="submit">Salvar</button>
        </div>
    </form>
</div>
