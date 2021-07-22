@extends('Partials.User.Navbar')
@extends('Partials.User.Footer')

<title>Profile</title>

@section('content')
p
{{$user->address->country}}

@endsection