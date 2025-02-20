<?php

namespace App\Livewire;

use Livewire\Component;

class ProfitCalculatorComponent extends Component
{
    public $investment_amount;
    public $investment_profit_perc;
    public $investment_total_days = 31;
    public $investment_total_profits;
    public $investment_total_profit_per_day;
    public $investor_profit;
    public $investor_third_profit = "0.00 HNL";
    public $fce_total;

    public $formatted_investment_amount;
    public $apply_third_party_commission = false; // Nueva propiedad para el checkbox

    // Método que se ejecuta cuando cambia el valor formateado
    public function updatedFormattedInvestmentAmount($value)
    {
        // Elimina los separadores de miles y actualiza el valor sin formato
        $this->investment_amount = floatval(str_replace([','], '', $value)); // Convierte a float para mantener los decimales
        $this->formatted_investment_amount = number_format($this->investment_amount, 2, '.', ','); // Formato con separadores
    }

    public function calculateProfits()
    {
        if ($this->investment_amount && $this->investment_profit_perc) {
            // Cálculo de la ganancia total
            $totalProfit = ($this->investment_amount * $this->investment_profit_perc) / 100;

            // Cálculo de la comisión del inversor
            $fceTotal = number_format($totalProfit * 0.05, 2); // Cálculo de la comisión FCE
            $this->fce_total = $fceTotal; // Asignar el valor a la propiedad

            // Ganancia del inversor después de la comisión FCE
            $investorProfit = $totalProfit - ($totalProfit * 0.05); // Restar el 5% del total
            $this->investor_profit = number_format($investorProfit, 2) . ' HNL';

            // Si el checkbox está marcado, restar el 2.5% al inversor
            if ($this->apply_third_party_commission) {
                $thirdPartyCommission = $investorProfit * 0.025; // Calcular el 2.5% sobre la ganancia del inversor
                $this->investor_third_profit = number_format($thirdPartyCommission, 2) . ' HNL';
                $this->investor_profit = number_format($investorProfit - $thirdPartyCommission, 2) . ' HNL'; // Actualizar la ganancia del inversor
            } else {
                $this->investor_third_profit = "0.00 HNL"; // Si no se aplica la comisión
            }
        }
    }

    public function resetFields()
    {
        $this->reset([
            'formatted_investment_amount',
            'investment_profit_perc',
            'investment_total_days',
            'investor_profit',
            'fce_total',
            'apply_third_party_commission', // Resetear el valor del checkbox
            'investor_third_profit'
        ]);
        $this->investor_third_profit = "0.00 HNL";
    }

    public function render()
    {
        return view('livewire.profit-calculator-component');
    }
}
