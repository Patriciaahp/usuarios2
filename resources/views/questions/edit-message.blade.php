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
