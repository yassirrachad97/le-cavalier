@extends('layaout.navbar')

@section('reservation')
    <div class="container">
        <h2>Réservations de {{ Auth::user()->name }}</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Événement</th>
                    <th>Date de réservation</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->evenement->title }}</td>
                        <td>{{ $reservation->date_reservation }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
