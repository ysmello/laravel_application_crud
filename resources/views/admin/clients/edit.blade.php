@extends('layout')

@section('body')
    <div class="content">
        <div class="row px-5 py-3 m-0 border-bottom box-dashboard align-items-center">
        <h3 class="m-0 font-weight-bold">Atualizar cliente</h3>
        </div>
        @include('admin.templates.template-error')
        <form action="{{ route('clients.update', ['client' => $client->id]) }}" method="post">
            <div class="column m-5 p-3 box-dashboard shadow-sm rounded">
                {{ method_field('PUT') }}
                @include('admin.templates.template-form')
                <input type="submit" value="Cadastrar" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection