@extends('admin.base')
@section('title', 'Afficher la liste des contacts')
@section('page-title', 'Liste des contacts')
@section('content')

    <div class="container my-7">
        <!-- <h2 class="text-center">LISTE DES CONTACTS</h2> -->
        <br>
        <div class="container">
            @if ($contacts->count() > 0)
                <div class="row">
                    <div class="col">
                        <table class="table mt-3">
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    <h5>{{ session()->get('success') }}</h5>
                                </div>
                            @endif
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Objet</th>
                                    <th>Staut</th>
                                    <th>Envoyé a</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $contact->nom }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->objet }}</td>
                                        <td>
                                            @if ($contact->statut == 'Lu')
                                                <p class="activ etat">Lu</p>
                                            @elseif ($contact->statut == 'Non Lu')
                                                <p class="desactive etat">Non Lu</p>
                                            @else
                                                <p class="active etat">Traité</p>
                                            @endif
                                        </td>
                                        <td>{{ $contact->created_at }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal{{$contact->id}}">
                                                Afficher
                                            </button>
                                            <a href="{{ route('admin.contact.rendreNonLu', ['contact' => $contact]) }}"
                                                class="btn btn-danger btn-sm">Non Lu</a>
                                            <a href="{{ route('admin.contact.rendreLu', ['contact' => $contact]) }}"
                                                class="btn btn-info btn-sm">Lu</a>
                                            <a href="{{ route('admin.contact.rendretraite', ['contact' => $contact]) }}"
                                                class="btn btn-success btn-sm">Traité</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModal{{ $contact->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <textarea class="form-control" id="" cols="30" rows="10" disabled>{{ $contact->message }}</textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <h3>Aucun message trouvé</h3>
            @endif
        </div>
        <div class="pagin">
            {{ $contacts->links() }}
        </div>
    </div>
    <script>
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })
    </script>
    </body>
@endsection
