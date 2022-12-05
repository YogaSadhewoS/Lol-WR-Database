@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List View Join</h2>
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
            <th>Champion</th>
            <th>Description</th>
            <th>Position</th>
            <th>Job</th>
        </tr>
        @foreach ($joins as $join)
        <tr>
            <td>{{ $join->nama_champion }}</td>
            <td>{{ $join->desc_champion }}</td>
            <td>{{ $join->nama_position }}</td>
            <td>{{ $join->nama_job }}</td>
        </tr>
        @endforeach
    </table>
    {!! $joins->links() !!}
@endsection