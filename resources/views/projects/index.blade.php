@extends('layouts.global')

@section('content')
			<div class="content container-fluid">
				<div class="row">
					<div class="col-xs-7">
						<h4 class="page-title">Mandats</h4>
					</div>

					<div class="col-xs-2 text-right m-b-30">
						<div class="view-icons">
							<a href="projects-index" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
							<a href="projects-list" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
						</div>
					</div>

					<div class="col-xs-2 text-right m-b-30">
						<a href="add-project" class="btn btn-primary rounded"><i class="fa fa-plus"></i>Ajouter un mandat</a>
					</div>
				</div>
				<div class="row filter-row">
					<div class="col-sm-4 col-xs-6">  
						<div class="form-group form-focus">
							<label class="control-label">Titre</label>
							<input type="text" class="form-control floating" id="myInput" onkeyup="myFunction()"/>
						</div>
					</div>
					<form action="filter-projects" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="col-sm-4 col-xs-6"> 
						<div class="form-group form-focus select-focus">
							<label class="control-label">Plan d'action</label>
							<select name="portfolio" id="portfolio" class="select floating" onchange="test(this.value)"> 
								<option value="select">Sélectionner le Plan d'action</option>
								<option value="portfolio id1">Plan d'action 2018 - 2021</option>
								<option value="portfolio id2">Plan d'action 2022 - 2025</option>
							</select>
						</div>
					</div>
					<div class="col-sm-4 col-xs-6"> 
						<div class="form-group form-focus select-focus">
							<label class="control-label">Classification</label>
							<select name="classification" id="select" class="select floating"> 
									<option value="select">Sélectionner la Classification</option>
									<option value="Classif 1">Circulation</option>
									<option value="Classif 2">Infrastructure</option>
									<option value="Classif 3">Emploi</option>
							</select>
						</div>
					</div>
					<div class="col-sm-4 col-xs-6"> 
						<div class="form-group form-focus select-focus">
							<label class="control-label">Status</label>
							<select name="status" id="select" class="select floating">
								<option value="select">Sélectionner le Status</option>
								<option value="-3">Eliminé</option>
								<option value="-2">Broullion</option>
								<option value="-1">Reouvert</option>
								<option value="0">À faire</option>
								<option value="1">En exécution</option>
								<option value="2">En vérification</option>
								<option value="3">Fermé</option>
							</select>
						</div>
					</div>
					<div class="col-sm-4 col-xs-6"> 
						<div class="form-group form-focus select-focus">
							<label class="control-label">Priorité</label>
							<select name="priority" id="select" class="select floating">
								<option value="select">Sélectionner le Priorité</option>
								<option value="0">Basse</option>
								<option value="1">Normale</option>
								<option value="2">Haute</option>
								<option value="3">Urgent</option>
							</select>
						</div>
					</div>
					<div class="col-sm-3 col-xs-6">  
						<button type="submit" class="btn btn-success btn-block" id="search"> Chercher </button>  
					</div>     
				</div>
				</form>
				
				<div class="row">
					<div class="col-xs-4">
						<h4 class="page-title">Liste de mandats</h4>
					</div>
				</div>
				<div class="card-columns">
					<div class="col-lg-4 col-sm-4">
						<div class="card-box project-box">
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
									<ul class="dropdown-menu pull-right">
										<li><a href="edit-project-id" name="edit-project"><i class="fa fa-pencil m-r-5"> </i>Plus de détails</a></li>
										<li><a href="tasks-project-id" name="edit-project"><i class="fa fa-pencil m-r-5"> </i>Voir les tâches</a></li>
									</ul>
								</div>
								<h4 class="project-title"><a href="view-project-id">Transformer les espaces publics pour une plus grande convivialité</a></h4>
								<medium class="block text-ellipsis m-b-15">Plan d'action 2018 - 2021</medium>
								<small class="block text-ellipsis m-b-15">
									<span class="text-xs">1</span> <span class="text-muted">tâche en cours, </span> 
									<span class="text-xs">1</span> <span class="text-muted">tâche completée</span>
								</small>
								<p class="text-muted">Bien que certaines politiques hostiles à des installations non-conventionnelles de populations marginales voient le jour, 
											la ville reste un lieu d’hospitalité au travers de ses espaces extérieurs pour tous ceux qui ont la patience d’explorer ses possibilités d’accueil.
											De nombreuses innovations et manifestations culturelles nous poussent à vivre nos espaces urbains pleinement, en passant de plus en plus de temps à 
											l’extérieur de nos logements.</p>
								<medium class="block text-ellipsis m-b-15">Classification: Infrastructure</medium>
								
								<div class="row">
									<div class="col-lg-6 col-sm-6">
										<div class="project-members m-b-15">
											<div>Demandeur : Babak Herischi</div>
											<ul class="team-members">
												<li>
													<a href="#" data-toggle="tooltip" title="Babak Herischi"><img src="assets/img/uherizz.jpg" alt="Babak Herischi"></a>
												</li>
											</ul>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6">
										<div class="project-members m-b-15">
											<div>Responsable : Sylvain Villeneuve</div>
											<ul class="team-members"> 
												<li>
													<a href="#" data-toggle="tooltip" title="Sylvain Villeneuve"><img src="assets/img/uvill97.jpg" alt="Sylvain Villeneuve"></a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="pro-deadline m-b-15">
									<div>Statut: En exécution</div>
									<div>Priorité: <span class="label label-success-border">Normal</span></div>
									<div class="sub-title">Échéance:</div> 
									<div class="text-muted">29 juin 2019</div>
								</div>
								<p class="m-b-5">Progress <span class="text-success pull-right">30%</span></p>
								<div class="progress progress-xs m-b-0">
									<div class="progress-bar progress-bar-success" role="progressbar" data-toggle="tooltip" title="30%" style="width: 30%"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-4">
						<div class="card-box project-box">
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
									<ul class="dropdown-menu pull-right">
										<li><a href="edit-project-id" name="edit-project"><i class="fa fa-pencil m-r-5"> </i>Plus de détails</a></li>
										<li><a href="tasks-project-id" name="edit-project"><i class="fa fa-pencil m-r-5"> </i>Voir les tâches</a></li>
									</ul>
								</div>
								<h4 class="project-title"><a href="view-project-id">Transformer les espaces publics pour une plus grande convivialité</a></h4>
								<medium class="block text-ellipsis m-b-15">Plan d'action 2018 - 2021</medium>
								<small class="block text-ellipsis m-b-15">
									<span class="text-xs">1</span> <span class="text-muted">tâche en cours, </span> 
									<span class="text-xs">1</span> <span class="text-muted">tâche completée</span>
								</small>
								<p class="text-muted">Bien que certaines politiques hostiles à des installations non-conventionnelles de populations marginales voient le jour, 
											la ville reste un lieu d’hospitalité au travers de ses espaces extérieurs pour tous ceux qui ont la patience d’explorer ses possibilités d’accueil.
											De nombreuses innovations et manifestations culturelles nous poussent à vivre nos espaces urbains pleinement, en passant de plus en plus de temps à 
											l’extérieur de nos logements.</p>
								<medium class="block text-ellipsis m-b-15">Classification: Infrastructure</medium>
								
								<div class="row">
									<div class="col-lg-6 col-sm-6">
										<div class="project-members m-b-15">
											<div>Demandeur : Babak Herischi</div>
											<ul class="team-members">
												<li>
													<a href="#" data-toggle="tooltip" title="Babak Herischi"><img src="assets/img/uherizz.jpg" alt="Babak Herischi"></a>
												</li>
											</ul>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6">
										<div class="project-members m-b-15">
											<div>Responsable : Sylvain Villeneuve</div>
											<ul class="team-members"> 
												<li>
													<a href="#" data-toggle="tooltip" title="Sylvain Villeneuve"><img src="assets/img/uvill97.jpg" alt="Sylvain Villeneuve"></a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="pro-deadline m-b-15">
									<div>Statut: En exécution</div>
									<div>Priorité: <span class="label label-success-border">Normal</span></div>
									<div class="sub-title">Échéance:</div> 
									<div class="text-muted">29 juin 2019</div>
								</div>
								<p class="m-b-5">Progress <span class="text-success pull-right">30%</span></p>
								<div class="progress progress-xs m-b-0">
									<div class="progress-bar progress-bar-success" role="progressbar" data-toggle="tooltip" title="30%" style="width: 30%"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-4">
						<div class="card-box project-box">
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
									<ul class="dropdown-menu pull-right">
										<li><a href="edit-project-id" name="edit-project"><i class="fa fa-pencil m-r-5"> </i>Plus de détails</a></li>
										<li><a href="tasks-project-id" name="edit-project"><i class="fa fa-pencil m-r-5"> </i>Voir les tâches</a></li>
									</ul>
								</div>
								<h4 class="project-title"><a href="view-project-id">Transformer les espaces publics pour une plus grande convivialité</a></h4>
								<medium class="block text-ellipsis m-b-15">Plan d'action 2018 - 2021</medium>
								<small class="block text-ellipsis m-b-15">
									<span class="text-xs">1</span> <span class="text-muted">tâche en cours, </span> 
									<span class="text-xs">1</span> <span class="text-muted">tâche completée</span>
								</small>
								<p class="text-muted">Bien que certaines politiques hostiles à des installations non-conventionnelles de populations marginales voient le jour, 
											la ville reste un lieu d’hospitalité au travers de ses espaces extérieurs pour tous ceux qui ont la patience d’explorer ses possibilités d’accueil.
											De nombreuses innovations et manifestations culturelles nous poussent à vivre nos espaces urbains pleinement, en passant de plus en plus de temps à 
											l’extérieur de nos logements.</p>
								<medium class="block text-ellipsis m-b-15">Classification: Infrastructure</medium>
								
								<div class="row">
									<div class="col-lg-6 col-sm-6">
										<div class="project-members m-b-15">
											<div>Demandeur : Babak Herischi</div>
											<ul class="team-members">
												<li>
													<a href="#" data-toggle="tooltip" title="Babak Herischi"><img src="assets/img/uherizz.jpg" alt="Babak Herischi"></a>
												</li>
											</ul>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6">
										<div class="project-members m-b-15">
											<div>Responsable : Sylvain Villeneuve</div>
											<ul class="team-members"> 
												<li>
													<a href="#" data-toggle="tooltip" title="Sylvain Villeneuve"><img src="assets/img/uvill97.jpg" alt="Sylvain Villeneuve"></a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="pro-deadline m-b-15">
									<div>Statut: En exécution</div>
									<div>Priorité: <span class="label label-success-border">Normal</span></div>
									<div class="sub-title">Échéance:</div> 
									<div class="text-muted">29 juin 2019</div>
								</div>
								<p class="m-b-5">Progress <span class="text-success pull-right">30%</span></p>
								<div class="progress progress-xs m-b-0">
									<div class="progress-bar progress-bar-success" role="progressbar" data-toggle="tooltip" title="30%" style="width: 30%"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection

@section('customscript')

@endsection