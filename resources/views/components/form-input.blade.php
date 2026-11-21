@props(['name', 'label', 'type' => 'text', 'value' => null, 'wrapper' => ''])

<div class="field {{ $wrapper }}">
    <label for="{{ $name }}">{{ $label }}</label>
    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" value="{{ old($name, $value) }}" @if ($errors->has($name)) aria-invalid="true" aria-describedby="{{ $name }}-error" @endif {{ $attributes }}>
    @error($name)
        <span class="field-error" id="{{ $name }}-error">{{ $message }}</span>
    @enderror
</div>