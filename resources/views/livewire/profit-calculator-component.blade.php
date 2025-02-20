<div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="form-floating">
                <input type="text" wire:model.defer="formatted_investment_amount" class="formatted_investment_amount form-control @error('investment_amount') is-invalid @enderror" oninput="formatInput(this)">
                <label for="investment_amount">
                    <x-heroicon-o-banknotes style="width: 20px; height: 20px;" />&nbsp;&nbsp;Monto inversión <span class="text-danger">*</span>
                </label>
            </div>
        </div>
    </div>

    <!-- Comisión inversionista -->
    <div class="row d-none d-lg-block d-md-block mt-3">
        <div class="col-sm-12">
            <div class="form-floating">
                <input type="text" disabled wire:model.defer="investor_profit"
                    class="fw-bold form-control @error('investor_profit') is-invalid @enderror">
                <label for="investor_profit">
                    <x-heroicon-o-user style="width: 20px; height: 20px;" />&nbsp;&nbsp;Comisión inversor
                </label>
            </div>
        </div>
    </div>

    <!-- Este div se mostrará solo en pantallas sm -->
    <div class="row d-sm-block d-lg-none" style="margin-top: 2%">
        <div class="col-sm-12">
            <div class="form-floating">
                <input type="text" disabled wire:model.defer="investor_profit"
                    class="fw-bold form-control @error('investor_profit') is-invalid @enderror">
                <label for="investor_profit">
                    <x-heroicon-o-user style="width: 20px; height: 20px;" />&nbsp;&nbsp;Comisión inversor
                </label>
            </div>
        </div>
    </div>

    <!-- Dias de trabajo -->
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

    <!-- Porcentaje Ganancia -->
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

    <!-- Comisión terceros -->
    <div class="row d-none d-lg-block d-md-block mt-4">
        <div class="col-sm-12">
            <div class="form-floating">
                <input type="text" disabled wire:model.defer="investor_third_profit"
                    class="investor_third_profit fw-bold form-control @error('investor_third_profit') is-invalid @enderror">
                <label for="investor_third_profit">
                    <x-heroicon-o-chart-pie style="width: 20px; height: 20px;" />&nbsp;&nbsp;Comisión terceros (2.5%)
                </label>
            </div>
        </div>
    </div>

    <!-- Checkbox para la comisión de terceros -->
    <div class="row mt-2">
        <div class="col-sm-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" wire:model="apply_third_party_commission" id="applyThirdPartyCommission">
                <label class="form-check-label" for="applyThirdPartyCommission">
                    Aplicar comisión a terceros (2.5%)
                </label>
            </div>
        </div>
    </div>

    <!-- Este div se mostrará solo en pantallas sm -->
    <div class="row d-sm-block d-lg-none" style="margin-top: 5%">
        <div class="col-sm-12">
            <div class="form-floating">
                <input type="text" disabled wire:model.defer="investor_third_profit"
                    class="fw-bold form-control @error('investor_third_profit') is-invalid @enderror">
                <label for="investor_third_profit">
                    <x-heroicon-o-chart-pie style="width: 20px; height: 20px;" />&nbsp;&nbsp;Comisión terceros (2.5%)
                </label>
            </div>
        </div>
    </div>

    <!-- Ganancia FCE -->
    <div class="row d-none d-lg-block d-md-block mt-4">
        <div class="col-sm-12">
            <div class="form-floating">
                <input type="text" disabled wire:model.defer="fce_total" readonly class="fw-bold form-control @error('investment_total_profit_per_day') is-invalid @enderror">
                <label for="fce_total">
                    <x-heroicon-o-circle-stack style="width: 20px; height: 20px;" />&nbsp;&nbsp;FCE (5%)
                </label>
            </div>
        </div>
    </div>

    <!-- Este div se mostrará solo en pantallas sm -->
    <div class="row d-sm-block d-lg-none" style="margin-top: 9%">
        <div class="col-sm-12">
            <div class="form-floating">
                <input type="text" disabled wire:model.defer="fce_total" readonly class="fw-bold form-control @error('investment_total_profit_per_day') is-invalid @enderror">
                <label for="fce_total">
                    <x-heroicon-o-circle-stack style="width: 20px; height: 20px;" />&nbsp;&nbsp;FCE (5%)
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

    <script>
        function formatInput(input) {
            let value = input.value.replace(/[^0-9.]/g, ''); // Elimina caracteres no numéricos
            if (value) {
                let parts = value.split('.');
                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ','); // Agrega separadores de miles

                // Si hay partes decimales, asegúrate de que sólo se mantengan dos decimales
                if (parts[1]) {
                    parts[1] = parts[1].substring(0, 2); // Limitar a dos decimales
                }
                input.value = parts.join('.');
            } else {
                input.value = '';
            }
        }
    </script>

</div>