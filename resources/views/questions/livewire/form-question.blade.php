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
        @switch($type_id)
            @case(4)
            @include('questions.livewire.form-question-single-choice')
            @break
            @case(3)
            @include('questions.livewire.form-question-text-area')
            @break
            @case(2)
            @include('questions.livewire.form-question-message')
            @break
            @case(1)
            @include('questions.livewire.form-question-input-text')
            @break
        @endswitch
    </div>
@endsection
