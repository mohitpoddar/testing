@extends('layouts.global')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard de l'outil</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
@endsection
