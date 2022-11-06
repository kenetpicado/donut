@props(['name', 'label' => $name])

<div class="mb-3">
    <label class="form-label">{{ ucfirst($label) }}</label>
    <select name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" autofocus>
        {{ $slot }}
    </select>

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
