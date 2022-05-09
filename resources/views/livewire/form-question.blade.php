@extends('layouts.layout')

@section('title', 'Question type')
@section('heading')
    <h1 class="col ">Question Details</h1>
    <div>
        <form action="{{ route('questions.type') }}" method="GET">
            @csrf
            <div class="container-sm">
                <input value="{{ $form_id }}" type="text" name="form_id" id="form_id"
                       class="hidden">
                <button type="submit" class="btn btn-outline-primary">
                    Back
                </button>
            </div>
        </form>
    </div>
@endsection
@section('content')
    <div class="container-fluid white p-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    @endif
                    @if($type_id == 2)
                        <form action="{{ route('questions.store') }}" method="POST">
                            @csrf
                            <div class="container-sm row mx-auto ">
                                <div class="form-group col-xs-8">
                                    <label for="label">Label:</label>
                                    <input value="{{ old('label', $form->label) }}" type="text" name="label" id="label"
                                           class="form-control">
                                </div>

                                <input value="{{ $type_id }}" type="text" name="type_id" id="type_id"
                                       class="hidden">

                                <input value="{{ $form_id }}" type="text" name="form_id" id="form_id"
                                       class="hidden">

                                <div class="form-group row ">
                                    <label for="helpText">Help Text:</label>
                                    <textarea class="form-control" id="helpText"
                                              name="helpText">{{ old('helpText', $form->helpText) }}</textarea>
                                </div>
                                <div class="form-group row col-xs-4">
                                    <label for="order_">Order:</label>
                                    <input class="form-control" min="1" value="{{ old('order_', $form->order_) }}"
                                           type="number"
                                           id="order_"
                                           name="order_"
                                    >
                                </div>
                                <div class="form-group row">
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
                                <div>
                                    <button type="submit" class="btn btn-success">Create Form</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('questions.store') }}" method="POST">
                            @csrf
                            <div class="container-sm row mx-auto ">
                                <div class="form-group">
                                    <label for="label">Label:</label>
                                    <input value="{{ old('label', $form->label) }}" type="text" name="label" id="label"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="placeholder">Placeholder:</label>
                                    <input value="{{ old('placeholder', $form->placeholder) }}" type="text"
                                           name="placeholder"
                                           id="placeholder"
                                           class="form-control">
                                </div>
                                <input value="{{ $type_id }}" type="text" name="type_id" id="type_id"
                                       class="hidden">

                                <input value="{{ $form_id }}" type="text" name="form_id" id="form_id"
                                       class="hidden">

                                <div class="form-group row">
                                    <label for="helpText">Help Text:</label>
                                    <textarea class="form-control" id="helpText"
                                              name="helpText">{{ old('helpText', $form->helpText) }}</textarea>
                                </div>
                                <div class="form-group row col-xs-4">
                                    <label for="order_">Order:</label>
                                    <input min="1" value="{{ old('order_', $form->order_) }}" type="number" id="order_"
                                           name="order_"
                                           class="form-control">
                                </div>
                                <div class="form-group row">
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
                                <div class="">
                                    <button type="submit" class="btn btn-success">Create Form</button>
                                </div>
                            </div>
                        </form>
                @endif
            </div>
@endsection
