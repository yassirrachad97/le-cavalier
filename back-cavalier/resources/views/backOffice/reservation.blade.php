@extends('layaout.asidOrg')

@section('reservation')
<div class="container">
    <h2>Réservations à approuver</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Événement</th>
                <th>prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)



                <tr>
                    <td>{{ $reservation->evenement->title }}</td>
                    <td>{{ $reservation->evenement->prix }}</td>

                    <td>

                    </td>
                    <td>

                            <a href="{{ route('reservations.approve', $reservation->id) }}" type="submit" class="btn btn-success">Accepte</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
