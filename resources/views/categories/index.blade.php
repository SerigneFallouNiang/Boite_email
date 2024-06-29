@extends('layouts.app')

@section('content')
    <div class="container mt-5">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Liste des Categories</h2>
        <a href="{{route('categories.create')}}" class="btn btn-primary">Ajouter une categories</a>
    </div>
        <table class="table table-hover table-bordered border-primary">
            <thead class="table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Libelle</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $categorie)
                <tr>
                    <th scope="row">{{$categorie->id}}</th>
                    <td>{{$categorie->libelle}}</td>
                    <td>{{$categorie->description}}</td>
                    <td>
                        <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFuCJvR5YkITJ4Mkh3w5Yb7VZ04f/7GFsiCZuyWb51Y5f6MeVVVtKRxP0" crossorigin="anonymous"></script>
    @endsection

