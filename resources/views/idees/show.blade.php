<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Détail de : {{ $idee->nom}}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">{{ $idee->libelle }}</h1>
            </div>
        </div>
    </div>
    <br><br>
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    {{ $idee->nom }}
                </h3>

                <div class="blog-post">
                    <p class="blog-post-meta">{{ $idee->created_at }}</p>
                    <a href="#">Description</a>

                    <p> {{ $idee->description }} </p>

                </div><!-- /.blog-post -->
            </div><!-- /.blog-main -->

            <aside class="col-md-4 blog-sidebar">
                <div class="p-3 mb-3 bg-light rounded">
                    <h4 class="font-italic">Evaluation</h4>
                    <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                </div>
                <div class="row">
                    <div class="col">
                      <nav class="blog-pagination">
                        <form action="{{ route('idees.accepter', $idee) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary">Accepter</button>
                        </form>
                        <form action="{{ route('idees.refuser', $idee) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary">Refuser</button>
                        </form>
                    </nav>
                    </div>
                </div>
            </aside><!-- /.blog-sidebar -->
            <hr class="my-5">
        </div><!-- /.row -->

        <section class="liste-commentaires">
            <div class="row">
                <div class="col">
                    <h3> <i class="fa-solid fa-comments"></i> Vos commentaires </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-7">
                    <ol class="list-group list-group-numbered">
                        @foreach ($commentaires as $commentaire )
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">{{ $commentaire->nom}}</div>
                                {{ $commentaire->contenu}}
                            </div>
                        </li>
                        @endforeach
                    </ol>
                </div>
                <div class="col-5">
                    <form action="{{route('commentaires.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="idee_id" value="{{$idee->id}}">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Présentez vous ! </label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}">
                            @error('nom')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Votre email </label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="contenu" class="form-label">Laissez nous un mot ! </label>
                            <textarea class="form-control  @error('contenu') is-invalid @enderror" id="contenu" name="contenu">{{ old('contenu') }}</textarea>
                            @error('contenu')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-secondary">Envoyer</button>
                    </form>
                </div>
            </div>
        </section>



    </main><!-- /.container -->

    <footer class="blog-footer">

    </footer>

</body>

</html>