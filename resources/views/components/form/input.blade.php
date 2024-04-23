@props(['name', 'type' => 'text', 'placeholder' => '', 'icon' => null, 'form_name' => null, 'default_value' => ""])
<div class="mb-3 w-full main-input">
    <label for="{{ $form_name ?? $name }}" class="block font-bold text-white mb-2">
        {!! $icon != null ? '<i class="' . $icon . '"></i>' : null !!}
        {{ ucwords($name) }}
    </label>
    <input type="{{ $type }}" class="block w-full bg-transparent rounded-md border-2 border-e-lime-500 focus:outline-none p-3 text-white font-semibold focus:shadow-md transition" name="{{ $form_name ?? $name }}" id="{{ $name }}" autocomplete="{{ $name }}" value="{{ $default_value != "" ? (old($form_name ?? $name) ?? $default_value) : old($form_name ?? $name) }}" placeholder="{{ $placeholder }}">
    @error($form_name ?? $name)
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
