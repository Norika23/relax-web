@props([
    'label',
    'title',
    'description' => null,
])

<div {{ $attributes->class(['rw-heading']) }}>
    <p>{{ $label }}</p>
    <h2>{!! $title !!}</h2>
    @if ($description)
        <span>{{ $description }}</span>
    @endif
</div>
