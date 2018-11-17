<div class="card-box">
        <h3 class="card-title">Status et équipe</h3>
        <h5>Statut: non defini</h5><br><br>
        <h5>Avancement: 0%</h5>
        <div class="progress progress-xs m-b-0">
            <div class="progress-bar progress-bar-success" role="progressbar" data-toggle="tooltip" title="" style="width: 0%" data-original-title="0%"></div>
        </div><br><br>
        
        <div class="row">
            <div class="col-md-6">
                <h5>Responsable: {{ $responsible }}</h5>
            </div>
            <div class="col-md-6">
                <div class="form-group form-focus select-focus">
                    {!! Html::decode(Form::label('actReponsible', 'Changement de responsable:', ['class' => 'control-label'])) !!}
                    @if($project->act_status_owner == 2 || $project->act_status_owner == 3)
                        <select name="actResponsible" class="select from-control floating" disabled="disabled">
                    @else
                        <select name="actResponsible" class="select from-control floating">
                    @endif
                        <option value="select"> Sélectionner </option>
                        @foreach ($usersResponsible as $responsible)
                            @if($responsible->_id == $project->act_userid_responsible)
                            <option selected value="{{ $responsible->_id }}">{{ $responsible->user_full_name }}</option>
                            @else
                            <option value="{{ $responsible->_id }}">{{ $responsible->user_full_name }}</option>
                            @endif
                        @endforeach  
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
                    <div class="form-group form-focus">
                        {!! Html::decode(Form::label('actFolder', 'Répertoire de travail', ['class' => 'control-label'])) !!}
                    @if($project->act_status_owner == 2 || $project->act_status_owner == 3)
                        {{ Form::text('actFolder', $project->act_folder, ['class' => 'form-control floating', 'readonly' => 'true']) }}
                    @else
                        {{ Form::text('actFolder', $project->act_folder, ['class' => 'form-control floating']) }}       
                    @endif             
                    </div>
            </div>
        </div>
    </div>