@props(['text', 'gap' => 4, 'reverse' => false, 'class' => ''])

@php
    $gaps = $gap !== null ? '4' : $gap;
    $reversing = $reverse ? 'flex-row-reverse' : '';
@endphp

<div {{ $attributes->merge(['class' => "flex items-center gap-{$gaps} {$reversing} $class"]) }}>
    {{ $icon }}
    <h1>{{ $text }}</h1>
</div>
