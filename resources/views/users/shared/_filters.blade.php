<div class="container-fluid">
    <div class="container-sm row">
        <div class="col container row">
            <select class="col col-2 align-self-center form-select" aria-label="Default select example"
                    wire:model="per_page">
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="30">30</option>
            </select>
            <p class="col align-self-center">Entries</p>
        </div>
        <div class=" col">
            <label for="exampleDataList" class="form-label"></label>
            <input name="name" wire:model="search" type="text" class="form-control" list="datalistOptions"
                   id="exampleDataList" placeholder="Type to search...">
        </div>
    </div>
    <div>
        <button href="#Filter" class="btn btn-primary" data-toggle="collapse" type="button">Filter</button>
    </div>
    <div class="container-sm">
        <div id="Filter" wire:ignore class="collapse">
            <div class="container-sm">
                <h4>Show/Hide:</h4>
                @foreach($columns as $column)
                    <input type="checkbox" wire:model="selectedColumns" value="{{$column}}">
                    <label>{{$column}}</label>
                @endforeach
            </div>
            <div wire:ignore>
                <div class="container-sm">
                    <h4>From</h4>
                    <div class="form">
                        <input wire:model="from" type="text" class="form-control" data-provide="datepicker" placeholder=
                        "enter
                  date :
                  using attribute" style="width:100px;" data-date-format="dd/mm/yyyy">
                    </div>
                </div>

                <div class="container-sm">
                    <h4>To</h4>
                    <div class="form">
                        <input wire:model="to" type="text" class="form-control" data-provide="datepicker" placeholder=
                        "enter
                date :
                  using attribute" style="width:100px;" data-date-format="dd/mm/yyyy">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>