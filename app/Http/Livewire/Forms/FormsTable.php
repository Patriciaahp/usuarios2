<?php

namespace App\Http\Livewire\Forms;

use App\Panel\Forms\Forms\Filters\FormFilter;
use Domain\Forms\Models\Form;
use Livewire\Component;
use Livewire\WithPagination;

class FormsTable extends Component
{
    use WithPagination;

    public $per_page = 10;
    public $search;


    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }


    public function render(FormFilter $formFilter)
    {

        return view('forms.livewire.forms-table')
            ->with(['forms' => $this->getForms($formFilter)]);
    }

    protected function getForms(FormFilter $formFilter)
    {
        $forms = Form::query()->filterBy($formFilter, array_merge([
            'search' => $this->search,
        ]))
            ->paginate($this->per_page);
        $forms->appends($formFilter->valid());

        return $forms;
    }
}
