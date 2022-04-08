<div class="container-fluid">
    <div class="container-sm row">
        <div class="col col-6  align-self-center ">
            <label for="exampleDataList" class="form-label"></label>
            <input name="name" wire:model="search" type="text" class="form-control" list="datalistOptions"
                   id="exampleDataList" placeholder="Type to search...">
        </div>
        <div class="col col-4 align-self-end container-sm row">
            <select class=" col form-select" aria-label="Default select example"
                    wire:model="per_page">
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="30">30</option>
            </select>
            <p class="col align-self-end">Entries</p>
        </div>
        <div x-data="{ open: false }" class="col align-self-end">
            <button x-on:click="open = ! open" class="btn btn-primary btn-lg" data-toggle="collapse"
                    type="button">Filter
            </button>
            <div x-cloak x-show="open" wire:ignore class="container-sm">
                <h3>Show/Hide columns:</h3>
                <div class="container-fluid d-flex justify-content-center align-self-end ">
                    @foreach($columns as $column)

                        <div class="container-sm align-self-end">
                            <input id="{{$column}}" type="checkbox" wire:model="selectedColumns"
                                   value="{{$column}}">
                            <label for="{{$column}}">{{$column}}</label>
                        </div>
                    @endforeach
                </div>
                <div class="container-sm row align-self-end" wire:ignore>
                    <h3>Date range:</h3>
                    <div class="container-sm col col-2">
                        <h4>From:</h4>
                        <div class="form">
                            <input wire:model="from" type="date" class="form-control" data-provide="datepicker"
                                   placeholder=
                                   "enter date : using attribute" style="width:150px;"
                                   data-date-format="dd/mm/yyyy">
                        </div>
                    </div>
                    <div class="container-sm col col-2">
                        <h4>To:</h4>
                        <div class="form">
                            <input wire:model="to" type="date" class="form-control" data-provide="datepicker"
                                   placeholder=
                                   "enter date : using attribute" style="width:150px;"
                                   data-date-format="dd/mm/yyyy">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>