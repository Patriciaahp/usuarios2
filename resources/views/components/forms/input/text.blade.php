<input
    autocomplete="off"
    type="text"
    name="{{ $name }}"
    id="{{ $name }}"
    class="input"
    title="{{$title}}"
    size="{{ $size ?? '32' }}"
    placeholder="{{ $placeholder ?? '' }}"
    value="{{ old($name, $value ?? '') }}"
    {{ $required == true ? 'required' : '' }}
/>
