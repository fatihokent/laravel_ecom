@extends('layouts.app')
@section('title', 'Liste clients')
@section('content')
    <h3>Liste des clients</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Tel</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>

            </tr>
            
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <th scope="row">{{$client['id']}}</th>
                    <td>{{$client['nom']}}</td>
                    <td>{{$client['prenom']}}</td>
                    <td>{{$client['tel']}}</td>
                    <td>{{$client['email']}}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('clients.show', $client->id) }}"><i class="bi bi-search"></i></a>
                        <a class="btn btn-warning" href="{{route('clients.edit', $client->id)}}"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')"><i class="bi bi-trash"></i></button>
                        </form>

                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
    <a href="{{route('clients.create')}}" class="btn btn-info">Nouveau client</a>
@endsection