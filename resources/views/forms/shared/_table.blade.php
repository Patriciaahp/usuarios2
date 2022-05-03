<div class="container-sm">
    <a href="{{ route('forms.create') }}" class="btn btn-success btn-lg" type="button">New Form</a>

    <table class="table table-hover">
        <thead>
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
                <td class="col col-2">
                    <form action="{{ route('forms.form.type') }}" method="GET">
                        @csrf
                        <div class="container-sm">
                            <input value="{{ $form->id }}" type="hidden" name="form_id" id="form_id"
                                   class="form-control">
                            <button type="submit" class="btn btn-success btn-lg">
                                New
                                QuestionLivewire
                            </button>
                        </div>
                    </form>
                </td>
                <td>
                    {{$form->formQuestions}}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
