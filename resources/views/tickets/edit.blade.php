@extends('layouts.app')  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('tickets.update',['ticket'=> $ticket->id]) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>categorie:</strong>
                    <select class="form-control"  name="categorie" placeholder="categorie">
                        <option>{{ $ticket->categorie }}</option>
                        <option>Achat</option>
                        <option>Production</option>
                        <option>Logistiques</option>
                    </select>
                </div>
            </div>   
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Commentaire:</strong>
                    <input type="text" name="question" value="{{ $ticket->question }}" class="form-control" placeholder="Commentaire">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>status:</strong>
                    <input type="text" name="status" value="{{ $ticket->status }}" class="form-control" placeholder="status">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection