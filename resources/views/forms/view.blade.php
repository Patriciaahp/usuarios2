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

            @switch($question->type_id)
                @case(4)
                <div class="form-group row">
                    <label for="choice">{{ucfirst($question->label)}}</label>
                    <div class="form-check ml-4">
                        <input value="yes" class="form-check-input" type="radio"
                               name="choice"
                               id="yes">
                        <label class="form-check-label" for="choice">
                            Yes
                        </label>
                    </div>
                    <div class="form-check ml-4">
                        <input value="no" class="form-check-input" type="radio"
                               name="choice"
                               id="no">
                        <label class="form-check-label" for="choice">
                            No
                        </label>
                    </div>
                </div>
                @break
                @case(3)
                <div class="form-group mt-5 mb-5">
                    <label>{{ucfirst($question->label)}}</label>
                    <x-forms.textarea
                        name="message"
                        title=" {!!  html_entity_decode($question->help_text) !!}"
                        required="{{$question->required}}"
                    ></x-forms.textarea>
                </div>
                @break
                @case(2)
                <div class="form-group mt-5 mb-5">
                    <p hidden>{{$helpText = str_replace("<p>", "", str_replace("</p>", "", $question->help_text))}}</p>
                    <label>{{ucfirst($question->label)}}</label>
                    <x-forms.message
                        value="{{$helpText}}"
                    ></x-forms.message>

                </div>

                @break
                @case(1)
                <div class="form-group mb-5 mt-5">
                    <label for="input">{{ucfirst($question->label)}}:</label>
                    <x-forms.input.text
                        title="{!!  html_entity_decode($question->help_text) !!}"
                        name="input"
                        placeholder="{{ucfirst($question->placeholder)}}"
                        required="{{$question->required}}"/>
                </div>
                @break
            @endswitch
        @endforeach
    </div>
@endsection
