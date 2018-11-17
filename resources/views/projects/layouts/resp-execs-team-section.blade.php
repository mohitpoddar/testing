<div class="card-box">
        <h3 class="card-title">Status et équipe</h3>
        <h5>Statut: non defini</h5><br><br>
        <div class="row">
            <div class="col-sm-2">
                {{-- Look for a better way to display this --}}
                <h5>Avancement:</h5>
            </div>
            <div class="col-sm-8"></div>
        </div>
        
        <div class="row">
            <div class="col-md-10">
                <div class="progress progress-xs m-b-8">
                <div class="progress-bar progress-bar-success" role="progressbar" data-toggle="tooltip" title="" style="width: {{$project->act_completion_pct}}%" data-original-title="{{$project->act_completion_pct}}%"></div>
                </div>
            </div>
            <div class="col-md-2">
                    {{ Form::text('actCompletion', $project->act_completion_pct, ['class' => 'form-control floating']) }}
            </div>
        </div> <br><br>
        
        <div class="row">
            <div class="col-md-6">
                <h5>Responsable: {{ $responsible }}</h5>
            </div>
            <div class="col-md-6">
                    <div class="form-group form-focus select-focus">
                    {{-- Shows on pick list users that can act as executor1, or 2 --}}
                        @if(!$isExecutor2)
                        {!! Html::decode(Form::label('actExecutor', 'Délégation d\'exécution:', ['class' => 'control-label'])) !!}
                        <select name="actDelegate" class="select from-control floating">
                            <option value="select"> Sélectionner </option>
                            @foreach($usersDelegate as $delegate)
                                @if($delegate->_id == $project->act_userid_executor1 || $delegate->_id == $project->act_userid_executor2)
                                    <option selected value="{{ $delegate->_id }}">{{ $delegate->user_full_name }}</option>
                                @else
                                    <option value="{{ $delegate->_id }}">{{ $delegate->user_full_name }}</option>
                                @endif
                            @endforeach 
                        @endif 
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                @if($executor1 != null && $executor2 != null)
                    <h5>Exécutants: {{$executor1}}, {{$executor2}} </h5>
                @elseif($executor1 != null)
                    <h5>Exécutants: {{$executor1}}</h5>
                @elseif($executor2 != null)
                    <h5>Exécutants: {{$executor2}} </h5>
                @else
                @endif
            </div>
            <div class="col-md-12">
                {{-- TODO: Only editable if user is responsible --}}
                        @if($isResponsible)
                        <div class="form-group form-focus">
                            {!! Html::decode(Form::label('actFolder', 'Répertoire de travail', ['class' => 'control-label'])) !!}
                            {{ Form::text('actFolder', $project->act_folder, ['class' => 'form-control floating']) }}
                        </div>
                        @else
                        <div class="form-group form-focus select-focus">
                            {!! Html::decode(Form::label('actFolder', 'Répertoire de travail', ['class' => 'control-label'])) !!}
                            <p id="actDueDate-read-only" class="form-control"> {!! $project->act_folder !!} </p>
                        </div>
                        @endif
            </div>
            <div class="col-md-12">
                {{-- TODO: Only editable if user is responsible --}}
                <div class="form-group form-focus select-focus">
                    @if($isResponsible)
                    {!! Html::decode(Form::label('actPlannedDate', 'Date planifiée de livraison <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                    {{ Form::date('actPlannedDate', $project->act_planned_date, ['class' => 'form-control']) }}
                    @else
                    {!! Html::decode(Form::label('actPlannedDate', 'Date planifiée de livraison', ['class' => 'control-label'])) !!}
                    <p id="actDueDate-read-only" class="form-control"> {!! $project->act_planned_date !!} </p>
                    @endif
                </div>
            </div>
        </div>
    </div>