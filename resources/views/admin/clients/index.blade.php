@extends('layout')

@section('body')
    <div class="content">
        <div class="row px-5 py-3 m-0 border-bottom title-dashboard align-items-center">
          <h3 class="m-0 font-weight-bold">Clientes</h3>
        </div>
        @if (Session::has('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            {{ Session::get('message') }}
          </div>
        @endif
        <div class="row px-5 mt-5 mx-0">
          <a href="{{ route('clients.create') }}" class="box-btn mb-5 p-3 shadow-sm rounded">
            <div class="media align-items-center">
                <i class="fas fa-user-plus fa-2x icon-create"></i>
                <div class="media-body ml-3">
                    <p class="font-weight-bold p-0 m-0">Cadastrar</p>
                </div>
            </div>
          </a>
          <table class="table shadow-sm rounded">
            <thead class="thead">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">CPF/CNPJ</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Sexo</th>
                <th scope="col">Estado Civil</th>
                <th scope="col" style="text-align: center;">Ações</th>
              </tr>
            </thead>
            <tbody class="tbody">
              @foreach($clients as $client)
                <tr>
                  <th scope="row">{{ $client->id }}</th>
                  <td>{{ $client->name }}</td>
                  <td>{{ $client->document_number }}</td>
                  <td>{{ $client->email }}</td>
                  <td>{{ $client->phone }}</td>
                  <td>{{ $client->sex == 'F' ? 'Femino' : 'Masculino' }}</td>
                  <td>
                    @switch($client->marital_status)
                      @case(1)
                        Solteiro
                        @break
                      @case(2)
                        Casado
                        @break
                      @case(3)
                        Divorciado
                        @break
                    @endswitch
                  </td>
                  <td>
                    <a href="{{ route('clients.show', ['client' => $client->id]) }}">Visualizar |</a>
                    <a href="{{ route('clients.edit', ['client' => $client->id]) }}">Editar</a>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
@endsection