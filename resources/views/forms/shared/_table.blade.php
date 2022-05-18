<div class="container-sm mt-5">
    @if($forms->count())
        <table class="table table-hover">
            <thead class="thead">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
                
            </tr>
            </thead>
            <tbody>
            @foreach($forms as $form)
                <tr>
                    <td>{{$form->id}}</td>
                    <td><a data-toggle="modal" id="smallButton" data-target="#smallModal"
                           data-attr="{{ route('forms.show',['id' => $form->id]) }}" title="Show details">
                        {{ucfirst($form->name)}}
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn button tealOutline dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Actions
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <form action="{{ route('session',['id' => $form->id]) }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" title="Add session">
                                        New session
                                    </button>
                                </form>
                                <a class="dropdown-item" title="Sessions Available"
                                   href="{{ route('send', ['id' => $form->id]) }}">
                                    Sessions
                                </a>
                                <a class="dropdown-item" title="Preview of this form"
                                   href="{{ route('forms.view',['id' => $form->id]) }}">
                                    Preview
                                </a>
                                <a class="dropdown-item" title="Details of this form"
                                   href="{{ route('questions.detail',['id' => $form->id]) }}">
                                    Detail
                                </a>
                                <a class="dropdown-item" title="Edit this form"
                                   href="{{ route('forms.edit',['id' => $form->id]) }}">
                                    Edit
                                </a>
                                <a class="dropdown-item" title="Delete this form"
                                   href="{{ route('forms.preview',['id' => $form->id]) }}">
                                    Delete
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
</div>

@else
    <h2>No forms available</h2>
@endif
