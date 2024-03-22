@extends('layaout.asideAdmn')
@section('user')

    <div class="container">
        <div class="row">
            @foreach($users as $user)
            <div class="col-lg-3 col-md-4 col-sm-6 ">
                <div class="card m-3 gap-4" style="width: 16rem;">
                    <div class="single-team mb-30">
                        <div class="team-img">


                            <img src="{{ asset('https://img.freepik.com/premium-vector/account-icon-user-icon-vector-graphics_292645-552.jpg') }}" alt="Description de l'image" class="card-img-top" style="max-height: 200px;">


                            <ul class="team-social">

                            </ul>
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">{{ $user->name }}</a></h3>

                            <p>{{ $user->role->name }}</p>
                            <form action="{{ route('changeRole') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user" value="{{ $user->id }}">
                                <select name="role" id="role" class="form-control" required>
                                    <option value=1>utilisateur</option>
                                    <option value=2>organisateur</option>
                                    <option value=3>admin</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-1">changer</button>
                            @if($user->is_blocked == 0)
                              <a href="{{ route('blocked' ,$user->id) }}" type="submit" class="btn btn-danger mt-1">bloquer</a>
                            @else
                            <a href="{{ route('blocked' ,$user->id) }}" type="submit" class="btn btn-danger mt-1">débloquer</a>
                            @endif
                            </form>

                            <!-- Assuming you have a role field in your User model -->
                            <!-- You can add more user details here if needed -->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
