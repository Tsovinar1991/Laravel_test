@extends('layouts/app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5" >
                <h3>Profile</h3>

                    @foreach($user as $u)
                        <div>
                            <img src="{{isset($u->user_image)? '/storage/user_images/'.$u->user_image : '/storage/user_images/user.jpg'}}" alt="Profile" style="width:200px; height:200px;object-fit:cover;">
                        </div>
                    <h5>Name: {{$u->name}}</h5>
                    <h5>Email Address: {{$u->email}}</h5>
                    <h5>Tel: {{$u->mobile}}</h5>
                        @endforeach
                        <a href="{{('profile/'.$u->id .'/edit')}}" class = "btn btn-default">Edit Profile</a>


            </div>
            <div class="col-md-7">
                To be continued
            </div>
        </div>
    </div>




@endsection
