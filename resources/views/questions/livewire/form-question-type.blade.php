@extends('layouts.layout')

@section('title', 'Question type')
@section('heading')
    <h1 class="col ">Question type</h1>
    <div>
        <a href="{{ route('forms.form.view', ['id' => $form_id]) }}" class="btn btn-outline-primary" type="button">Form
            view</a>
    </div>
@endsection
@section('content')
    @foreach($types as $type)
    @endforeach
    <div class="container-sm white p-4">
        <h3>Select type:</h3>
        <div>
            <form action="{{ route('forms.form.question') }}" method="GET">
                @csrf
                <div class="form-group row col-md-6 m-1">
                    <select id="type" name="type_id" class="form-control">
                        <option {{ ($type->id) == 1}}  value=1>Input Text</option>
                        <option {{ ($type->id) == 2 }}  value=2>Message</option>
                    </select>
                </div>
                <div class="align-self-center">
                    <input value="{{ $form_id }}" type="text" name="form_id" id="form_id"
                           class="hidden">
                    <button type="submit" class="btn btn-success m-1">
                        Continue
                    </button>
                </div>

            </form>
        </div>
@endsection
