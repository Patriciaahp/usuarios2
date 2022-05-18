@extends('layouts.layout')

@section('title', 'Question Create')
@section('heading')
    <div class="container-fluid col col-4">
        <h1>Form id: {{$form->id}}</h1>
        <a href="{{ route('forms') }}" class="btn btn-outline-primary" type="button">Form List</a>

    </div>
@endsection
@section('content')
    <div class="white p-4">
        @foreach($questions as $question)
            @if($question->type_id ===2)
                <p>Message ID: {{$question->id}}</p>
                <div class="form-group">
                    <label for="message">{{ucfirst($question->label)}}</label>
                    <x-forms.textarea
                        name="message"
                        id="message"
                        title="{{ucfirst($question->help_text)}}"
                        required="{{$question->required}}"
                        placeholder="{{$question->help_text}}"
                    />
                </div>
            @else
                <p>Input ID: {{$question->id}}</p>

                <div class="form-group">
                    <label for="input">{{ucfirst($question->label)}}</label>
                    <x-forms.input.text class="form-control"
                                        title="{{ucfirst($question->help_text)}}"
                                        name="input"
                                        placeholder="{{ucfirst($question->placeholder)}}"
                                        required="{{$question->required}}"/>
                </div>
            @endif
        @endforeach
    </div>
@endsection
