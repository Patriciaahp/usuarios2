<form action="{{ route('questions.store') }}" method="POST">
    @csrf
    <div class="container-sm row mx-auto ">
        <div class="form-group">
            <label for="label">Label:</label>
            <input value="{{ old('label', $form->label) }}" type="text" name="label" id="label"
                   class="form-control">
        </div>

        <input value="{{ $type_id }}" type="text" name="type_id" id="type_id"
               class="hidden">

        <input value="{{ $form_id }}" type="text" name="form_id" id="form_id"
               class="hidden">

        <div class="form-group row">
            <label for="helpText">Help Text:</label>
            <textarea class="form-control ml-3" id="helpText"
                      name="helpText">{{ old('helpText', $form->helpText) }}</textarea>
        </div>
        <div class="form-group row col-xs-4">
            <label for="order_">Order:</label>
            <input class="form-control ml-3" min="1" value="{{ old('order_', $form->order_) }}"
                   type="number"
                   id="order_"
                   name="order_">
        </div>
        <div class="form-group row">
            <label for="required">Required:</label>
            <div class="form-check ml-3">
                <input value="yes" class="form-check-input" type="radio" name="required"
                       id="yes">
                <label class="form-check-label" for="required">
                    Yes
                </label>
            </div>
            <div class="form-check ml-3">
                <input value="no" class="form-check-input" type="radio" name="required"
                       id="no"
                       checked>
                <label class="form-check-label" for="required">
                    No
                </label>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-success">Create Form</button>
        </div>
    </div>
</form>
