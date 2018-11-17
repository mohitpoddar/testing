@extends('layouts.global')

@section('content')
			<div class="content container-fluid">
				<div class="row">
					<div class="col-xs-4">
						<h4 class="page-title">@lang('User management')</h4>
					</div>
					<div class="col-xs-8 text-right m-b-30">
						<a href="create-user" class="btn btn-primary rounded"><i class="fa fa-plus"></i>&nbsp @lang('New user') &nbsp</a>
					</div>
				</div>
				<div class="row filter-row">
					<form action="filter-users" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="col-sm-3 col-xs-6">  
						<div class="form-group form-focus">
							<label class="control-label">@lang('Name')  </label>

							@if($filteroptions['filtername']=='')
								<input name="filtername" value="" type="text" class="form-control floating" />
							@else
								
								<input name="filtername" type="text" value="{{$filteroptions['filtername']}}" class="form-control floating">
							@endif 
						</div>
					</div>
					<div class="col-sm-3 col-xs-6">
						<div class="form-group form-focus select-focus">
							<label class="control-label">@lang('Division')</label>
							<select name="filterdivision" class="select floating">
								{{ $filter_value = $filteroptions['filterdivision'] }}
							
								 @if(count($groups)>0)
								 <option value={{ $filteroptions['filterdivision'] }}>@lang('Select') @lang('Division')</option>

									@foreach($groups as $group)
										<option value={{ $group->value }}> {{ $group->fulltext }} </option>
									@endforeach
								@endif 
							</select>
						</div>
					</div>
					<div class="col-sm-3 col-xs-6"> 
						<div class="form-group form-focus select-focus">
							<label class="control-label">@lang('Type')</label>
							<select name="filtertype" id="select" class="select floating"> 
								@if($filteroptions['filtertype']=='%')
									<option value={{ $filteroptions['filtertype'] }}>@lang('Select') @lang('Type')</option>
									@if(count($types)>0)
										@foreach($types as $type)
											<option value={{ $type->value }}> {{ $type->fulltext }} </option>
										@endforeach
									@endif
								@else
									<option value={{ $filteroptions['filtertype'] }}>{{ $types[$filteroptions['filtertype']]->fulltext }}</option>
									@if(count($types)>0)
										@foreach($types as $type)
											@if($type->value==$filteroptions['filtertype'])
												<option value='%'>@lang('Select') @lang('Type')</option>
											@else
												<option value={{ $type->value }}> {{ $type->fulltext }} </option>
											@endif
										@endforeach
									@endif
								@endif
								
							</select>
						</div>
					</div>
					<div class="col-sm-3 col-xs-6">  
						<button type="submit" class="btn btn-success btn-block" id="filter"> @lang('Filter') <i class="fa fa-filter" style="font-size:18px;"></i></button>  
					</div>
					</form>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table id="myTable" class="table table-striped table-hover custom-table datatable">
								<thead>
									<tr>
										<th style="width:12%">@lang('Name')</th>
										<th>@lang('E-Mail Address')</th>
										<th>@lang('Division')</th>
										<th>@lang('Creation date')</th>
										<th>@lang('Type')</th>
										<th>@lang('Status')</th>
										<th class="text-right">@lang('Action')</th>
									</tr>
								</thead>
								<tbody>
								@if(count($users)>0)
									@foreach($users as $user)
										{{ $permission = "" }}
										@if($user->assign_right == 1 && $user->delegate_right == 1)
											@php($permission = 'Assigner et déléguer')
										@elseif($user->assign_right == 1 && $user->delegate_right == 0)
											@php($permission = 'Assigner')
										@elseif($user->assign_right == 0 && $user->delegate_right == 1)
											@php ($permission = ('Déléguer'))
										@endif

										{{ $label = ''}}
										@if($user->is_permission == 1)
											@php($label = 'danger')
										@elseif($user->is_permission == 2)
											@php($label = 'info')
										@else
											@php($label = 'success')
										@endif

										{{ $status = ''}}
										{{ $status_label = ''}}
										{{ $change_status = ''}}
										@if($user->status == 0)
											@php($status = __('Inactive'))
											@php($change_status = __('Activate'))
											@php($status_label = 'danger')
										@else
											@php($status = __('Active'))
											@php($change_status = __('Deactivate'))
											@php($status_label = 'info')
										@endif
									
										<tr>
											<td>
												<h2>{{ $user->name }}<span>{{ $permission }}</span></h2>
											</td>
											<td>{{ $user->email }}</td>
											<td>{{ $user->group }}</td>
											<td value={{$user->created_at}}> {{ date_format($user->created_at, "Y/m/d") }}</td>
											<td><span class="label label-{{$label}}-border">{{$types[$user->is_permission]->fulltext}}</span></td>
											<td><span class="label label-{{$status_label}}-border">{{$status}}</span></td>
											<td class="text-right">
												<div class="dropdown">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="edit-user-{{ $user->id }}" name="edit-user"><i class="fa fa-pencil m-r-5"> </i>@lang('Edit')</a></li>
														<li><a href="change-status-user-{{ $user->id }}" name="change-status-user"><i class="fa fa-group m-r-5"> </i>{{$change_status}}</a></li>
														<li><a href="delete-user-{{ $user->id }}" name="delete-user"><i class="fa fa-eraser m-r-5"> </i>@lang('Delete')</a></li>
													</ul>
												</div>
											</td>
										</tr>
									@endforeach
								@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div id="delete_user" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">@lang('Delete') @lang('user')</h4>
						</div>
					</div>
				</div>
			</div>
@endsection

@section('customscript')

@endsection
