@extends('layouts.app')

@section('content')
    </nav>
    <div class="container mt-5">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="btn-group" role="group" aria-label="Filtres de catégories">
            <a href="{{ route('idees.index') }}" class="btn btn-primary {{ !isset($categorieActuelle) ? 'active' : '' }}">Toutes les catégories</a>
            @foreach($categories as $categorie)
                <a href="{{ route('idees.categorie', $categorie->id) }}" class="btn btn-outline-primary">{{ $categorie->libelle }}</a> 
                {{ isset($categorieActuelle) && $categorieActuelle->id == $categorie->id ? 'active' : '' }}
            @endforeach
        </div>
    </div>
       






<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <style>
        .scrollspy-example{
            margin-bottom: 30px;
        }
    </style>
    <h1>Bonjour, bienvenu sur la boite à idée</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="container mt-5">
    <div class="row">
        <nav id="navbar-example2" class="navbar bg-body-tertiary px-3 mb-3">
            <a class="navbar-brand" href="#">Liste des idees</a>
            <a href="{{route('idees.create')}}" class="btn btn-primary">Ajouter une Idée</a>

          </nav>
          @foreach($idees as $idee)
          <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0" class="list-idee">
            <h4 id="scrollspyHeading3">{{$idee->libelle}}</h4>
            <p>{{ Str::limit($idee->description , 200);}} </p>
            <div class="btn-group">
                <a href="{{ route('idees.show', $idee->id) }}" class="btn btn-primary active" aria-current="page">Detail</a>
                <a href="{{ route('idees.edit', $idee->id) }}" class="btn btn-primary">Modifier</a>
                <form action="{{ route('idees.destroy', $idee->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
              </div>
          </div>
          @endforeach
    </div>
    <script>
        const filterButtons = document.querySelectorAll('.btn-group button');
        const bookCards = document.querySelectorAll('.book-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const filter = button.dataset.filter;
                filterBooks(filter);
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
            });
        });

        function filterBooks(category) {
            bookCards.forEach(card => {
                const bookCategory = card.dataset.category;
                if (category === 'all' || bookCategory === category) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
@endsection
