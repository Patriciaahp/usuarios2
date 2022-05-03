@extends('layouts.layout')

@section('title', 'Question Create')
@section('heading')
    <div class="container-fluid col col-4">
        <h1 class="row col col-6">Create Question</h1>
    </div>
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    @if($type == "Message")
        <form action="{{ route('forms.form.store') }}" method="POST">
            @csrf
            <div class="container-sm">
                <div class="form-group">
                    <label for="label">Label:</label>
                    <input value="{{ $form->label }}" type="text" name="label" id="label" class="form-control">
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
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                               checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>
                </div>

            </div>

            <div>
                <button type="submit" class="btn btn-success">Create Form</button>
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
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                               checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>
                </div>

            </div>

            <div>
                <button type="submit" class="btn btn-success">Create Form</button>
            </div>
        </form>
    @endif

@endsection
