<div class="card-box">
        <div class="row">
            <div class="col-md-8">
                <h3 class="card-title">Prochaine action</h3>
            </div>
            <div class="col-md-4">
                <h5>Par:</h5>
                {{-- TODO: This will show not userfullname, but act_userid_current --}}
                <a style="text-decorations:none; color:inherit;" class="dropdown-toggle user-link" title={{ $currentProjectUser }}>
                    <span class="user-img"><img class="img-circle" src="assets/img/user.jpg" width="40" alt={{ $currentProjectUser }}>
                    <span class="status online">
                    </span></span>
                    <span> {{ $currentProjectUser }}</span>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
            <h5>{{$nextAction}}</h5><br><br>
            </div>
        </div>
        {{ Form::hidden('_method', 'PUT') }}
        <div class="row">
            @if($oneButton)
                @if($buttonVerify)
                    <div class="col-md-12 text-center">
                        <button type="submit" name="subButton" value="{{$valueButtonS}}" class="btn btn-success">{{$textButtonS}}</button>
                    </div>
                @else
                    <div class="col-md-12 text-center">
                        <button type="submit" name="subButton" value="{{$valueButtonD}}" class="btn btn-danger">{{$textButtonD}}</button>
                    </div>
                @endif
            @else
                <div class="col-md-6 text-center">
                    <button type="submit" name="subButton" value="{{$valueButtonD}}" class="btn btn-danger">{{$textButtonD}}</button>
                </div>
                <div class="col-md-6 text-center">
                    <button type="submit" name="subButton" value="{{$valueButtonS}}" class="btn btn-success">{{$textButtonS}}</button>
                </div>
            @endif
        </div>
   
</div>