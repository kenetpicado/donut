@props(['val', 'label'])

<option value={{ $val }} {{ old($label) == $val ? 'selected' : '' }}>{{ $val }}</option>
