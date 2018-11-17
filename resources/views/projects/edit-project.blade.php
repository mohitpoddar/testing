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
                        {!! Form::open(array('action' => ['ProjectsController@update', $project->act_id], 'method' => 'POST', 'enctype' => 'multipart/form-data')) !!}
                        {{-- Owner section TODO: Add logic to show depengind on user --}}
                        @if($isOwner)
                            @include('projects.layouts.owner-owner-section') {{-- Owner section when user is owner --}}
                        {{-- TODO: Add the owner section for resp & execs --}}
                        @else
                            @include('projects.layouts.resp-execs-owner-section')
                        {{-- <h1>TODO NEXT ACTION</h1> --}}
                        @endif


                        {{-- Team section --}}
                        {{-- Team section TODO: Add logic to show depengind on user --}}
                        @if($isOwner)
                            @include('projects.layouts.owner-team-section') {{-- Team section when user is owner --}}
                        {{-- TODO: Add the team section for resp & execs --}}
                        @else
                            @include('projects.layouts.resp-execs-team-section')
                        @endif
                        

                        {{-- Next Actino section --}}
                        {{-- Next Action section TODO: Add logic to show depengind on user --}}
                        @if($isOwner)
                            @include('projects.layouts.owner-nextAction-section') {{-- Next Action section when user is owner --}}
                        {{-- TODO: Add the next action section for resp & execs --}}
                        @else
                            @include('projects.layouts.resp-execs-nextAction')
                        @endif
                        
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