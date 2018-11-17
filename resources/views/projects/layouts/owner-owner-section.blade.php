<div class="card-box">
        <h3 class="card-title">Demandeur: {{ $userFullName }}</h3>
        @include('include.messages')
        <div class="row">
            <div class="col-md-12">
                <div class="form-group form-focus">
                    {!! Html::decode(Form::label('actTitle', 'Titre <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                    @if($project->act_status_owner == 2 || $project->act_status_owner == 3)
                        {{ Form::text('actTitle', $project->act_title, ['class' => 'form-control floating', 'readonly' => 'true']) }}
                    @else
                        {{ Form::text('actTitle', $project->act_title, ['class' => 'form-control floating']) }}
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-focus select-focus">
                    {!! Html::decode(Form::label('actClassif1', 'Classification <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                    @if($project->act_status_owner == 2 || $project->act_status_owner == 3)
                        {{ Form::select('actClassif1', ['Classif 1' => 'Classif 1'], $project->act_classif_1, ['class' => 'select form-control floating', 'disabled' => 'disabled']) }}
                    @else
                        {{ Form::select('actClassif1', ['Classif 1' => 'Classif 1'], $project->act_classif_1, ['class' => 'select form-control floating']) }}
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-focus select-focus">
                    {!! Html::decode(Form::label('actClassif2', 'Sous-classification', ['class' => 'control-label', 'readonly'])) !!}
                    @if($project->act_status_owner == 2 || $project->act_status_owner == 3)
                        {{ Form::select('actClassif2', ['Classif 2' => 'Classif 2', 'Classif 4' => 'Classif 4'], $project->act_classif_2, ['class' => 'select form-control floating', 'disabled' => 'disabled']) }}
                    @else
                        {{ Form::select('actClassif2', ['Classif 2' => 'Classif 2', 'Classif 4' => 'Classif 4'], $project->act_classif_2, ['class' => 'select form-control floating']) }}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-focus select-focus">
                    {!! Html::decode(Form::label('actPriority', 'Priorité <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                    @if($project->act_status_owner == 2 || $project->act_status_owner == 3)
                        {{ Form::select('actPriority', ['1' => 'Normal', '0' => 'Low', '2' => 'High', '3' => 'Urgent'], $project->act_priority, ['class' => 'select form-control floating', 'disabled' => 'disabled']) }}
                    @else
                        {{ Form::select('actPriority', ['1' => 'Normal', '0' => 'Low', '2' => 'High', '3' => 'Urgent'], $project->act_priority, ['class' => 'select form-control floating']) }}
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-focus select-focus">
                    {!! Html::decode(Form::label('actDueDate', 'Échéance <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                    @if($project->act_status_owner == 2 || $project->act_status_owner == 3)
                        {{ Form::date('actDueDate', $project->act_due_date, ['class' => 'form-control', 'readonly' => 'true']) }}
                    @else
                        {{ Form::date('actDueDate', $project->act_due_date, ['class' => 'form-control']) }}
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                {!! Html::decode(Form::label('actDescription', 'Description <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                @if($project->act_status_owner == 2 || $project->act_status_owner == 3)
                    {{ Form::textarea('actDescription', $project->act_description, ['id' => 'project-description', 'class' => 'form-control', 'readonly' => 'true']) }}
                @else
                    {{ Form::textarea('actDescription', $project->act_description, ['id' => 'project-description', 'class' => 'form-control']) }}            
            @endif
            </div> <br><br>
            <div class="col-md-12">
                <div class="form-group form-focus">
                    {!! Html::decode(Form::label('actReference', 'Référence', ['class' => 'control-label'])) !!}
                    @if($project->act_status_owner == 2 || $project->act_status_owner == 3)
                        {{ Form::text('actReference', $project->act_reference, ['class' => 'form-control floating', 'readonly' => 'true']) }}
                    @else
                        {{ Form::text('actReference', $project->act_reference, ['class' => 'form-control floating']) }}
                    @endif
                </div>
            </div>
        </div>
    </div>