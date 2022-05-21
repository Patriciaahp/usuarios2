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
        <form action="{{ route('answer.create', ['id' => $form->id]) }}" method="POST">
            @csrf
            @foreach($questions as $key => $question)

                <input hidden value="{{ $session_id }}" type="text" name="session_id" id="session_id">

                <input hidden value="{{ $form_id }}" type="text" name="form_id" id="form_id">

                <p hidden> {{$question->id}}</p>
                <input hidden value="{{ $question->id }}" type="text" name="formulary_question_id_{{ $question->id }}"
                       id="formulary_question_id">
                @if($question->type_id ===2)
                    <div class="form-group mt-5 mb-5">
                        <label>{{ucfirst($question->label)}}</label>
                        <p>
                            {!!  html_entity_decode($question->help_text) !!}
                        </p>

                    </div>

                @else
                    <div class="form-group mt-5 mb-5">
                        <label for="input">{{ucfirst($question->label)}}:</label>
                        <x-forms.input.text
                            title="{{ucfirst($question->help_text)}}"
                            name="answer{{$key + 1}}"
                            placeholder="{{ucfirst($question->placeholder)}}"
                            required="{{$question->required}}"/>
                    </div>
                @endif

            @endforeach
            <button class="btn btn-success mt-5" type="submit">Answer</button>
        </form>
    </div>
@endsection

