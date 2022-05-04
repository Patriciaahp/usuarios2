<input
    autocomplete="off"
    type="text"
    name="{{ $name }}"
    id="{{ $name }}"
    class="input"
    title="{{$title}}"
    size="{{ $size ?? '10' }}"
    placeholder="{{ $placeholder ?? '' }}"
    value="{{ old($name, $value ?? '') }}"
    {{ ($required ?? '') === '' ? '' : 'required' }}
/>
