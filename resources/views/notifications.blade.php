@extends('layouts.global')

@section('content')
            <div class="content container-fluid">
				<div class="row">
					<div class="col-xs-4">
						<h4 class="page-title">{{ $title }}</h4>
					</div>
					<div class="col-xs-8 text-right m-b-30">
                        <ul class="nav navbar-nav pull-right chat-menu">
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="notifications-unread">@lang('Unread notifications')</a></li>
                                    <li><a href="notifications-all">@lang('All notifications')</a></li>
                                </ul>
                            </li>
                        </ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table id="myTable" class="table table-striped table-hover custom-table datatable">
								<thead>
									<tr>
										<th style="width:12%">@lang('Title')</th>
										<th>@lang('Description')</th>
										<th>@lang('Creation date')</th>
										<th>@lang('Status')</th>
										<th class="text-right">@lang('Action')</th>
									</tr>
								</thead>
								<tbody>
								@switch($filterread)
									@case('unread')
										@if(count(Auth::user()->unreadNotifications)>0)
											@foreach(Auth::user()->unreadNotifications as $notif)
												<tr>
													<td><b>{{$notif->data['title']}}</b></td>
													<td><b>{{$notif->data['detail']}}</b></td>
													<td value={{$notif->created_at}}> {{ date_format($notif->created_at, "Y/m/d") }}</td>
													@if(is_null($notif->read_at))
														@php($label = 'info')
														<td><span class="label label-info-border">Unread</span></td>
														<td class="text-right">
															<div class="dropdown">
																<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
																<ul class="dropdown-menu pull-right">
																	<li><a href="notification-markasread-{{ $notif->id }}" name="markasread"><i class="fa fa-eye m-r-5"> </i>Mark as read</a></li>
																	<li><a href="notification-delete-{{ $notif->id }}" name="delete"><i class="fa fa-ban m-r-5"> </i>@lang('Delete')</a></li>
																</ul>
															</div>
														</td>
													@else
														<td><span class="label label-success-border">Read</span></td>
														<td class="text-right">
															<div class="dropdown">
																<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
																<ul class="dropdown-menu pull-right">
																	<li><a href="notification-markasunread-{{ $notif->id }}" name="markasunread"><i class="fa fa-eye-slash m-r-5"> </i>Mark as unread</a></li>
																	<li><a href="notification-delete-{{ $notif->id }}" name="delete"><i class="fa fa-ban m-r-5"> </i>@lang('Delete')</a></li>
																</ul>
															</div>
														</td>
													@endif
												</tr>
											@endforeach
										@endif
										@break

									@case('all')
										@if(count(Auth::user()->Notifications)>0)
											@foreach(Auth::user()->Notifications as $notif)
												<tr>
												@if(is_null($notif->read_at))
													<td><b>{{$notif->data['title']}}</b></td>
													<td><b>{{$notif->data['detail']}}</b></td>
													@else
												    <td>{{$notif->data['title']}}</td>
													<td>{{$notif->data['detail']}}</td>
							@endif
													<td value={{$notif->created_at}}> {{ date_format($notif->created_at, "Y/m/d") }}</td>
													@if(is_null($notif->read_at))
														@php($label = 'info')
														<td><span class="label label-info-border">Unread</span></td>
														<td class="text-right">
															<div class="dropdown">
																<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
																<ul class="dropdown-menu pull-right">
																	<li><a href="notification-markasread-{{ $notif->id }}" name="markasread"><i class="fa fa-eye m-r-5"> </i>@lang('Mark as read')</a></li>
																	<li><a href="notification-delete-{{ $notif->id }}" name="delete"><i class="fa fa-ban m-r-5"> </i>@lang('Delete')</a></li>
																</ul>
															</div>
														</td>
													@else
												
													<td value={{$notif->created_at}}> {{ date_format($notif->created_at, "Y/m/d") }}</td>
														<td><span class="label label-success-border">Read</span></td>
														<td class="text-right">
															<div class="dropdown">
																<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
																<ul class="dropdown-menu pull-right">
																	<li><a href="notification-markasunread-{{ $notif->id }}" name="markasunread"><i class="fa fa-eye-slash m-r-5"> </i>@lang('Mark as unread')</a></li>
																	<li><a href="notification-delete-{{ $notif->id }}" name="delete"><i class="fa fa-ban m-r-5"> </i>@lang('Delete')</a></li>
																</ul>
															</div>
														</td>
													@endif
												</tr>
											@endforeach
										@endif
										@break
								@endswitch

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
@endsection

@section('customscript')

@endsection