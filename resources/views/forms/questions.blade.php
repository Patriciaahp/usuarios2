@extends('layouts.layout')

@section('title', 'Question Create')
@section('heading')
    <div class="container-fluid col col-4">
        <h1 class="row col col-6">Questions Form: {{$form->name}}</h1>

    </div>
@endsection
@section('content')
    <div class="white p-4">
        <form action="">
            @foreach($questions as $question)
                @if($question->type_id ===2)
                    <p>Message ID: {{$question->id}}</p>
                    <div class="form-group">
                        <label for="message">{{ucfirst($question->label)}}</label>
                        <x-forms.textarea
                            name="message"
                            title="{{ucfirst($question->help_text)}}"
                            required="{{$question->required}}"
                        ></x-forms.textarea>
                    </div>
                @else
                    <p>Input ID: {{$question->id}}</p>

                    <div class="form-group">
                        <label for="input">{{ucfirst($question->label)}}</label>
                        <x-forms.input.text
                            title="{{ucfirst($question->help_text)}}"
                            name="input"
                            placeholder="{{$question->placeholder}}"
                            required="{{$question->required}}"/>
                    </div>
                @endif
            @endforeach
            <button type="submit" class="btn btn-success btn-lg">Answer
            </button>
        </form>
    </div>
@endsection
