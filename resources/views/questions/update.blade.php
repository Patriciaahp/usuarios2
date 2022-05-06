@extends('layouts.layout')

@section('title', 'Question Create')
@section('heading')
    <div class="container-fluid col col-4">
        <h1 class="row col col-6">Updating Question: {{$question->id}}</h1>
        <a href="{{ route('forms.form.view', ['id' => $id]) }}" class="btn btn-outline-primary row col col-4"
           type="button">Back</a>
    </div>
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                @endif
                <div class="white p-4">
                    @if($question->type_id == 2)
                        <form action="{{ route('questions.update', $question) }}" method="POST">
                            {{ method_field('PUT') }}
                            @csrf
                            <div class="container-sm row mx-auto ">
                                <div class="form-group col-xs-8">
                                    <label for="label">Label:</label>
                                    <input value="{{ $question->label }}" type="text" name="label" id="label"
                                           class="form-control">
                                </div>

                                <input value="{{ $question->type_id }}" type="text" name="type_id" id="type_id"
                                       class="hidden">

                                <input value="{{ $question->form_id }}" type="text" name="form_id" id="form_id"
                                       class="hidden">

                                <div class="form-group row ">
                                    <label for="helpText">Help Text:</label>
                                    <textarea class="form-control" id="helpText"
                                              name="helpText">{{ $question->helpText }}</textarea>
                                </div>
                                <div class="form-group row col-xs-4">
                                    <label for="order_">Order:</label>
                                    <input class="form-control" min="1" value="{{$question->order_}}" type="number"
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
                                    <button type="submit" class="btn btn-success">Update Question</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('questions.update', $question) }}" method="POST">
                            {{ method_field('PUT') }}
                            @csrf
                            <div class="container-sm row mx-auto ">
                                <div class="form-group">
                                    <label for="label">Label:</label>
                                    <input value="{{ $question->label }}" type="text" name="label" id="label"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="placeholder">Placeholder:</label>
                                    <input value="{{ $question->placeholder }}" type="text" name="placeholder"
                                           id="placeholder"
                                           class="form-control">
                                </div>
                                <input value="{{ $question->type_id }}" type="text" name="type_id" id="type_id"
                                       class="hidden">

                                <input value="{{ $question->form_id }}" type="text" name="form_id" id="form_id"
                                       class="hidden">

                                <div class="form-group row">
                                    <label for="helpText">Help Text:</label>
                                    <textarea class="form-control" id="helpText"
                                              name="helpText">{{ $question->helpText }}</textarea>
                                </div>
                                <div class="form-group row col-xs-4">
                                    <label for="order_">Order:</label>
                                    <input min="1" value="{{$question->order_}}" type="number" id="order_" name="order_"
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
                                    <button type="submit" class="btn btn-success">Update Question</button>
                                </div>
                            </div>
                        </form>
    @endif
@endsection
