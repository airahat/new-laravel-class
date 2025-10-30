@props(['bg' => 'info', 'disabled' => false, 'type' => 'button', 'href' => '#', 'anchor' => false])
@if ($anchor)
    <a class="btn btn-{{ $bg }}" {{ $disabled ? 'disabled' : '' }} href="{{ $href }}"
        type="{{ $type }}">
        {{ $slot }}
    </a>
@else
    <button class="btn btn-{{ $bg }}" {{ $disabled ? 'disabled' : '' }} type="{{ $type }}">
        {{ $slot }}
    </button>
@endif
