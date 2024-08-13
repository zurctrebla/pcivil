<div>
    <x-mary-header :title="$title" subtitle="" separator>
        <x-slot name="actions">
            <a href="{{route('point.points-list')}}" class="btn btn-primary" role="button">  
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

    @if(session('error'))
    <x-mary-alert class="alert-warning">
        {{ session('error') }}
    </x-mary-alert>
@endif

    <x-mary-card title="Registrar acesso" subtitle="<?php echo date('d/m/Y'); ?>" shadow separator>
        {{ Auth::user()->name }}
    </x-mary-card>
     
    <x-mary-card title="">
     
        {{-- <x-slot:figure>
            <img src="https://picsum.photos/500/200" />
        </x-slot:figure> --}}
        <x-slot:menu>
            {{-- <x-button icon="o-share" class="btn-circle btn-sm" /> --}}
            {{-- <x-icon name="o-heart" class="cursor-pointer" /> --}}
        </x-slot:menu>
        <x-slot:actions>

        <form wire:submit.prevent="register">
            
            <x-mary-button label="Registrar" wire:click="register" type="submit" class="btn-primary" />

        </form>
        </x-slot:actions>
    </x-mary-card>
</div>
