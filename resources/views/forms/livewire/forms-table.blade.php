<div>
    @include('users.shared._navbar')
    <div class="container-sm">
        <div class="col col-2 ">
            <a href="{{ route('forms.create') }}" class=" teal button " type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg"
                     viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                </svg>
                New Form</a>
        </div>
        <div class="col-1"></div>
        <div class="container-sm col col-4">
            <label for="search" class="form-label"></label>
            <input name="name" wire:model="search" type="text" class="form-control"
                   list="datalistOptions"
                   id="search" placeholder="Type to search...">
        </div>
        <div class="col-6"></div>
    </div>
    @include('forms.shared._table')
</div>
