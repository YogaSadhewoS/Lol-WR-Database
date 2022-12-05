@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Position</h2>
            </div>
            <div class="pull-right">
                @can('iwak-create')
                <a class="btn btn-success" href="{{ route('positions.create') }}"> Create New Position</a>
                @endcan
                @can('iwak-delete')
                <a class="btn btn-info" href = "/positions/trash">Deleted Data</a>
                @endcan   
            </div>
            <div class="my-3 col-12 col-sm-8 col-md-5">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Keyword" name = "keyword" aria-label="Keyword" aria-describedby="basic-addon1">
                        <button class="input-group-text btn btn-primary" id="basic-addon1">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>ID Position</th>
            <th>Position Name</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($positions as $position)
        <tr>
            <td>{{ $position->id_position }}</td>
            <td>{{ $position->nama_position }}</td>
            <td>{{ $position->desc_position }}</td>
            <td>
                <form action="{{ route('positions.destroy',$position->id_position) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('positions.show',$position->id_position) }}">Show</a>
                    @can('iwak-edit')
                    <a class="btn btn-primary" href="{{ route('positions.edit',$position->id_position) }}">Edit</a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('iwak-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan             
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $positions->links() !!}
@endsection