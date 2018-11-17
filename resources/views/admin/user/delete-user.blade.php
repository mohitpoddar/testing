<!-- ===== TODO modify to follow the same structure as users-config-index.blade with Global layout ===== -->

@extends('layouts.global')

@section('content')
			<div class="content container-fluid">
                <div class="card-box">
                <h3 class="card-title">Êtes-vous sûr(e) de vouloir supprimer cet utilisateur: {{ $user->user_full_name }}?</h3>
                {!! Form::open(['action' => ['UsersController@destroy', $user->_id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="m-t-20">
                    <a href="users" class="btn btn-default" data-dismiss="modal">Non, retourner à la liste</a>
                    {{ Form::submit('Oui - supprimer', ['class' => 'btn btn-danger']) }}
                    </div>
                {{ Form::hidden('_method', 'DELETE') }}
                {!! Form::close() !!}
			</div>

@endsection

@section('customscript')

@endsection