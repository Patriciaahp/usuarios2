<div>
    @include('users.shared._navbar')
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
    @include('forms.shared._table')
</div>
