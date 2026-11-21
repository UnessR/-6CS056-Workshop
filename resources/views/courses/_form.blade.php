<div class="form-grid">
    <x-form-input name="name" label="Course name" :value="$course->name" maxlength="255" required wrapper="field-full" />
    <x-form-textarea name="description" label="Description" :value="$course->description" rows="4" maxlength="2000" wrapper="field-full" />
    <x-form-input name="duration" label="Duration in weeks" type="number" :value="$course->duration" min="1" max="65535" step="1" required />
    <x-form-input name="fee" label="Fee" type="number" :value="$course->fee" min="0" max="99999999.99" step="0.01" inputmode="decimal" required />
    <div class="field">
        <label for="difficulty">Difficulty</label>
        <select id="difficulty" name="difficulty" required @if ($errors->has('difficulty')) aria-invalid="true" aria-describedby="difficulty-error" @endif>
            <option value="">Choose a level</option>
            @foreach (['Easy', 'Medium', 'Hard'] as $level)
                <option value="{{ $level }}" @selected(old('difficulty', $course->difficulty) === $level)>{{ $level }}</option>
            @endforeach
        </select>
        @error('difficulty')<span class="field-error" id="difficulty-error">{{ $message }}</span>@enderror
    </div>
    <div class="field field-check">
        <input type="hidden" name="is_active" value="0">
        <label class="check-label" for="is_active"><input id="is_active" name="is_active" type="checkbox" value="1" @checked(old('is_active', $course->is_active))> <span><strong>Course is active</strong><small>Active courses are currently offered.</small></span></label>
        @error('is_active')<span class="field-error">{{ $message }}</span>@enderror
    </div>
</div>