<div>
    <div>
        @include('users.shared._navbar')
    </div>

    <div class="container-sm mt-5">
        <h2>Form id: {{$form->id}}</h2>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Hash</th>
                <th scope="col">Started at</th>
                <th scope="col">Finished at</th>
                <th scope="col">Nº Questions</th>
                <th scope="col">Completed</th>
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
                    <td>@if($session->completed === 0)
                            <p>No</p>
                        @else
                            <p>Yes</p>
                        @endif</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Actions
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a style="text-decoration: none" id="a" onclick="copy(this)" type="text"
                                   class="dropdown-item pointer"
                                   title="{{ route('session.forms',['hash' => $session->hash, 'id' => $form->id]) }}">
                                    Copy Link
                                </a>
                                @if($session->completed === 0 )
                                    <a style="text-decoration: none" class="dropdown-item pointer" data-toggle="modal"
                                       id="smallButton"
                                       data-target="#smallModal"
                                       data-attr="{{ route('session.preview',['id' => $form->id]) }}">
                                        Send Form
                                    </a>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</div>
