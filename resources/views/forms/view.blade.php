@extends('layouts.layout')
@section('title', 'Form Edit')
@section('heading')
    <div class="container-fluid col col-4">
        <h1 class="col row text-center">Form Detail</h1>
        <a href="{{ route('forms') }}" class="btn btn-outline-primary row col col-4" type="button">Back</a>
    </div>
@endsection
@section('content')
    <div class="container-fluid white p-5">
        <div class="container-fluid">
            <table class="table table-xxl">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">{{$form->id}}</th>
                    <td>
                        {{$form->name}}</td>
                    <td>{!!  html_entity_decode($form->title) !!}</td>
                    <td>{!!  html_entity_decode($form->description) !!}</td>
                </tr>
                </tbody>
            </table>
            <a title="Questions"
               href="{{ route('forms.form.questions',['id' => $form->id]) }}">
                <h3 href="#Filter" class="btn btn-primary btn-lg" data-toggle="collapse" type="button">
                    See {{count($questions)}} questions</h3>
            </a>
            <div id="Filter" wire:ignore class="collapse">
                <table class="table table-xxl">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Type</th>
                        <th scope="col">Label</th>
                        <th scope="col">Help Text</th>
                        <th scope="col">Placeholder</th>
                        <th scope="col">Required</th>
                        <th scope="col">Order</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $question)
                        <tr>
                            {{$question}}
                            <th scope="row">{{$question->id}}</th>
                            <td>
                                @if($question->type_id == 2)
                                    <p>Message</p>
                                @else
                                    <p>Input Text</p>
                                @endif
                            </td>
                            <td>{{$question->label}}</td>
                            <td>{{$question->help_text}}</td>
                            <td>{{$question->placeholder}}</td>
                            <td>
                                @if($question->required == 1)
                                    <p>Yes</p>
                                @else
                                    <p>No</p>
                                @endif
                            </td>
                            <td>{{$question->order_}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                            id="dropdownMenuButton"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" title="Edit this form"
                                           href="">
                                            Edit
                                        </a>
                                        <a class="dropdown-item">
                                            <form action="{{ route('forms.form.view.delete',['id' => $question->id]) }}"
                                                  method="POST">
                                                <input name="_method" type="hidden" value="DELETE">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger">
                                                    Delete Question
                                                </button>
                                            </form>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('forms.form.view.delete',['id' => $question->id]) }}"
                                      method="POST">
                                    <input name="_method" type="hidden" value="DELETE">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">Delete question
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a class="dropdown-item" title="Edit this form"
                                   href="{{ route('questions.edit',['id' => $question->id]) }}">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
