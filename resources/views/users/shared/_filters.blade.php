<div class="d-grid gap-2 d-md-flex justify-content-md-end col">
    <div class="col">
        <button href="#Filter" class="btn btn-primary" data-toggle="collapse" type="button">Filter</button>
    </div>
    <div class="col">
        <button href="#Sort" class="btn btn-default" data-toggle="collapse">Order</button>
    </div>
    <div class="col">
        <select class=" col form-select" aria-label="Default select example" wire:model="per_page">
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="30">30</option>
        </select>
    </div>
</div>

<div class="container-sm d-grid gap-2 d-md-flex col">
    <div id="Filter" wire:ignore class="collapse">
        <div class="container-sm d-grid gap-2 d-md-flex row">
            <h4>Show/Hide:</h4>
            @foreach($columns as $column)
                <input type="checkbox" wire:model="selectedColumns" value="{{$column}}">
                <label>{{$column}}</label>
            @endforeach
        </div>
        <div wire:ignore>
            <div class="container-sm d-grid gap-2 d-md-flex col">
                <h4>From</h4>
                <div class="form">
                    <input wire:model="from" type="text" class="form-control" data-provide="datepicker" placeholder=
                    "enter
                  date :
                  using attribute" style="width:100px;" data-date-format="dd/mm/yyyy">
                </div>
            </div>

            <div class="container-sm d-grid gap-2 d-md-flex col">
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
    <div id="Sort" wire:ignore class="collapse">
        <button wire:click="sort('users.id')">Order by id</button>
        <button wire:click="sort('users.name')">Order by name</button>
        <button wire:click="sort('users.surname')">Order by surname</button>
        <button wire:click="sort('users.email')">Order by email</button>
    </div>
</div>
<div class="container-sm">
    <label for="exampleDataList" class="form-label"></label>
    <input name="name" wire:model="search" type="text" class="form-control" list="datalistOptions"
           id="exampleDataList" placeholder="Type to search...">

</div>