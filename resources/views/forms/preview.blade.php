@extends('layouts.layout')
@section('title', 'Form Edit')
@section('heading')
    <div class="text-center container-fluid row">
        <h1 class="col ">Are you sure?</h1>
    </div>
@endsection
@section('content')
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
             class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
             aria-label="Warning:">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <div>
            You won't be able to revert this!
        </div>
    </div>
    <div class="container-sm white p-4">
        <div class="container-sm">
            <h1>ID: {{$form->id}}</h1>
            <h3>{{$form->name}}</h3>
            <h3>{{$form->title}}</h3>
            <h3>{{$form->description}}</h3>
        </div>
        <div class="container-sm">
            <div class="col">
                <form action="{{ route('delete',['id' => $form->id]) }}" method="POST">
                    <input name="_method" type="hidden" value="DELETE">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Yes, I want to delete this form</button>
                </form>
            </div>
        </div>
    </div>
@endsection
