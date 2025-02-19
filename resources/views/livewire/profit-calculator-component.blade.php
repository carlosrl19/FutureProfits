<div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="form-floating">
                <input type="number" wire:model="investment_amount" class="form-control @error('investment_amount') is-invalid @enderror" step="0.01" min="0">
                <label for="investment_amount">
                    <x-heroicon-o-banknotes style="width: 20px; height: 20px;" />&nbsp;&nbsp;Monto inversión <span class="text-danger">*</span>
                </label>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-sm-12">
            <div class="form-floating">
                <input type="number" wire:model="investment_profit_perc" class="form-control @error('investment_profit_perc') is-invalid @enderror" step="1" min="1" max="100">
                <label for="investment_profit_perc">
                    <x-heroicon-o-percent-badge style="width: 20px; height: 20px;" />&nbsp;&nbsp;Ganancia (%) <span class="text-danger">*</span>
                </label>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-sm-12">
            <div class="form-floating">
                <input type="number" wire:model="investment_total_days" min="1" value="31" class="form-control @error('investment_total_days') is-invalid @enderror">
                <label for="investment_total_days">
                    <x-heroicon-o-calendar-days style="width: 20px; height: 20px;" />&nbsp;&nbsp;Días <span class="text-danger">*</span>
                </label>
            </div>
        </div>
    </div>

    <!-- Ganancia total -->
    <div class="row mt-2">
        <div class="col-sm-12">
            <div class="form-floating">
                <input type="text" disabled wire:model.defer="investment_total_profits" readonly class="fw-bold form-control @error('investment_total_profits') is-invalid @enderror">
                <label for="investment_total_profits">
                    <x-heroicon-o-presentation-chart-line style="width: 20px; height: 20px;" />&nbsp;&nbsp;Ganancia total
                </label>
            </div>
        </div>
    </div>

    <!-- Ganancia diaria -->
    <div class="row mt-2">
        <div class="col-sm-12">
            <div class="form-floating">
                <input type="text" disabled wire:model.defer="investment_total_profit_per_day" readonly class="fw-bold form-control @error('investment_total_profit_per_day') is-invalid @enderror">
                <label for="investment_total_profit_per_day">
                    <x-heroicon-o-presentation-chart-line style="width: 20px; height: 20px;" />&nbsp;&nbsp;Ganancia diaria
                </label>
            </div>
        </div>
    </div>

    <!-- Botones -->
    <div class="row mt-4">
        <!-- Botón Calcular -->
        <div class="col-xs-6 col-sm-6 mb-3">
            <button type="button" wire:click.prevent="calculateProfits" class="btn btn-sm w-100 bg-success text-white">
                <span>
                    <x-heroicon-o-equals style="width: 20px; height: 20px;" class="text-white" />
                </span>
                Calcular
            </button>
        </div>

        <!-- Botón Limpiar -->
        <div class="col-xs-6 col-sm-6">
            <button type="button" wire:click.prevent="resetFields" class="btn btn-sm btn-danger w-100">
                <span>
                    <x-heroicon-o-backspace style="width: 20px; height: 20px;" class="text-white" />
                </span>
                Limpiar
            </button>
        </div>
    </div>
</div>