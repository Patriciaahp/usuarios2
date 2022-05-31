@extends('layouts.layout')

@section('title', 'Question Create')
@section('heading')
    <div class="container-fluid col col-4">
        <h1>Form id: {{$form->id}}</h1>
        <h3>Question id: {{$question->id}}</h3>
        <a href="{{ route('questions.detail', ['id' => $form->id]) }}" class="btn btn-outline-primary" type="button">Back</a>

    </div>
@endsection
@section('content')
    <div class="white p-4">
        @switch($question->type_id)
            @case(2)
            <div class="form-group">
                <label>{{ucfirst($question->label)}}</label>
                <p>
                    {!!  html_entity_decode($question->help_text) !!}
                </p>

            </div>
            @break
            @case(1)
            <div class="form-group">
                <label for="input">{{ucfirst($question->label)}}</label>
                <x-forms.input.text
                    title="{{ucfirst($question->help_text)}}"
                    name="input"
                    placeholder="{{$question->placeholder}}"
                    required="{{$question->required}}"/>
            </div>
            @break
        @endswitch
    </div>
@endsection
