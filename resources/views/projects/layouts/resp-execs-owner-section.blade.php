<div class="card-box">
        <h3 class="card-title">Demandeur: {{ $userFullName }}</h3>
        @include('include.messages')
        <div class="row">
            <div class="col-md-12">
                <div class="form-group form-focus select-focus">
                    {!! Html::decode(Form::label('actTitle', 'Titre', ['class' => 'control-label'])) !!}
                    <p id="actTitle-read-only" class="form-control"> {!! $project->act_title !!} </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-focus select-focus">
                    {!! Html::decode(Form::label('actClassif1', 'Classification', ['class' => 'control-label'])) !!}
                    <p id="actClassif1-read-only" class="form-control"> {!! $project->act_classif_1 !!} </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-focus select-focus">
                    {!! Html::decode(Form::label('actClassif2', 'Sous-classification', ['class' => 'control-label'])) !!}
                    <p id="actClassif2-read-only" class="form-control"> {!! $project->act_classif_2 !!} </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-focus select-focus">
                    {!! Html::decode(Form::label('actPriority', 'Priorité', ['class' => 'control-label'])) !!}
                    <p id="actPriority-read-only" class="form-control"> {!! $project->act_priority !!} </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-focus select-focus">
                    {!! Html::decode(Form::label('actDueDate', 'Échéance', ['class' => 'control-label'])) !!}
                    <p id="actDueDate-read-only" class="form-control"> {!! $project->act_due_date !!} </p>
                </div>
            </div>
            <div class="col-md-12">
                    {!! Html::decode(Form::label('actDescription-read-only', 'Description', ['class' => 'control-label'])) !!}
                    <p id="actDescription-read-only" class="form-control-static"> {!! $project->act_description !!} </p>
            </div>
        </div>
    </div>