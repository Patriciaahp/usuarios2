<div>
    <div class="container-sm white p-5 mt-5">
        <form wire:submit.prevent="submit">
            <div class="form-group">
                <label for="choice">Add choice</label>
                <input type="text" class="form-control" id="choice"
                       placeholder="Add choice" wire:model="option">
                @error('option') <span class="text-danger">{{ $message }}</span> @enderror
                <small id="choice" class="form-text text-muted">Add choice for this form</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
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
                            <button wire:click="delete({{$option->id}})">Delete</button>
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
