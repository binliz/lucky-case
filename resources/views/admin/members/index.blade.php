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
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <!-- we will also add show, edit, and delete buttons -->
                                    <td>
                                        <a class="btn btn-small btn-success"
                                           href="{{ Route('members.show' , $item->id) }}">Show</a>
                                        <a class="btn btn-small btn-info" href="{{ Route('members.edit',$item->id) }}">Edit</a>
                                        <form action="{{ Route('members.destroy', $item->id) }}" method="post">
                                            <input class="btn btn-danger" type="submit" value="Delete" />
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                            <a href="{{ route('members.create') }}">Create</a>
                        {{$items->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
