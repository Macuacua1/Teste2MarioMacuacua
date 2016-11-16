@extends('layouts.app')
@section('content')
    <form class="form-horizontal" action="{{route('email.store')}}" method="post">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Preencha correctamente os campos!
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! csrf_field() !!}}

            <div class="form-group">
            <label for="titulo" class="col-sm-2 control-label">Destinatario</label>
            <div class="col-sm-8">
                <input type="email" name="destinatario" class="form-control" value="{{isset($email->email)? $email->email: '',isset($email->email)}}" id="destinatario" placeholder="Ex: mariocarlitos@gmail.com">
            </div>
        </div>
        <div class="form-group">
            <label for="titulo" class="col-sm-2 control-label">Assunto</label>
            <div class="col-sm-8">
                <input type="text" name="assunto" class="form-control" id="assunto" placeholder="Assunto">
            </div>
        </div>
        <div class="form-group">
            <label for="conteudo" class="col-sm-2 control-label">Corpo</label>
            <div class="col-sm-8">
                <textarea name="corpo" class="form-control" id="corpo" rows="8" cols="40"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Enviar</button>
            </div>
        </div>
    </form>
    @endsection