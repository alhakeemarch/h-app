<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use App\Http\Controllers\ContractController;


class ShowProjectContracts extends Component
{
    public $project;
    public $project_contracts;
    public $total_price;
    public $total_vat;
    public $total_price_with_vat;
    public $total_1st_payment;


    public function mount($project)
    {
        $this->project_contracts = ContractController::get_project_contracts($project);
        $this->total_price = 0;
        $this->total_vat = 0;
        $this->total_price_with_vat = 0;
        $this->total_1st_payment = 0;
        $this->calc_total();
    }




    public function render()
    {
        return view('livewire.project.show-project-contracts');
    }
    public function submit()
    {
        dd('1');
    }
    public function add_remove_from_qutation()
    {
        dd('2');
    }

    public function calc_total()
    {
        foreach ($this->project_contracts as $contract) {
            $this->total_price = $this->total_price + $contract->cost;
            $this->total_vat = $this->total_vat + $contract->vat_value;
            $this->total_price_with_vat = $this->total_price_with_vat + $contract->price_withe_vat;
            if ($contract->contract_type_id == '1') {
                $this->total_1st_payment = $this->total_1st_payment + ($contract->cost * 0.5) + $contract->vat_value;
            } else {
                $this->total_1st_payment = $this->total_1st_payment + $contract->price_withe_vat;
            }
        }
    }
}
