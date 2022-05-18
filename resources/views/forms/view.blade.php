@extends('layouts.layout')

@section('title', 'Question Create')
@section('heading')
    <div class="container-fluid col col-4">
        <h1>Form: {{$form->name}}</h1>
    </div>
@endsection
@section('content')
    <div class="white p-4">
        @foreach($questions as $question)
            @if($question->type_id ===2)
                <div class="form-group mt-5 mb-5">
                    <label>{{ucfirst($question->label)}}</label>
                    <p>
                        {!!  html_entity_decode($question->help_text) !!}
                    </p>

                </div>

            @else
                <div class="form-group mb-5 mt-5">
                    <label for="input">{{ucfirst($question->label)}}:</label>
                    <x-forms.input.text
                        title="{{ucfirst($question->help_text)}}"
                        name="input"
                        placeholder="{{ucfirst($question->placeholder)}}"
                        required="{{$question->required}}"/>
                </div>
            @endif
        @endforeach
    </div>
@endsection
