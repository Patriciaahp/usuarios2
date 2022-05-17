@extends('layouts.layout')

@section('title', 'Question Create')
@section('heading')
    <div class="container-fluid col col-4">
        <h1>Form Sessions: {{$form->name}}</h1>
    </div>
@endsection
@section('content')
    <h2>Form id: {{$form->id}}</h2>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Hash</th>
            <th scope="col">Started at</th>
            <th scope="col">Finished at</th>
            <th scope="col">Nº Questions</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        @foreach($sessions as $session)
            <tbody>
            <tr>
                <th scope="row">{{$session->id}}</th>

                <td>
                    {{$session->hash}}
                </td>
                <td>{{$session->started_at}}</td>
                <td>{{$session->finished_at}}</td>
                <td>{{$questions->count()}}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            Actions
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a id="a" onclick="copy(this)" type="text" class="dropdown-item pointer"
                               title="{{ route('session.forms',['hash' => $session->hash, 'id' => $form->id]) }}">
                                Copy Link
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>
@endsection
<script>

    function copy(that) {
        let inp = document.createElement('input');
        document.body.appendChild(inp)
        inp.value = that.title
        inp.select();
        document.execCommand('copy');
        inp.remove();
    }
</script>

<style>
    .pointer {
        cursor: pointer;
    }
</style>
