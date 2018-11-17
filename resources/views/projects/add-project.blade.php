<!DOCTYPE html>
<html>
    @include('layouts.header')
    @include('layouts.sidebar')
            <div class="page-wrapper">
                <div class="content container-fluid">
						<div class="row">
							<div class="col-xs-4">
								<h4 class="page-title">Fiche de mandat</h4>
							</div>
							<div class="col-xs-8 text-right m-b-30">
								<a href="projects" class="btn btn-primary rounded">Annuler</a>
							</div>
                        </div>
                        {!! Form::open(['action' => 'ProjectsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="card-box">
                            <h3 class="card-title">Demandeur: {{ $userFullName }}</h3>
                            @include('include.messages')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-focus">
                                        {!! Html::decode(Form::label('actTitle', 'Titre <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                                        {{ Form::text('actTitle', '', ['class' => 'form-control floating']) }}
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group form-focus select-focus">
                                        {!! Html::decode(Form::label('actClassif1', 'Classification <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                                        {{ Form::select('actClassif1', ['Classif 1' => 'Classif 1'], null, ['class' => 'select form-control floating']) }}
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group form-focus select-focus">
                                        {!! Html::decode(Form::label('actClassif2', 'Sous-classification', ['class' => 'control-label'])) !!}
                                        {{ Form::select('actClassif2', ['Classif 2' => 'Classif 2', 'Classif 4' => 'Classif 4'], null, ['class' => 'select form-control floating']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
								<div class="col-md-6">
                                    <div class="form-group form-focus select-focus">
                                        {!! Html::decode(Form::label('actPriority', 'Priorité <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                                        {{ Form::select('actPriority', ['1' => 'Normal', '0' => 'Low', '2' => 'High', '3' => 'Urgent'], null, ['class' => 'select form-control floating']) }}
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group form-focus select-focus">
                                        {!! Html::decode(Form::label('actDueDate', 'Échéance <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                                        {{ Form::date('actDueDate', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                        {!! Html::decode(Form::label('actDescription', 'Description <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                                        {{ Form::textarea('actDescription', '', ['id' => 'project-description', 'class' => 'form-control']) }}
                                </div> <br><br>
                                <div class="col-md-12">
                                    <div class="form-group form-focus">
                                        {!! Html::decode(Form::label('actReference', 'Référence', ['class' => 'control-label'])) !!}
                                        {{ Form::text('actReference', '', ['class' => 'form-control floating']) }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-box">
                            <h3 class="card-title">Status et équipe</h3>
                            <h5>Statut: non defini</h5><br><br>
                            <h5>Avancement: 0%</h5>
                            <div class="progress progress-xs m-b-0">
                                <div class="progress-bar progress-bar-success" role="progressbar" data-toggle="tooltip" title="" style="width: 0%" data-original-title="0%"></div>
                            </div><br><br>
                            
                            <div class="row">
                                <div class="col-md-6">
                                        <h5>Responsable: Non assigné</h5>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group form-focus select-focus">
                                        {!! Html::decode(Form::label('actResponsible', 'Changement de responsable:', ['class' => 'control-label'])) !!}
                                        <select name="actResponsible" class="select from-control floating">
                                            <option value="select"> Sélectionner </option>
                                            @foreach ($usersResponsible as $responsible)
                                                <option value="{{ $responsible->_id }}">{{ $responsible->user_full_name }}</option>
                                            @endforeach  
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                        <div class="form-group form-focus">
                                            {!! Html::decode(Form::label('actFolder', 'Répertoire de travail', ['class' => 'control-label'])) !!}
                                            {{ Form::text('actFolder', '', ['class' => 'form-control floating']) }}
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-box">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="card-title">Prochaine action</h3>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Par:</h5>
                                        {{-- TODO: This will show not userfullname, but act_userid_current --}}
                                        <a style="text-decorations:none; color:inherit;" class="dropdown-toggle user-link" title={{ $userFullName }}>
                                            <span class="user-img"><img class="img-circle" src="assets/img/user.jpg" width="40" alt={{ $userFullName }}>
                                            <span class="status online">
                                            </span></span>
                                            <span> {{ $userFullName }}</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Enregistrer et assigner</h5><br><br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <button type="submit" name="subButton" value="save-as-draft" class="btn btn-danger">Enregistrer comme brouillon</button>
                                    </div>
    
                                    <div class="col-md-6 text-center">
                                        <button type="submit" name="subButton" value="save" class="btn btn-success">Enregistrer et assigner</button>
                                    </div>
                                </div>
                           
                        </div>
                        {!! Form::close() !!}
                        <script src="vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                        <script>
                            CKEDITOR.replace('project-description');
                        </script>
				</div>
			</div>
		</div>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
        <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="assets/js/select2.min.js"></script>
		<script type="text/javascript" src="assets/js/moment.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>

		<!-- date picker -->

    </body>
</html>