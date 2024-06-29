<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHq6TcjK4KfG4pM0iD0f4b8o3hY2lb1nqzj7fPvGZgtp9p9LdcoyJ6qILVEX4yIUsyT4Z4Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gestion des idees</title>
    <style>
        .hero {
            background-image: url('https://img.freepik.com/photos-gratuite/librairie-moderne-presentant-rangees-livres-vibrants_60438-3565.jpg?t=st=1717754917~exp=1717758517~hmac=08ee922b1a55c1879816092cd500579d8d974b5e6d6968364bf866c60c8e5ff0&w=826');
            background-size: cover;
            background-position: center;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .scrollspy-example{
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('idees.index')}}">Gestion des Idées</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('categories.index')}}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="ml-auto">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>
                </form>
            </div>
        </div>
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
  </body>
</html>
