@foreach($types as $type)
@endforeach
<div class=" container-xxl shadow p-3 mb-5 bg-body rounded fs-4">
    <div class="container-fluid ">
        <h1>Question type</h1>
    </div>
</div>
<div class="container-sm mt-4">
    <form action="{{ route('forms.form.question') }}" method="GET">
        @csrf
        <div class="form-group col-md-6">
            <label>Select type</label>
            <select id="type" name="type_id" class="form-control">
                <option {{ ($type->id) == 1}}  value=1>Input Text</option>
                <option {{ ($type->id) == 2 }}  value=2>Message</option>
            </select>
        </div>

        <input value="{{ $form_id }}" type="text" name="form_id" id="form_id"
               class="hidden">

        <button type="submit" class="btn btn-success btn-lg">
            Continue
        </button>


    </form>


</div>
