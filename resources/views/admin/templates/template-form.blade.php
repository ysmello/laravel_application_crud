{{ csrf_field() }}

    <input type="hidden" name="client_type" value="{{ $clientType }}">
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $client->name) }}">
    </div>
    <div class="form-group">
        <label for="document_number">CPF/CNPJ</label>
        <input type="text" id="document_number" name="document_number" class="form-control" value="{{ old('document_number', $client->document_number) }}">
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" id="email" name="email" class="form-control" value="{{ old('email', $client->email) }}">
    </div>
    <div class="form-group">
        <label for="phone">Telefone</label>
        <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $client->phone) }}">
    </div>
    <div class="form-group">
        <label for="date_birth">Data de nascimento</label>
        <input type="date" name="date_birth" id="date_birth" class="form-control" value="{{ old('date_birth', $client->date_birth) }}">
    </div>
    @if ($clientType == \App\Client::TYPE_INDIVIDUAL)
        
    <span>Sexo</span>
    @php
        $sex = old('sex', $client->sex);
        @endphp
    <div class="form-group">
        <label>
            <input type="radio" name="sex" value="F" {{ $sex == 'F' ? 'checked="checked"' : '' }}> Feminino
        </label>
    </div>
    <div class="form-group">
        <label>
            <input type="radio" name="sex" value="M" {{ $sex == 'M' ? 'checked="checked"' : '' }}> Masculino
        </label>
    </div>
    @php
        $maritalStatus = old('marital_status', $client->marital_status);
        @endphp
    <div class="form-group">
        <label for="marital_status">Estado Civil</label>
        <select name="marital_status" id="marital_status" class="form-control" value="{{ $maritalStatus }}">
                <option value="">-- Selecione alguma opção --</option>
                <option value="1" {{ $maritalStatus == 1 ? 'selected="selected"' : '' }}>Solteiro</option>
                <option value="2" {{ $maritalStatus == 2 ? 'selected="selected"' : '' }}>Casado</option>
                <option value="3" {{ $maritalStatus == 3 ? 'selected="selected"' : '' }}>Divorciado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="physical_disability">Possui alguma deficiência ?</label>
            <input type="text" name="physical_disability" id="physical_disability" class="form-control" {{ old('physical_disability', $client->physical_disability) }}>
        </div>
    @endif
    <div class="form-group">
        <label for="company_name">Nome da Empresa</label>
        <input type="text" name="company_name" id="company_name" class="form-control" {{ old('company_name', $client->company_name) }}>
    </div>
    <div class="form-group">
        <label>
            <input type="checkbox" name="defaulter" value="1" {{ old('defaulter', $client->defaulter) == 1 ? 'checked="checked"' : '' }}> Inadimplente ?
        </label>
    </div>