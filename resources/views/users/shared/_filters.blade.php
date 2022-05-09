<div class="container-fluid">
    <div class="nav-item p-4">
        <div class="col align-self-end">
            <button href="#Filter" class="button tealOutline col-md-4" data-toggle="collapse" type="button">
                Filter
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-funnel-fill" viewBox="0 0 16 16">
                    <path
                        d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z"/>
                </svg>
            </button>
            <select class="form-select button tealOutline col-md-4" aria-label="Default select example"
                    wire:model="per_page">
                <option value="10" selected="" disabled="" hidden="">Entries</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="30">30</option>
            </select>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-8">
            <label for="search" class="form-label">
            </label>
            <input name="name" wire:model="search" type="text" class="form-control"
                   list="datalistOptions"
                   id="search" placeholder="Type to search...">

        </div>
    </div>
    <div class="container-sm">
        <div id="Filter" wire:ignore class="collapse">
            <h3>Show/Hide columns:</h3>
            <div class="container-fluid d-flex justify-content-center align-self-end ">
                @foreach($columns as $column)

                    <div class="container-sm align-self-end">
                        <input id="{{$column}}" type="checkbox" wire:model="selectedColumns" value="{{$column}}">
                        <label for="{{$column}}">{{$column}}</label>

                    </div>
                @endforeach
            </div>
            <div class="container-sm row align-self-end" wire:ignore>
                <h3>Date range:</h3>
                <div class="container-sm col col-2">
                    <h4>From:</h4>
                    <div class="form">
                        <input wire:model="from" type="date" class="form-control" data-provide="datepicker" placeholder=
                        "enter date : using attribute" style="width:150px;" data-date-format="dd/mm/yyyy">
                    </div>
                </div>

                <div class="container-sm col col-2">
                    <h4>To:</h4>
                    <div class="form">
                        <input wire:model="to" type="date" class="form-control" data-provide="datepicker" placeholder=
                        "enter date : using attribute" style="width:150px;" data-date-format="dd/mm/yyyy">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
