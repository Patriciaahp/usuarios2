<div class=" container-xxl shadow p-3 mb-5 bg-body rounded fs-4">
    <div class="container-fluid ">
        <h1>Question details</h1>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            @endif
            @if($type_id == 2)
                <form action="{{ route('forms.form.store') }}" method="POST">
                    @csrf

                    <div class="container-sm">
                        <div class="form-group">
                            <label for="label">Label:</label>
                            <input value="{{ $form->label }}" type="text" name="label" id="label" class="form-control">
                        </div>
                        <div class="container-sm">
                            <div class="form-group">
                                <label for="type_id">type_id:</label>
                                <input value="{{ $type_id }}" type="text" name="type_id" id="type_id"
                                       class="form-control">
                            </div>
                            <div class="container-sm">
                                <div class="form-group">
                                    <label for="form_id">form_id:</label>
                                    <input value="{{ $form_id }}" type="text" name="form_id" id="form_id"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="helpText">helpText:</label>
                                <textarea id="helpText" name="description">{{ $form->helpText }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="order">Order:</label>
                                <select id="order" required="" name="order" class="form-control">
                                    <option value="">--Select--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="required">Required:</label>
                                <div class="form-check">
                                    <input value="yes" class="form-check-input" type="radio" name="required"
                                           id="yes">
                                    <label class="form-check-label" for="required">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input value="no" class="form-check-input" type="radio" name="required"
                                           id="no"
                                           checked>
                                    <label class="form-check-label" for="required">
                                        No
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div>
                            <button type="submit" class="btn btn-success">Create Form</button>
                        </div>
                    </div>
                </form>
            @else
                <form action="{{ route('forms.form.store') }}" method="POST">
                    @csrf
                    <div class="container-sm">
                        <div class="form-group">
                            <label for="label">Label:</label>
                            <input value="{{ $form->label }}" type="text" name="label" id="label" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="placeholder">Placeholder:</label>
                            <input value="{{ $form->placeholder }}" type="text" name="placeholder" id="placeholder"
                                   class="form-control">
                        </div>
                        <div class="container-sm">
                            <div class="form-group">
                                <label for="type_id">type_id:</label>
                                <input value="{{ $type_id }}" type="text" name="type_id" id="type_id"
                                       class="form-control">
                            </div>
                            <div class="container-sm">
                                <div class="form-group">
                                    <label for="form_id">form_id:</label>
                                    <input value="{{ $form_id }}" type="text" name="form_id" id="form_id"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="helpText">helpText:</label>
                                <textarea id="helpText" name="description">{{ $form->helpText }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="order">Order:</label>
                                <select id="order" required="" name="order" class="form-control">
                                    <option value="">--Select--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="required">Required:</label>
                                <div class="form-check">
                                    <input value="yes" class="form-check-input" type="radio"
                                           name="required"
                                           id="yes">
                                    <label class="form-check-label" for="required">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input value="no" class="form-check-input" type="radio"
                                           name="required"
                                           id="no"
                                           checked>
                                    <label class="form-check-label" for="required">
                                        No
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div>
                            <button type="submit" class="btn btn-success">Create Form</button>
                        </div>
                    </div>
                </form>
@endif

