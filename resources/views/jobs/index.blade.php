@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Job</h2>
            </div>
            <div class="pull-right">
                @can('iwak-create')
                <a class="btn btn-success" href="{{ route('jobs.create') }}"> Create New Job</a>
                @endcan
                @can('iwak-delete')
                <a class="btn btn-info" href = "/jobs/trash">Deleted Data</a>
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
            <th>ID Job</th>
            <th>Job Name</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($jobs as $job)
        <tr>
            <td>{{ $job->id_job }}</td>
            <td>{{ $job->nama_job }}</td>
            <td>{{ $job->desc_job }}</td>
            <td>
                <form action="{{ route('jobs.destroy',$job->id_job) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('jobs.show',$job->id_job) }}">Show</a>
                    @can('iwak-edit')
                    <a class="btn btn-primary" href="{{ route('jobs.edit',$job->id_job) }}">Edit</a>
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
    {!! $jobs->links() !!}
@endsection