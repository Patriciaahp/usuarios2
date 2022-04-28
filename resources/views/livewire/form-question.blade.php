@foreach($types as $type)
@endforeach
<div class="form-group col-md-6">
    <label>Select type</label>
    <select id="types" required="" name="types" class="form-control">
        <option value="">--Select--</option>
        <option {{ ($type->name) == 'Input Text'}}  value="Input Text">Input Text</option>
        <option {{ ($type->name) == 'Message' }}  value="Message">Message</option>
    </select>
</div>


