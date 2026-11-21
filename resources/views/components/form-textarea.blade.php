@props(['name', 'label', 'value' => null, 'wrapper' => ''])

<div class="field {{ $wrapper }}">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea id="{{ $name }}" name="{{ $name }}" @if ($errors->has($name)) aria-invalid="true" aria-describedby="{{ $name }}-error" @endif {{ $attributes }}>{{ old($name, $value) }}</textarea>
    @error($name)
        <span class="field-error" id="{{ $name }}-error">{{ $message }}</span>
    @enderror
</div>