<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Creation annonce</title>
</head>

<body>
    <div class="container">
        <h1 class="text text-center">Ajouter une annone</h1>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all(); as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group">
            <form action="{{route('annonces.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="">Titre</label>
                    <input type="text" class="form-control" name="titre">
                </div>
                <div>
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="description">
                </div>
                <div>
                    <label for="">Prix</label>
                    <input type="number" class="form-control" name="prix">
                </div>
                <div>
                    <label for="">Miniature</label>
                    <input type="file" class="form-control" name="miniature">
                </div>
                <div>
                    <label for="">Annee</label>
                    <input type="number" class="form-control" name="annee">
                </div>
                <div>
                    <label for="">Type</label>
                    <input type="text" class="form-control" name="type">
                </div>
                <div>
                    <label for="">Carburant</label>
                    <input type="text" class="form-control" name="carburant">
                </div>
                <div>
                    <label for="">Transmission</label>
                    <input type="text" class="form-control" name="transmission">
                </div>
                <div>
                    <label for="">Kilometrage</label>
                    <input type="number" class="form-control" name="kilometrage">
                </div>
                <div>
                    <label for="">Puissance Fiscale</label>
                    <input type="number" class="form-control" name="puissance_fiscale">
                </div>
                <div>
                    <label for="">Dedouannee</label>
                    <input type="number" class="form-control" name="dedouanee">
                </div>
                <div>
                    <label for="">Premiere main</label>
                    <input type="text" class="form-control" name="premiere_main">
                </div>
                <div>
                    <label for="">Modele</label>
                    <input type="text" class="form-control" name="modele">
                </div>
                <div>
                    <label for="">Marque</label>
                    <input type="text" class="form-control" name="marque">
                </div>
                <div>
                    <label for="">Images</label>
                    <input type="file" class="form-control" name="images[]" multiple>
                </div>
                <div>
                    <input type="submit" value="Ajouter" class="btn btn-primary mt-3">
                    <a href="{{route('index')}}" class="btn btn-danger mt-3">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>