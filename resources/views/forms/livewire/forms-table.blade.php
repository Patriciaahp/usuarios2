@include('users.shared._navbar')
<div>
    <div class=" container-xxl shadow p-3 mb-5 bg-body rounded fs-4">
        <div class="container-fluid ">
            <h1>Form List</h1>
            <a href="{{ route('create') }}" class="btn btn-success btn-lg" type="button">New Form</a>

            <div class="col col-5  align-self-center ">
                <label for="search" class="form-label"></label>
                <input name="name" wire:model="search" type="text" class="form-control"
                       list="datalistOptions"
                       id="search" placeholder="Type to search...">
            </div>
        </div>
    </div>

    <div class="container-sm">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
            </tr>
            </thead>
            <tbody>
            @foreach($forms as $form)
                <tr>
                    <td>{{$form->id}}</td>
                    <td>{{$form->name}}</td>
                    <td>{!!  html_entity_decode($form->title) !!}</td>
                    <td>{!!  html_entity_decode($form->description) !!}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Actions
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" title="Edit this form"
                                   href="{{ route('edit',['id' => $form->id]) }}">
                                    Edit
                                </a>

                                <a class="dropdown-item" href="{{ route('preview',['id' => $form->id]) }}">
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


</div>
