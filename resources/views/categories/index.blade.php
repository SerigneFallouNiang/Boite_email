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
    <title>Gestion de livres</title>
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            {{-- <a class="navbar-brand" href="{{route('livres.index')}}">Gestion de livres</a> --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        {{-- <a class="nav-link active" aria-current="page" href="{{route('categories.index')}}">Categories</a> --}}
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="{{route('rayons.index')}}">Rayons</a> --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="ml-auto">
                {{-- <form action="{{route('deconnexion')}}" method="post">
                    @csrf
                    @method('DELETE')
                    {{-- <button class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Déconnexion</button> --}}
                </form> --}}
            </div>
        </div>
    </nav>
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
</body>
</html>
