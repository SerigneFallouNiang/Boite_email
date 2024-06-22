<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Gestion de livres</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Mis à jour du categorie</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <input type="text" name="id" style="display: none;"  value="{{$categories->id}}">

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Libelle</label>
                                <input type="text" class="form-control" id="libelle"  name="libelle"  value="{{$categories->libelle}}">

                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" >{{$categories->description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">mettre à jour  le categorie</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFuCJvR5YkITJ4Mkh3w5Yb7VZ04f/7GFsiCZuyWb51Y5f6MeVVVtKRxP0" crossorigin="anonymous"></script>
</body>
</html>
