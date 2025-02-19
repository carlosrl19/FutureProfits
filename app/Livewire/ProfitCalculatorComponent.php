<?php

namespace App\Livewire;

use Livewire\Component;

class ProfitCalculatorComponent extends Component
{
    public $investment_amount;
    public $investment_profit_perc;
    public $investment_total_days = 31; // Se pasa 31 días por default
    public $investment_total_profits;
    public $investment_total_profit_per_day;

    // Método para calcular las ganancias
    public function calculateProfits()
    {
        if ($this->investment_amount && $this->investment_profit_perc) {
            // Cálculo de la ganancia total
            $totalProfit = ($this->investment_amount * $this->investment_profit_perc) / 100;
            $this->investment_total_profits = number_format($totalProfit, 2) . ' HNL';

            // Cálculo de la ganancia diaria
            if ($this->investment_total_days > 0) {
                $dailyProfit = $totalProfit / $this->investment_total_days;
                $this->investment_total_profit_per_day = number_format($dailyProfit, 2) . ' HNL';
            }
        }
    }

    // Método para limpiar los campos
    public function resetFields()
    {
        $this->reset([
            'investment_amount',
            'investment_profit_perc',
            'investment_total_days',
            'investment_total_profits',
            'investment_total_profit_per_day',
        ]);
    }

    public function render()
    {
        return view('livewire.profit-calculator-component');
    }
}
