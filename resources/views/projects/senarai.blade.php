@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Senarai Projects</div>

                <div class="panel-body">
                    <a href="{{ route('addProject') }}" class="btn btn-primary">
                        Tambah Project
                    </a>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Lokasi</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach( $results as $item )

                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->getLokasi->nama }}</td>
                            <td>{{ $item->start_date }}</td>
                            <td>{{ $item->end_date }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ route('editProject', $item->id) }}"  class="btn btn-xs btn-primary">Edit</a>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-{{ $item->id }}">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <form method="POST" action="{{ route('deleteProject', $item->id) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    
                                
                                    <div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Sahkan Hapus Data</h4>
                                        </div>
                                        <div class="modal-body">
                                            Adakah anda ingin hapuskan rekod {{ $item->title }}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Confirm</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                </form>
                            </td>
                        </tr>

                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
