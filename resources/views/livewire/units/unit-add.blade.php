<div>
    <x-mary-header :title="$title" subtitle="" separator>
        <x-slot name="actions">
            <a href="{{route('unit.units-list')}}" class="btn btn-primary" role="button">  
                <i data-feather="plus" height="1rem" width="1rem"></i>
                <span class="sm:inline-block">Voltar</span>
            </a>
        </x-slot>
    </x-mary-header>
     
    <form wire:submit.prevent="save">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="card-title">Endereço</h4>
            </div>
            <div class="card-body">
                <div class="flex flex-col gap-4">
                    <div class="flex w-full flex-col items-center gap-4 md:flex-row">
                        <div class="w-full md:w-1/2">
                            <div>
                                @error('form.zip_code') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <x-mary-input
                                label="CEP"
                                wire:model="form.zip_code"
                                x-mask="99999-999"
                            />
                        </div>
                        <div class="w-full md:w-1/2">
                            <div>
                                @error('form.city') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <x-mary-input
                                label="Cidade"
                                wire:model="form.city"
                            />
                        </div>
                    </div>
                    <div class="flex w-full flex-col items-center gap-4 md:flex-row">
                        <div class="w-full md:w-1/2">
                            <div>
                                @error('form.district') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <x-mary-input
                                label="Bairro"
                                wire:model="form.district"
                            />
                        </div>
                        <div class="w-full md:w-1/2">
                            <div>
                                @error('form.address') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <x-mary-input
                                label="Rua"
                                wire:model="form.address"
                            />
                        </div>
                    </div>
                    <div class="flex w-full flex-col items-center gap-4 md:flex-row">
                        <div class="w-full md:w-1/3">
                            <div>
                                @error('form.number') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <x-mary-input
                                label="Número"
                                wire:model="form.number"
                            />
                        </div>
                        <div class="w-full md:w-1/3">
                            <div>
                                @error('form.complement') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <x-mary-input
                                label="Complemento"
                                wire:model="form.complement"
                            />
                        </div>
                        <div class="w-full md:w-1/3">
                            <div>
                                @error('form.ip') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <x-mary-input
                                label="IP"
                                wire:model="form.ip"
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
