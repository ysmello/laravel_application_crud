@extends('layout')

@section('body')
    <div class="content">
        <div class="row px-5 py-3 m-0 border-bottom box-dashboard align-items-center">
        <h3 class="m-0 font-weight-bold">Cadastrar cliente</h3>
        </div>
        @include('admin.templates.template-error')
        <div class="mx-5 mt-5">
            <a href="{{ route('clients.create', ['client_type' => \App\Client::TYPE_INDIVIDUAL]) }}" class="btn btn-secondary">Pessoa fisica</a>
            <a href="{{ route('clients.create', ['client_type' => \App\Client::TYPE_LEGAL]) }}" class="btn btn-secondary">Pessoa juridica</a>
        </div>
        <form method="POST" action="{{ route('clients.store') }}">
            <div class="column m-5 p-3 box-dashboard shadow-sm rounded">
                @include('admin.templates.template-form')
                <input type="submit" value="Cadastrar" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection