@extends('layouts.app')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="text-center">Add New tickets</h2>
        </div>
        <div class="pull-right  col-md-12">
            <a class="btn btn-primary" href="{{ route('tickets.index') }}"> Back</a>
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
   
<form action="{{ route('tickets.store') }}" method="POST">
    @csrf

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>categorie:</strong>
                <select class="form-control" name="categorie" placeholder="categorie">
                    <option>Achat</option>
                    <option>Production</option>
                    <option>Logistiques</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Commentaire:</strong>
                <input type="textarea" class="form-control" name="question" placeholder="question">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>status:</strong>
                <input class="form-control" name="status" placeholder="status">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>
@endsection