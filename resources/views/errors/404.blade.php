@extends('layouts.guestheader')

@section('content')
		<div class="content container-fluid">
			<div class="container">
			<h3 class="account-title">Oupsss…. page introuvable!</h3>
			<div class="account-box">
				<div class="account-wrapper">
					<div class="account-logo">
						<a href="home"><img src="assets/img/error_404.jpg" width="40"></a>
					</div>
					<p class="upload-text">C'est embarrassant... </p>
					<p class="text-muted">La page que vous avez demandée n’a pas été trouvée. 
							Il se peut que le lien que vous avez utilisé soit rompu ou que vous ayez tapé l’adresse (URL) incorrectement. 
							Vous avez maintenant les possibilités suivantes :
					</p>
					<div class="text-center">
						<a href="home">Revenir à la page d’accueil</a>
					</div>
				</div>
			</div>
		</div>
@endsection