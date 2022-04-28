<div class="container-sm">
    <a href="{{ route('forms.create') }}" class="btn btn-success btn-lg" type="button">New Form</a>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($forms as $form)
            <tr>
                <td>{{$form->id}}</td>
                <td><a data-toggle="modal" id="smallButton" data-target="#smallModal"
                       data-attr="{{ route('forms.show',['id' => $form->id]) }}" title="Show details">
                    {{$form->name}}</td>

                <td>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            Actions
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" title="Edit this form"
                               href="{{ route('forms.edit',['id' => $form->id]) }}">
                                Edit
                            </a>

                            <a class="dropdown-item" href="{{ route('forms.preview',['id' => $form->id]) }}">
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
