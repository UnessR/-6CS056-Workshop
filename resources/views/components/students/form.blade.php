@props(['student'])

<div class="form-grid">
    <x-form-input name="name" label="Full name" :value="$student->name" maxlength="255" autocomplete="name" required />
    <x-form-input name="email" label="Email address" type="email" :value="$student->email" maxlength="255" autocomplete="email" required />
    <x-form-input name="phone" label="Phone number" type="tel" :value="$student->phone" maxlength="20" autocomplete="tel" required />
    <x-form-input name="date_of_birth" label="Date of birth" type="date" :value="$student->date_of_birth?->format('Y-m-d')" :max="now()->toDateString()" />
    <x-form-textarea name="address" label="Address" :value="$student->address" rows="3" maxlength="500" autocomplete="street-address" wrapper="field-full" />
</div>