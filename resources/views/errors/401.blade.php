@extends('layouts.guestheader')

@section('content')
		<div class="content container-fluid">
			<div class="container">
			<h3 class="account-title">Oupsss…!</h3>
			<p style="text-align:center;"><img src="assets/img/error_401.jpg" alt="error_401"></p>
			<div class="account-box">
				<div class="account-wrapper">
					<p class="upload-text">Vous ne possedez les droits suffisants pour votre demande.</p>
					<p class="text-muted">SVP contacter un administrateur du système
					</p>
					<form action="index.html">
						<div class="text-center">
							<a href="home">Revenir à la page d’accueil</a>
						</div>
					</form>
				</div>
			</div>
		</div>
@endsection