{{ csrf_field() }}

<input type="hidden" name="client_type" value="{{ $clientType }}">
<div class="form-group">
    {{ Form::label('name', 'Nome') }}
    {{ Form::text('name', old('name', $client->name), ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('document_number', 'CPF/CNPJ') }}
    {{ Form::text('document_number', old('document_number', $client->document_number), ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('email', 'E-mail') }}
    {{ Form::email('email', old('email', $client->email), ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('phone', 'E-mail') }}
    {{ Form::text('phone', old('phone', $client->phone), ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('date_birth', 'E-mail') }}
    {{ Form::date('date_birth', old('date_birth', $client->date_birth), ['class' => 'form-control']) }}
</div>
@if ($clientType == \App\Client::TYPE_INDIVIDUAL)
    
<span>Sexo</span>
@php
    $sex = $client->sex;
@endphp
<div class="form-group">
    <label>
        {{ Form::radio('sex', 'M', old('sex', $sex) == 'F') }} Feminino
    </label>
</div>
<div class="form-group">
    <label>
        {{ Form::radio('sex', 'F', old('sex', $sex) == 'M') }} Masculino
    </label>
</div>
@php
    $maritalStatus = old('marital_status', $client->marital_status);
@endphp
<div class="form-group">
    {{ Form::label('marital_status', 'Estado Civil') }}
    {{ Form::select('marital_status', [
        '' => '-- Selecione o estado civil --',
        1 => 'Solteiro',
        2 => 'Casado',
        3 => 'Divorciado',
    ], old('marital_status', $maritalStatus), ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('physical_disability', 'Deficiência Física') }}
    {{ Form::text('physical_disability', old('physical_disability', $client->physical_disability), ['class' => 'form-control']) }}
</div>
@endif
@if ($clientType == \App\Client::TYPE_LEGAL)
    <div class="form-group">
        {{ Form::label('company_name', 'Nome da Empresa') }}
        {{ Form::text('company_name', old('company_name', $client->company_name), ['class' => 'form-control']) }}
    </div>
@endif
<div class="form-group">
    <label>
        {{ Form::checkbox('defaulter', 1, old('defaulter', $client->defaulter)) }} Inadimplente ?
    </label>
</div>