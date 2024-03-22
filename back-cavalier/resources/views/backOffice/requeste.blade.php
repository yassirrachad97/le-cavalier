    @extends('layaout.asideAdmn')

    @section('approved')
    <div class="container">
        <h2>Événements à approuver</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($evenementsNonApprouves as $evenement)
                    <tr>
                        <td><img src="{{asset('storage/'.$evenement->image)}}" alt="{{ $evenement->title }}" style="width: 50px; height: 50px; border-radius: 50%;"></td>
                        <td>{{ $evenement->title }}</td>
                        <td>{{ $evenement->date }}</td>
                        <td>
                            <form action="{{ route('evenements.approve', $evenement->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button name="submit" type="submit" class="btn btn-success">Approuver</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
