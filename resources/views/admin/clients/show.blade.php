@extends('layout')

@section('body')
    <div class="content">
        <div class="row px-5 py-3 m-0 border-bottom box-dashboard align-items-center">
        <h3 class="m-0 font-weight-bold">Visualizar cliente</h3>
        </div>
        <div class="row px-5 mt-5 mx-0">
            <form method="POST" id="form-delete" action="{{ route('clients.destroy', ['clients' => $client->id]) }}" style="display: none;">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
            <a href="{{ route('clients.destroy', ['client' => $client->id]) }}" class="box-btn-tash mb-5 p-3 shadow-sm rounded" onclick="event.preventDefault();if(confirm('Deseja mesmo deletar este cliente ?')){document.getElementById('form-delete').submit();};">
                <div class="media align-items-center">
                    <i class="fas fa-trash-alt fa-2x"></i>
                    <div class="media-body ml-3">
                        <p class="font-weight-bold p-0 m-0">Excluir cliente</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('clients.edit', ['client' => $client->id]) }}" class="box-btn-edit mb-5 ml-3 p-3 shadow-sm rounded">
                <div class="media align-items-center">
                    <i class="fas fa-user-cog fa-2x"></i>
                    <div class="media-body ml-3">
                        <p class="font-weight-bold p-0 m-0">Editar cliente</p>
                    </div>
                </div>
            </a>
            <table class="table table-striped shadow-sm rounded">
                <tr>
                    <th scope="col">Nome</th>
                    <td scope="col">{{ $client->name }}</td>
                </tr>
                <tr>
                    <th scope="col">Email</th>
                    <td scope="col">{{ $client->email }}</td>
                </tr>
                <tr>
                    <th scope="col">Documento</th>
                    <td scope="col">{{ $client->document_number }}</td>
                </tr>
                <tr>
                    <th scope="col">Telefone</th>
                    <td scope="col">{{ $client->phone }}</td>
                </tr>
                <tr>
                    <th scope="col">Sexo</th>
                    <td scope="col">{{ $client->sex == 'F' ? 'Feminino' : 'Masculino' }}</td>
                </tr>
                <tr>
                    <th scope="col">Estado Civil</th>
                    <td scope="col">
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
                            @default
                        @endswitch
                    </td>
                </tr>
                <tr>
                    <th scope="col">Inadimplente</th>
                    <td scope="col">{{ $client->defaulter == 1 ? 'Sim' : 'Não' }}</td>
                </tr>
                @php
                    $disability = $client->physical_disability
                @endphp
                <tr>
                    <th scope="col">Deficiência Física</th>
                    <td scope="col">{{ $disability == null ? 'Não possui nenhuma deficiência' : $disability  }}</td>
                </tr>
            </table>
            </div>
    <div>
@endsection