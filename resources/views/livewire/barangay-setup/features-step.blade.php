<x-wizard-content-container>
    <div class="d-flex gap-4 mb-4 flex-column flex-xl-row justify-content-around">
        @foreach ($steps as $step)
            <div>
                @if ($step->isCurrent())
                    <span class="fs-3 text text-primary fw-bold">
                        {{ $step->order }}. {{ $step->label }}
                    </span>
                @else
                    <a wire:click="showStep('{{ $step->step_name }}')" class="fs-3 text text-brown-primary"
                        href="#">
                        {{ $step->order }}. {{ $step->label }}
                    </a>
                @endif
            </div>
        @endforeach
    </div>
    <livewire:barangay-setup.features-settings is_wizard_step='true' />
</x-wizard-content-container>