<div class="{{ $class ?? '' }}">
    @isset($label)
        <label for="{{ $id ?? $label ?? '' }}" class="inline-block text-sm font-medium leading-6 text-gray-900 mb-2">
            {{ $label }}
        </label>

        @isset($withAsterisk)
            <sup class="text-red-500" style="font-size: 12px">*</sup>
        @endisset
    @endisset
    <div>
        <div class="flex rounded-md  ring-1 ring-inset ring-gray-300 focus-within:ring-2
        {{ $containerClass ?? '' }}
        focus-within:ring-inset {{ !isset($readonly) || !$readonly ? 'focus-within:ring-indigo-600' : '' }}">
            
            @isset($icon)
                <span class="flex select-none items-center p-2 text-gray-500 sm:text-sm">
                    <x-icon :code="$icon" class="text-[18px]" />
                </span>
            @endisset

            <input id="{{ $id ?? $label ?? '' }}" type="{{ $type ?? 'text' }}" 
            {{ isset($model) ? "wire:model.blur=$model" : '' }}
            {{ isset($liveModel) ? "wire:model.live=$liveModel" : '' }}
            {{ isset($readonly) && $readonly ? 'readonly' : '' }}
            {{ isset($name) ? "name=$name" : '' }}
            value="{{ $value ?? '' }}"
            placeholder="{{ $placeholder ?? '' }}"
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 
            -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 
            focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6
            {{ isset($icon) ? 'rounded-l-none' : '' }}
            {{ isset($readonly) && $readonly ? 'bg-gray-200 rounded-md text-gray-600' : '' }}">

        </div>

        @if (!isset($withoutErrors))
            @error($model ?? $liveModel ?? $error ?? '')
                <small class="text-red-500">{{ $message }}</small>
            @else 
                @isset($helper)
                    <small class="mt-1 text-xs text-gray-500">
                        {{ $helper }}
                    </small>
                @endisset
            @enderror
        @endif
    </div>
</div>