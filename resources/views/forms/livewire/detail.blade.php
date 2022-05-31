<div>
    <div>
        @include('users.shared._navbar')
    </div>

    <div class="container-sm mt-5 mb-5">
        <div class="container-fluid">
            <table class="table table-xxl">
                <h3>Form Detail</h3>
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

            <div>
                <div class="float-right">
                    <form action="{{ route('questions.type') }}" method="GET">
                        @csrf
                        <div class="container-sm">
                            <input value="{{ $form->id }}" type="hidden" name="form_id" id="form_id"
                                   class="form-control">
                            <div class="d-flex flex-row-reverse">
                                <button type="submit" class="button teal" title="Add a question for this form">
                                    Add question
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table table-xxl mt-5">
                    <h3>Question Detail</h3>
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
                                @switch($question->type_id)
                                    @case(4)
                                    <p>Single Choice</p>
                                    @break
                                    @case(3)
                                    <p>Text Area</p>
                                    @break
                                    @case(2)
                                    <p>Message</p>
                                    @break
                                    @case(1)
                                    <p>Input Text</p>
                                    @break
                                @endswitch
                            </td>
                            <td>{{$question->label}}</td>
                            <td>{!!  html_entity_decode($question->help_text) !!}</td>
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
                                            title="Actions for this question"
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
                                        <a class="dropdown-item"
                                           href="{{ route('questions.view',['id' => $question->id]) }}">
                                            Preview
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
</div>
