<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card-header {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .form-label {
            font-weight: 500;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Ajouter une nouvelle Idée</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('idees.store')}}" class="row g-3">
                            @csrf
                            <div class="col-md-12">
                                <label for="bookTitle"   class="form-label">Auteur de l'idée<span class="text-danger">*</span></label>
                                <input type="text" class="form-control  @error('nom') is-invalid @enderror" id="bookTitle" name="nom" required>
                                @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                           
                            <div class="col-md-12">
                                <label for="bookTitle" class="form-label">Email de l'auteur<span class="text-danger">*</span></label>
                                <input type="email" class="form-control  @error('email') is-invalid @enderror" id="bookTitle" name="email" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="col-12">
                                <label for="libelle" class="form-label">Libelle <span class="text-danger">*</span></label>
                                <input type="text" class="form-control  @error('libelle') is-invalid @enderror" id="publisher" name="libelle" required  value="{{ old('libelle') }}">
                                @error('libelle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-12">
                                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="description"  class="form-control  @error('description') is-invalid @enderror" >{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="category" class="form-label">Catégorie <span class="text-danger">*</span></label>
                                <select name="categorie_id" id="categorie_id" class="form-select" required>
                                    <option value="">Choisissez une catégorie</option>
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                                    @endforeach
                                </select>
                                @error('categorie_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                           
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Ajouter une nouvelle Idée</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
