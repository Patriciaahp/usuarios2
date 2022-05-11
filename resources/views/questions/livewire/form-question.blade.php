@extends('layouts.layout')

@section('title', 'Question type')
@section('heading')
    <h1 class="col ">Question Details </h1>
    <h3>Form id:{{$form_id}}</h3>
    <div>
        <form action="{{ route('questions.type') }}" method="GET">
            @csrf
            <div class="container-sm">
                <input value="{{ $form_id }}" type="text" name="form_id" id="form_id"
                       class="hidden">
                <button type="submit" class="btn btn-outline-primary">
                    Back
                </button>
            </div>
        </form>
    </div>
@endsection
@section('content')
    <div class="container-fluid white p-4">
        @if($errors->any())
            @include('questions.shared._errors')
        @else
            @include('questions.shared._infoCreated')
        @endif

        @if($type_id == 2)
            @include('questions.livewire.form-question-message')
        @else
            @include('questions.livewire.form-question-input-text')
        @endif
    </div>
@endsection
