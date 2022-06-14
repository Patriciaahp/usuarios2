<div>
    <div class="container-sm white p-5 mt-5">
        <form wire:submit.prevent="submit">
            <div class="form-group">
                <label for="choice">Add choice</label>
                <input type="text" class="form-control" id="choice"
                       placeholder="Add choice" wire:model="option">

                <input value="{{$question_id}}" type="text" class="form-control" id="question_id"
                       wire:model="question_id" hidden>

                @error('option') <span class="text-danger row ">{{ $message }}</span> @enderror

                <small id="choice" class="form-text text-muted ">Add choice for this
                    form</small>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('questions.detail', ['id' => $form_id]) }}" class="btn btn-outline-primary" type="button">
                Add this options</a>
        </form>

    </div>

    <div class="container-sm white p-5 mt-5">

        @if($options)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Option</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($options as $option)
                    <tr>
                        <td>{{$option->id}}</td>
                        <td>{{$option->option}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn button tealOutline dropdown-toggle" type="button"
                                        id="dropdownMenuButton"
                                        data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" title="Answers"
                                       wire:click="delete({{$option->id}})">Delete
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h2>Any options yet</h2>
        @endif
    </div>
</div>
