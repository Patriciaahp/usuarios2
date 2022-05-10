<div>
    <div>
        @include('users.shared._navbar')

    </div>

    <div class="container-sm mt-5">
        <div class="container-fluid">
            <table class="table table-xxl">
                <thead class="thead">
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
               href="{{ route('forms.questions',['id' => $form->id]) }}">
                <h3 href="#Filter" class="button tealOutline" data-toggle="collapse" type="button">
                    Show {{count($questions)}} questions</h3>
            </a>
            <div id="Filter" wire:ignore class="collapse">
                <div class="float-right">
                    <form action="{{ route('questions.type') }}" method="GET">
                        @csrf
                        <div class="container-sm">
                            <input value="{{ $form->id }}" type="hidden" name="form_id" id="form_id"
                                   class="form-control">
                            <div class="d-flex flex-row-reverse">
                                <button type="submit" class="button teal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-plus-lg"
                                         viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                    </svg>
                                    New
                                    Question
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table table-xxl mt-5">
                    <thead class="thead">
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
                                    <button class="button tealOutline dropdown-toggle" type="button"
                                            id="dropdownMenuButton"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" title="Edit this form"
                                           href="{{ route('questions.edit',['id' => $question->id]) }}">
                                            Edit
                                        </a>
                                        <a class="dropdown-item"
                                           href="{{ route('questions.preview',['id' => $question->id]) }}">
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
    </div>
