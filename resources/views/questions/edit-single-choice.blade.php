<div class="form-group col-xs-8">
    <label for="label">Label:</label>
    <input value="{{ $question->label }}" type="text" name="label" id="label"
           class="form-control">
</div>

<div class="form-group row ">
    <label for="helpText">Help Text:</label>
    <textarea class="form-control ml-3" id="title"
              name="helpText">{!!  html_entity_decode($question->help_text) !!}</textarea>
</div>
<div class="form-group row col-xs-4">
    <label for="order_">Order:</label>
    <input class="form-control ml-3" min="1" value="{{$question->order_}}" type="number"
           id="order_"
           name="order_">
</div>


<div class="form-group row">
    <label for="required">Required:</label>
    <div class="form-check ml-4">
        @if($question->required == true)
            <input value="yes" class="form-check-input" type="radio" name="required"
                   id="yes" checked>
        @else
            <input value="yes" class="form-check-input" type="radio" name="required"
                   id="yes">
        @endif
        <label class="form-check-label" for="required">
            Yes
        </label>
    </div>
    <div class="form-check ml-4">
        @if($question->required != true)
            <input value="no" class="form-check-input" type="radio" name="required"
                   id="no" checked>
        @else
            <input value="no" class="form-check-input" type="radio" name="required"
                   id="no">
        @endif
        <label class="form-check-label" for="required">
            No
        </label>
    </div>
</div>
