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


            @foreach($form->formQuestions as $formQuestion)
                @if($formQuestion->type_id ===2)
                    <p>Message ID: {{$formQuestion->id}}</p>
                    <div class="form-group">
                        <label for="message">{{ucfirst($formQuestion->label)}}</label>
                        <x-textarea class="form-control"
                                    title="{{ucfirst($formQuestion->help_text)}}"
                                    {{$formQuestion->required === true ? 'required' : ''}}
                                    name="message"
                                    type="textarea"
                                    id="message"
                        />
                    </div>
                @else
                    <p>Input ID: {{$formQuestion->id}}</p>

                    <div class="form-group">
                        <label for="input">{{ucfirst($formQuestion->label)}}</label>
                        <x-input.text class="form-control"
                                      title="{{ucfirst($formQuestion->help_text)}}"
                                      {{$formQuestion->required === true ? 'required' : ''}}
                                      size="32"
                                      name="input"
                                      type="text"
                                      id="input"
                                      placeholder="{{$formQuestion->placeholder}}"/>
                    </div>
                @endif
            @endforeach
            <button type="submit" class="btn btn-success btn-lg">Answer
            </button>
        </form>
    </div>
@endsection
