<tr>
    <td>{{ $index }}</td>
    <td>
        <label for="{{ $name }}" class="form-label"> {!! $label !!}</label>
    </td>
    <td width="20%">
        <div class="input-group  input-group-sm mb-3">
            <input type="number" class="form-control value-assessment @error($name) is-invalid @enderror"
                name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}">
            <span class="input-group-text">%</span>
        </div>
        @error($name)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </td>
</tr>
