@extends('layouts.app')

@section('content')
    <div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('tickets.create') }}"> Create New tickets</a>
        </div>
    </div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="table-responsive">
<table  class="table table-bordered">
    <tr class="text-center">
        <th>id</th>
        <th>Categorie</th>
       <th>Commentaire</th>
       <th>status</th>
        <th>Action</th>
    </tr>
    @foreach ($tickets as $tickets)
    <tr class="text-center">
        <td>{{ ++$i }}</td>
        <td>{{ $tickets->categorie }}</td>
        <td>{{ $tickets->question }}</td>
        <td>{{ $tickets->status}}</td>
        <td>
            <form action="{{ route('tickets.destroy',$tickets->id) }}" method="POST">
                <div class="boutons">
              <a class="btn  btn-primary" href="{{ route('tickets.show',['ticket'=>$tickets->id]) }}"><i class="bi bi-eye-fill"></i></a>
            <a class="btn btn-warning" href="{{ route('tickets.edit',['ticket'=>$tickets->id]) }}"><i class="bi bi-pencil-square"></i></a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                </div>
            </form>
        </td>
    </tr>
    @endforeach
</table>
</div>


{{-- {!! $tickets->links() !!} --}}
@endsection
