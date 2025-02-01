@extends('layouts.app')
@section('title', 'Liste produits')
@section('content')
    <div class="my-3 d-flex justify-content-between">
        <span class="h3">Liste des produits</span>
        <input type="text" id="search" class="form-control w-25" placeholder="Rechercher un produit" oninput="searchProducts()">
        {{-- The oninput event occurs when the value of an <input> or <textarea> or <select> element is changed. --}}
    </div>

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Quantité Stock</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody id="products">
            @foreach ($produits as $produit)
                <tr>
                    <th scope="row">{{$produit['id']}}</th>
                    <td>{{$produit['nom']}}</td>
                    <td>{{$produit['prix']}}</td>
                    <td>{{$produit['qteStock']}}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('produits.show', $produit->id) }}"><i class="bi bi-search"></i></a>
                        <a class="btn btn-warning" href="{{ route('produits.edit', $produit->id) }}"><i class="bi bi-pencil-square"></i></a>

                        <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')"><i class="bi bi-trash"></i></button>
                        </form>

                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
    <a href="{{route('produits.create')}}" class="btn btn-info">Nouveau produit</a>

    <script>
        function searchProducts(){
            const query = document.getElementById('search').value;

            fetch(`/search/produits?query=${query}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    const tableBody = document.getElementById('products');
                    tableBody.innerHTML = ''; 

                    data.forEach(produit => {
                        tableBody.innerHTML += `
                            <tr>
                                <th scope="row">${produit.id}</th>
                                <td>${produit.nom}</td>
                                <td>${produit.prix}</td>
                                <td>${produit.qteStock}</td>
                                <td>
                                    <a class="btn btn-success" href="/produits/${produit.id}"><i class="bi bi-search"></i></a>
                                    <a class="btn btn-warning" href="/produits/${produit.id}/edit"><i class="bi bi-pencil-square"></i></a>
                                    <form action="/produits/${produit.id}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        `;
                    });
                })

                .catch(error => {
                    console.error('Erreur lors de la recherche des produits :', error);
                });

        }
    </script>
@endsection