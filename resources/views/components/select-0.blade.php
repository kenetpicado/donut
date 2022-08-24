@props(['name', 'label' => $name, 'items'])

<div class="mb-3">
    <label class="form-label">{{ ucfirst($label) }}</label>
    <select name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" autofocus>
        @foreach ($items as $item)
            <option value="{{ $item->id }}" {{ old($name) == $item->id ? 'selected' : '' }}>
                {{ $item->nombre }}
            </option>
        @endforeach
    </select>

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
