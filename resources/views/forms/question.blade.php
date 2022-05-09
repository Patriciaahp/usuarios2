@extends('layouts.layout')

@section('title', 'Question Create')
@section('heading')
    <div class="container-fluid col col-4">
        <h1 class="row col col-6">Create Question</h1>

    </div>
@endsection
@section('content')
    @if ($errors->any())
        @include('users.shared._errors')
    @endif
    @foreach($types as $type)
    @endforeach
    <form action="{{ route('forms.form.create') }}" method="GET">
        @csrf
        <div class="form-group col-md-6">
            <label>Select type</label>
            <select id="type" name="type" class="form-control">
                <option value="">--Select--</option>
                <option {{ ($type->name) == 'Input Text'}}  value="Input Text">Input Text</option>
                <option {{ ($type->name) == 'Message' }}  value="Message">Message</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success btn-lg">New
            Question
        </button>
    </form>
@endsection
