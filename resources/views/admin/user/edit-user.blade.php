<!-- ===== TODO modify to follow the same structure as users-config-index.blade with Global layout ===== -->
<!DOCTYPE html>
<html>
    @include('layouts.header')
    @include('layouts.sidebar')
            <div class="page-wrapper">
                <div class="content container-fluid">
						<div class="row">
							<div class="col-xs-4">
                            <h4 class="page-title">Modifier Utilisateur: {{ $user->user_full_name }}</h4>
							</div>
							<div class="col-xs-8 text-right m-b-30">
								<a href="users" class="btn btn-primary rounded">Annuler</a>
							</div>
                        </div>
                        {{-- {{dd($user->_id)}} --}}
                        {!! Form::open(array('action' => ['UsersController@update', $user->_id], 'method' => 'POST', 'enctype' => 'multipart/form-data')) !!}
                        <div class="card-box">
                            <h3 class="card-title">Utilisateurs Information</h3>
                            @include('include.messages')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-focus">
                                        {!! Html::decode(Form::label('userFullName', 'Nom complet <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                                        {{ Form::text('userFullName', $user->user_full_name, ['class' => 'form-control floating']) }}
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group form-focus select-focus">
                                        {!! Html::decode(Form::label('userGroup', 'Groupe <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                                        <select name="userGroup" class="select from-control floating">
                                            @foreach ($groups as $group)
                                                @if($user->user_group == $group->user_group)
                                                    <option selected value="{{ $group->user_group }}">{{ $group->user_group }}</option>
                                                @else
                                                    <option value="{{ $group->user_group }}">{{ $group->user_group }}</option>
                                                @endif
                                            @endforeach  
                                        </select>
                                        {{-- {{ Form::select('userGroup', ['Group1' => 'Group 1', 'Group2' => 'Group 2'], $user->user_group, ['class' => 'select form-control floating']) }} --}}
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group form-focus select-focus">
                                        {!! Html::decode(Form::label('userType', 'Type <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                                        <select name="userType" class="select from-control floating">
                                            @foreach ($types as $type)
                                                @if($user->user_type == $type->user_type)
                                                    <option selected value="{{ $type->user_type }}">{{ $type->user_type }}</option>
                                                @else
                                                    <option value="{{ $type->user_type }}">{{ $type->user_type }}</option>
                                                @endif
                                            @endforeach  
                                        </select>
                                        {{-- {{ Form::select('userType', ['Admin' => 'Admin', 'Client' => 'Client', 'Interne' => 'Interne'], $user->user_type, ['class' => 'select form-control floating']) }} --}}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-focus">
                                        {!! Html::decode(Form::label('userEmail', 'Adresse courriel <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                                        {{ Form::text('userEmail', $user->user_email, ['class' => 'form-control floating']) }}
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group form-focus select-focus">
                                        {!! Html::decode(Form::label('userLotus', 'Logiciel de messagerie <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                                        {{ Form::select('userLotus', ['Lotus' => 'Lotus', 'Outlook' => 'Outlook'], $user->user_Lotus_solution, ['class' => 'select form-control floating']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-striped custom-table">
                                    <tbody>
                                        <tr>
                                            <td>Droit de création et assignation de mandat</td>
                                            <td>
                                                {{ Form::checkbox('isAssign', 'yes', $user->user_assign_right == 1 ? true:false) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Droit de délégation de mandat</td>
                                            <td>
                                                {{ Form::checkbox('isDelegate', 'yes', $user->user_delegate_right == 1 ? true:false) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Droit de représentation d'un autre utilisateur</td>
                                            <td>
                                                {{ Form::checkbox('isRepresent', 'yes', $user->user_represent_right == 1 ? true:false, ['id' => 'isRepresent', 'onClick' => 'showRepresented()']) }}
                                            </td>
                                        </tr>
                                        @if($user->user_represent_right == 1)
										    <tr id="userRepresentedDisplay" style="display: ;">
                                        @else
										    <tr id="userRepresentedDisplay" style="display: none;">
                                        @endif
											<td>
												<div class="col-md-12">
													<div class="form-group form-focus select-focus">
                                                        {!! Html::decode(Form::label('userRepresented', 'Nom d\'utilisateur Windows de l\'utilisateur répresenté <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                                                        <select name="userRepresented" class="select from-control floating">
                                                            @foreach ($representers as $representer)
                                                                @if($user->user_represented_id == $representer->user_id)
                                                                    <option selected value="{{ $representer->user_id }}">{{ $representer->user_full_name }}</option>
                                                                @else
                                                                    <option value="{{ $representer->user_id }}">{{ $representer->user_full_name }}</option>
                                                                @endif
                                                            @endforeach  
                                                        </select>
                                                        </div>
                                                        {{-- {{ Form::select('userRepresented', ['nichl' => 'Nichl', 'carlo' => 'Carlo'], $user->user_represented_id, ['class' => 'select form-control floating']) }} --}}
                                                        </div>
												</div>
											</td>
										</tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="m-t-20 text-center">
                                {{ Form::hidden('_method', 'PUT') }}
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