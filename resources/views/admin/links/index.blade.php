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

                        <table class="table table-striped">
                            <thead>

                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->url }}</td>
                                    <!-- we will also add show, edit, and delete buttons -->
                                    <td>
                                        <a class="btn btn-small btn-success"
                                           href="{{ Route('links.show' , $item->id) }}">Show</a>
                                        <a class="btn btn-small btn-info" href="{{ Route('links.edit',$item->id) }}">Edit</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$items->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
