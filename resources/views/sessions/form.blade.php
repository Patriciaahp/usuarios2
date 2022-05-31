@extends('layouts.layout')

@section('title', 'Question Create')
@section('heading')
    <div class="container-fluid col col-4">
        <h1>{!!  html_entity_decode($form->title) !!}</h1>
        <h3>{!!  html_entity_decode($form->description) !!}</h3>
    </div>
@endsection
@section('content')
    <div class="white p-4">
        <form action="{{ route('answer.create', ['id' => $form->id, 'hash' => $session->hash]) }}" method="POST">
            @csrf
            @foreach($questions as $key => $question)
                <input hidden value="{{ $question->label }}" type="text" name="label{{$key + 1}}" id="label">

                <input hidden value="{{ $session_id }}" type="text" name="session_id" id="session_id">

                <input hidden value="{{ $form_id }}" type="text" name="form_id" id="form_id">

                <p hidden> {{$question->id}}</p>
                <input hidden value="{{ $question->id }}" type="text" name="formulary_question_id_{{ $question->id }}"
                       id="formulary_question_id">
                @switch($question->type_id)
                    @case(4)
                    <div class="form-group row">
                        <label for="choice">{{ucfirst($question->label)}}</label>
                        <div class="form-check ml-4">
                            <input {{ $question->required == true ? 'required' : '' }}
                                   value="yes" class="form-check-input" type="radio"
                                   name="answer{{$key + 1}}"
                                   id="yes">
                            <label class="form-check-label" for="answer{{$key + 1}}">
                                Yes
                            </label>
                        </div>
                        <div class="form-check ml-4">
                            <input {{ $question->required == true ? 'required' : '' }}
                                   value="no" class="form-check-input" type="radio"
                                   name="answer{{$key + 1}}"
                                   id="no">
                            <label class="form-check-label" for="answer{{$key + 1}}">
                                No
                            </label>
                        </div>
                    </div>
                    @break
                    @case(3)
                    <div class="form-group mt-5 mb-5">
                        <label class="form-check-label">{{ucfirst($question->label)}}</label>
                        <textarea
                            class="form-control"
                            name="answer{{$key + 1}}"
                            title=" {!!  html_entity_decode($question->help_text) !!}"
                            required="{{$question->required}}"
                        ></textarea>
                    </div>
                    @break
                    @case(2)
                    <div class="form-group mt-5 mb-5">
                        <label>{{ucfirst($question->label)}}</label>
                        <p>
                            {!!  html_entity_decode($question->help_text) !!}
                        </p>

                    </div>

                    @break
                    @case(1)
                    <div class="form-group mt-5 mb-5">
                        <label for="input">{{ucfirst($question->label)}}:</label>
                        <x-forms.input.text
                            title="{{ucfirst($question->help_text)}}"
                            name="answer{{$key + 1}}"
                            placeholder="{{ucfirst($question->placeholder)}}"
                            required="{{$question->required}}"/>
                    </div>
                    @break
                @endswitch

            @endforeach
            <button class="btn btn-success mt-5" type="submit">Answer</button>
        </form>
    </div>
@endsection

