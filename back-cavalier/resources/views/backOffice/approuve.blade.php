@extends('layaout.asideAdmn')

@section('approved')
<div class="container">
    <h2>Annonces à approuver</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Cover</th>
                <th>Titre</th>
                <th>cetegories</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($annoncesNonApprouves as $annonce)
                <tr>
                    <td><img src="{{asset('storage/'.$annonce->cover)}}" alt="{{ $annonce->title }}" style="width: 50px; height: 50px; border-radius: 50%;"></td>
                    <td>{{ $annonce->title }}</td>
                    <td>{{ $annonce->category->name}}</td>
                    <td>
                        <form action="{{ route('annonce.approve', $annonce->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button name="submit" type="submit" class="btn btn-primary">Approuver</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
