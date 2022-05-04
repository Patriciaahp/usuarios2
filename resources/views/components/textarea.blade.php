<textarea
    autocomplete="off"
    name="{{ $name }}"
    id="{{ $name }}"
    class="form-input form-text"
    rows="4"
    cols="36"
    title="{{$title}}"
    {{ ($required ?? '') === '' ? '' : 'required' }}
></textarea>
