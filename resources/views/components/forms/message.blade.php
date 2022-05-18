<textarea
    class="form-control"
    autocomplete="off"
    rows="4"
    cols="44"
    name="{{$name}}"
    id="{{$name}}"
    placeholder="{{ $placeholder }}"
    {{ $required == true ? 'required' : '' }}
    readonly
></textarea>
