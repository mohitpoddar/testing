<!DOCTYPE html>
<html>
	@include('layouts.header')
	@include('layouts.sidebar')
            <div class="page-wrapper">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-xs-7">
							<h4 class="page-title">Liste de mandats</h4>
                        </div>

						<div class="col-xs-2 text-right m-b-30">
                            <div class="view-icons">
                                <a href="projects" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                                <a href="projects-list" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
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
						{{-- TODO: this should go to filter_list when is implemented --}}
						{!! Form::open(['action' => 'ProjectsController@list', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
						{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
						<div class="col-sm-4 col-xs-6"> 
							<div class="form-group form-focus select-focus">
								<label class="control-label">Classification</label>
								<select name="classif_1" id="classif_1" class="select floating" onchange="test(this.value)"> 
									<option value="select">Sélectionner le Classification</option>
									<option value="Classif 1">Classification 1</option>
									<option value="Classif 1.2">Classification 2</option>
									<option value="Classif 1.3">Classification 3</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4 col-xs-6"> 
							<div class="form-group form-focus select-focus">
								<label class="control-label">Sous Classification</label>
								<select name="classif_2" id="select" class="select floating"> 
										<option value="select">Sélectionner le Sous Classification</option>
									<option value="Classif 2">Sous Classification 1</option>
									<option value="Classif 2.2">Sous Classification 2</option>
									<option value="Classif 2.3">Sous Classification 3</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4 col-xs-6"> 
							<div class="form-group form-focus select-focus">
								<label class="control-label">Status</label>
								<select name="status" id="select" class="select floating">
									<option value="select">Sélectionner le Status</option>
									<option value="-3">Deleted</option>
									<option value="-2">Draft</option>
									<option value="-1">Reopen</option>
									<option value="0">To Do</option>
									<option value="1">In Progress</option>
									<option value="2">Verify</option>
									<option value="3">Done</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4 col-xs-6"> 
							<div class="form-group form-focus select-focus">
								<label class="control-label">Priorité</label>
								<select name="priority" id="select" class="select floating">
									<option value="select">Sélectionner le Priorité</option>
									<option value="0">Low</option>
									<option value="1">Normal</option>
									<option value="2">High</option>
									<option value="3">Urgent</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">  
							<button type="submit" class="btn btn-success btn-block" id="search"> Chercher </button>  
						</div>     
					</div>
					{!! Form::close() !!}					
                    
					<div class="row">
                            <div class="col-xs-4">
                                <h4 class="page-title">Liste de mandats</h4>
                            </div>
                        </div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table id="myTable" class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th style="width:12%">Status</th>
											<th>Priorité</th>
											<th>Échéance</th>
											<th>Mandat</th>
											<th>Classification</th>
											<th>Demandeur</th>
											<th>Avancement</th>
											<th>Type</th>
											<th class="text-right">Action</th>
 									</tr>
                                    </thead>

									<tbody>

										@if(count($projects)>0)
											@foreach($projects as $project)
												@php($priority = "")
												@php($label = "")
												@if($project->act_priority == 0)
													@php($priority = "Low")
													@php($label = "info")
												@elseif($project->act_priority == 1)
													@php($priority = "Normal")
													@php($label = "primary")
												@elseif($project->act_priority == 2)
													@php($priority = "High")
													@php($label = "warning")
												@else
													@php($priority = "Urgent")
													@php($label = "danger")
												@endif
												
												@php($status = "")
												@if($project->act_status_owner == -3)
													@php($status = 'Deleted')
												@elseif($project->act_status_owner == -2)
													@php($status = 'Draft')
												@elseif($project->act_status_owner == -1)
													@php($status = 'Reopen')
												@elseif($project->act_status_owner == 0)
													@php($status = 'To Do')
												@elseif($project->act_status_owner == 1)
													@php($status = 'In Progress')
												@elseif($project->act_status_owner == 2)
													@php($status = 'Verify')
												@elseif($project->act_status_owner == 3)
													@php($status = 'Done')
												@endif
										<tr>
											<td>
												<h2>{{ $status }}</h2>
											</td>
											<td value="{{ $project->act_priority }}" ><span class="label label-{{ $label }}">{{ $priority }}</span></td>
											<td>{{ $project->act_due_date }}</td>
											<td>{{ $project->act_title }}</td>
                                            <td class="classification">{{ $project->act_classif_1 }}</td>
                                            <td>{{ 'test' }}</td>
											<td>{{ "%". $project->act_completion_pct }}</td>
											<td>{{ "Mandat Assigne (test)" }}</td>
											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
															<li><a href="edit-project-{{ $project->act_id }}" name="edit-project"><i class="fa fa-pencil m-r-5"> </i>Edit</a></li>
													</ul>
												</div>
											</td>
										</tr>
										@endforeach
										@endif

										<script>
										// Filter table by name
										function myFunction() {
										// Declare variables 
										var input, filter, table, tr, td, tdType, i;
										input = document.getElementById("myInput");
										filter = input.value.toUpperCase();
										table = document.getElementById("myTable");
										tr = table.getElementsByTagName("tr");

										// Loop through all table rows, and hide those who don't match the search query
										for (i = 0; i < tr.length; i++) {
											td = tr[i].getElementsByTagName("td")[3];

											if (td) {
											if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
												tr[i].style.display = "";
											} else {
												tr[i].style.display = "none";
											}
											}
										}

										}
										</script>
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script> -->
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="assets/js/select2.min.js"></script>
		<script type="text/javascript" src="assets/js/moment.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>
    </body>
</html>w