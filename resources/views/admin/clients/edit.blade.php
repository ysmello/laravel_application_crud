@extends('layout')

@section('body')
    <div class="content">
        <div class="row px-5 py-3 m-0 border-bottom box-dashboard align-items-center">
        <h3 class="m-0 font-weight-bold">Atualizar cliente</h3>
        </div>
        @include('admin.templates.template-error')
        {{ Form::model($client, ['route' => 'clients.update', $client->$id], 'method' => 'PUT') }}
            <div class="column m-5 p-3 box-dashboard shadow-sm rounded">
                @include('admin.templates.template-form')
                <input type="submit" value="Cadastrar" class="btn btn-primary">
            </div>
        {{ Form::close() }}
    </div>
@endsection