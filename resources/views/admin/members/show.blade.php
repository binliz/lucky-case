@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>{{$member->id}}</p>
                            <p>{{$member->username}}</p>
                            <p>{{$member->phone}}</p>
                        <ul>
                        @foreach($member->links as $link)
                            <li>{{$link->url}}
                            @if($link->global_valid == true)
                                Valid
                                @else
                                NOT Valid
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
