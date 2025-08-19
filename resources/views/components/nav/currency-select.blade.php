@props([
    'id' => 'currency',
    'name' => 'currency',
    'options' => ['CAD', 'USD', 'AUD', 'EUR', 'GBP'],
    'variant' => 'dark',
])

<div {{ $attributes->class(['inline-grid grid-cols-1']) }}>
    <select id="{{ $id }}" name="{{ $name }}" aria-label="Currency" x-model="$store.currency.code"
        class="col-start-1 row-start-1 w-full appearance-none rounded-md py-1.5 pr-7 pl-2 text-sm font-medium
            {{ $variant === 'dark'
                ? 'bg-transparent text-white focus:-outline-offset-1 focus:outline-2 focus:outline-white'
                : 'bg-white text-gray-700 focus:outline-2' }}">
        @foreach ($options as $opt)
            <option value="{{ $opt }}">{{ $opt }}</option>
        @endforeach
    </select>
    <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
        class="pointer-events-none col-start-1 row-start-1 mr-1 size-5 self-center justify-self-end
            {{ $variant === 'dark' ? 'fill-gray-300' : 'fill-gray-500' }}">
        <path
            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
            clip-rule="evenodd" fill-rule="evenodd" />
    </svg>
</div>
