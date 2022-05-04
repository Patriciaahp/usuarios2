<textarea
    autocomplete="off"
    rows="4"
    cols="46"
    class="form-input form-text"
    name="{{$name}}"
    id="{{$name}}"
    title="{{$title}}"
    {{ $required == true ? 'required' : '' }}
></textarea>
