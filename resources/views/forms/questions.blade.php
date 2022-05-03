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
                        <textarea class="form-control" title="{{ucfirst($formQuestion->help_text)}}"
                                  {{$formQuestion->required === true ? 'required' : ''}}
                                  id="message" name="message" aria-describedby="emailHelp"></textarea>
                    </div>


                @else
                    <p>Input ID: {{$formQuestion->id}}</p>
                    <div class="form-group">
                        <label for="input">{{ucfirst($formQuestion->label)}}</label>
                        <input class="form-control" title="{{ucfirst($formQuestion->help_text)}}"
                               {{$formQuestion->required === true ? 'required' : ''}} type="text" id="input"
                               placeholder="{{ucfirst($formQuestion->placeholder)}}" name="input">
                    </div>
                @endif
            @endforeach
            <button type="submit" class="btn btn-success btn-lg">Answer
            </button>
        </form>
    </div>
@endsection
