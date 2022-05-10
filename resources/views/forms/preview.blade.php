@extends('layouts.layout')
@section('title', 'Form Edit')
@section('heading')
    <div class="container-fluid col col-4">
        <h1 class="col row text-center">Are you sure?</h1>
        <a href="{{ route('forms') }}" class="btn btn-outline-primary row col col-4" type="button">Back</a>
    </div>
@endsection
@section('content')
    <div class="container-sm white p-4">
        <div class="container-sm">
            <h1>Form:</h1>
            <h2>Id: {{$form->id}}</h2>
            <h3>Name: {{$form->name}}</h3>
            <h3>Title: {!!  html_entity_decode($form->title) !!}</h3>
            <h3>Description: {!!  html_entity_decode($form->description) !!}</h3>
        </div>
        <a title="Questions"
           href="{{ route('questions.detail',['id' => $form->id]) }}">
            <h3>See {{count($questions)}} questions</h3>
        </a>
        <div class="container-sm">
            <div class="col">
                <form action="{{ route('forms.delete',['id' => $form->id]) }}" method="POST">
                    <input name="_method" type="hidden" value="DELETE">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Yes, I want to delete this form and all the
                        questions
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
