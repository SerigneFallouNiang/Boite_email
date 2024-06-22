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
    </style>
</head>
<body>
   
    <div class="container mt-5">
      <div class="d-flex justify-content-between align-items-center mb-4">

        <div class="btn-group" role="group" aria-label="Filtres de catégories">
            <a href="{{ route('idees.index') }}" class="btn btn-primary {{ !isset($categorieActuelle) ? 'active' : '' }}">Toutes les catégories</a>
            @foreach($categories as $categorie)
                <a href="{{ route('idees.categorie', $categorie->id) }}" class="btn btn-outline-primary">{{ $categorie->libelle }}</a> 
                {{ isset($categorieActuelle) && $categorieActuelle->id == $categorie->id ? 'active' : '' }}
            @endforeach
        </div>

        <h2>Liste des idees</h2>
        <a href="{{route('idees.create')}}" class="btn btn-primary">Ajouter une Idée</a>
    </div>
        <table class="table table-hover table-bordered border-primary">
            <thead class="table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Libelle</th>
                    <th scope="col">Description</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($idees as $idee)
                <tr>
                    <th scope="row">{{$idee->id}}</th>
                    <td>{{$idee->libelle}}</td>
                    <td>{{$idee->description}}</td>
                    <td>{{$idee->nom}}</td>
                    <td>{{$idee->created_at}}</td>
                    <td>{{$idee->status}}</td>
                    <td>
                        <a href="{{ route('idees.edit', $idee->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('idees.destroy', $idee->id) }}" method="POST" class="d-inline"
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFuCJvR5YkITJ4Mkh3w5Yb7VZ04f/7GFsiCZuyWb51Y5f6MeVVVtKRxP0" crossorigin="anonymous"></script>
</body>
</html>
