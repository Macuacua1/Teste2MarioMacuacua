@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row">
        <h3>Emails recebidos ({{count($emails)}}) <h5>(Clique para responder)</h5></h3>
        @foreach($emails as $email)
            <div class="col-lg-10">
                <div class="alert alert-info" role="alert">
                    <a href="{{route('email.edit',$email->user_id)}}" class="alert-link">
                        <div class="caption">
                            <h4>{{$email->assunto}}</h4>

                            {{--<h6>De: {{$email->emissor}}</h6>--}}
                            <h6>De: {{$email->user->email}}</h6>
                            <span class="pull-right">{{$email->created_at->diffForHumans()}}</span>
                            <p>
                                {{--<a href="{{route('email',['id'=>$email->id])}}" class="btn btn-success" role="button">Visualizar</a>--}}
                                {{--<a href="{{route('email',['id'=>$email->id])}}" class="btn btn-primary" role="button">Responder</a>--}}
                                {{--<a href="{{route('email.destroy',['id'=>$email->id])}}" class="btn btn-danger" role="button">Apagar</a>--}}
                            </p>
                        </div>

                    </a>
                </div>
            </div>
        @endforeach

    </div>
    </div>
    @endsection