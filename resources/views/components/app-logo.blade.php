@props(['type' => ''])

@switch($type)
    @case($type === 'long-color')
        <x-logos.long-color class="h-8 w-auto" />
    @break

    @case($type === 'long-light')
        <x-logos.long-light class="h-8 w-auto" />
    @break

    @case($type === 'long-dark')
        <x-logos.long-dark class="h-8 w-auto" />
    @break

    @case($type === 'short-dark')
        <x-logos.short-dark class="h-8 w-auto" />
    @break

    @case($type === 'short-light')
        <x-logos.short-light class="h-8 w-auto" />
    @break

    @case($type === 'short-color')
        <x-logos.short-color class="h-8 w-auto" />
    @break

    @default
@endswitch
