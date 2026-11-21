@props(['action', 'label' => 'Delete'])

<form method="POST" action="{{ $action }}" class="inline-form" onsubmit="return confirm('Delete this record?')">
    @csrf
    @method('DELETE')
    <button class="text-button text-danger" type="submit">{{ $label }}</button>
</form>