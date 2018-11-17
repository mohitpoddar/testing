<!-- ===== TODO modify to follow the same structure as users-config-index.blade with Global layout ===== -->

<!DOCTYPE html>
<html>
    @include('layouts.header')
    @include('layouts.sidebar')
            <div class="page-wrapper">
                <div class="content container-fluid">
						<div class="row">
							<div class="col-xs-4">
								<h4 class="page-title">Nouveau Utilisateurs</h4>
							</div>
							<div class="col-xs-8 text-right m-b-30">
								<a href="users" class="btn btn-primary rounded">Annuler</a>
							</div>
                        </div>
                        {!! Form::open(['action' => 'UsersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="card-box">
                            <h3 class="card-title">Utilisateurs Information</h3>
                            @include('include.messages')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-focus">
                                        {!! Html::decode(Form::label('userFullName', 'Nom complet <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                                        {{ Form::text('userFullName', '', ['class' => 'form-control floating']) }}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-focus">
                                        {!! Html::decode(Form::label('userId', 'Nom d\'utilisateur Windows <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                                        {{ Form::text('userId', '', ['class' => 'form-control floating']) }}
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group form-focus select-focus">
                                        {!! Html::decode(Form::label('userGroup', 'Groupe <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                                        <select name="userGroup" class="select from-control floating">
                                        @foreach ($groups as $group)
                                            <option value="{{ $group->user_group }}">{{ $group->user_group }}</option>
                                        @endforeach  
                                        </select>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group form-focus select-focus">
                                        {!! Html::decode(Form::label('userType', 'Type <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                                        <select name="userType" class="select from-control floating">
                                        @foreach ($types as $type)
                                            <option value="{{ $type->user_type }}">{{ $type->user_type }}</option>
                                        @endforeach  
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-focus">
                                        {!! Html::decode(Form::label('userEmail', 'Adresse courriel <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                                        {{ Form::text('userEmail', '', ['class' => 'form-control floating']) }}
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group form-focus select-focus">
                                        {!! Html::decode(Form::label('userLotus', 'Logiciel de messagerie <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                                        {{ Form::select('userLotus', ['Lotus' => 'Lotus', 'Outlook' => 'Outlook'], null, ['class' => 'select form-control floating']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-striped custom-table">
                                    <tbody>
                                        <tr>
                                            <td>Droit de création et assignation de mandat</td>
                                            <td>
                                                {{ Form::checkbox('isAssign', 'yes') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Droit de délégation de mandat</td>
                                            <td>
                                                {{ Form::checkbox('isDelegate', 'yes') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Droit de représentation d'un autre utilisateur</td>
                                            <td>
                                                {{ Form::checkbox('isRepresent', 'yes', false, ['id' => 'isRepresent', 'onClick' => 'showRepresented()']) }}
                                            </td>
                                        </tr>
										<tr id="userRepresentedDisplay" style="display:none;">
											<td>
												<div class="col-md-12">
													<div class="form-group form-focus select-focus">
                                                        {!! Html::decode(Form::label('userRepresented', 'Nom d\'utilisateur Windows de l\'utilisateur répresenté <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                                                        <select name="userRepresented" class="select from-control floating">
                                                            @foreach ($representers as $representer)
                                                                <option value="{{ $representer->user_id }}">{{ $representer->user_full_name }}</option>
                                                            @endforeach  
                                                            </select>
                                                        </div>
												</div>
											</td>
										</tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="m-t-20 text-center">
                                {{ Form::submit('Enregistrer', ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                        {!! Form::close() !!}
				</div>
                <script type="text/javascript">
                function showRepresented() {
                        var chbox = document.getElementById("isRepresent");
                            if(chbox.checked){
                                document.getElementById("userRepresentedDisplay").style.display = '';
                            } else {
                                document.getElementById("userRepresentedDisplay").style.display = 'none';
                            }
                    }
                </script>
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