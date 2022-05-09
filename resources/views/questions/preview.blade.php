@extends('layouts.layout')
@section('title', 'Form Edit')
@section('heading')
    <div class="container-fluid col col-4">
        <h1 class="col row text-center">Are you sure?</h1>
        <a href="{{ route('forms.form.view', ['id' => $id]) }}" class="btn btn-outline-primary row col col-4"
           type="button">Back</a>
    </div>
@endsection
@section('content')
    <div class="container-sm white p-4">
        <div class="container-sm">
            <h1>Form: {{$id}}</h1>
            <h2>Id: {{$question->id}}</h2>
            <h3>Label: {{$question->label}}</h3>
            <h3>Help Text: {{$question->help_text}}</h3>
            <h3>Question number : {{$question->order_}}</h3>

            <div class="container-sm">
                <div class="col">
                    <form action="{{ route('questions.delete',['id' => $question->id]) }}"
                          method="POST">
                        <input name="_method" type="hidden" value="DELETE">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Delete question
                        </button>
                    </form>
                </div>
            </div>

        </div>
@endsection
