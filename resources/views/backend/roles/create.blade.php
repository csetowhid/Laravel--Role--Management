@extends('backend.layouts.app')
@section('title','Roles - Create')
@section('content')
<div class="mdl-grid mdl-grid--no-spacing dashboard">
    <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell--3-col-tablet mdl-cell--4-col-phone"></div>
    <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h1 class="mdl-card__title-text">Role Create</h1>
            </div>
            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone form__article">
                <form action="{{route('roles.store')}}" method="POST">
                    @csrf
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <input class="mdl-textfield__input" type="text" id="floating-first-name" name="name">
                        <label class="mdl-textfield__label" for="floating-first-name">Role Name</label>
                    </div>
               
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <h3 class="mdl-card__title-text" style="color: white;">Permission</h3>

                        <input type="checkbox" id="checkall" value="1">
                        <label style="margin-top: 5px;">All</label>
                        <hr>
                        @if(!empty($permissions))
                        {{-- @foreach($permissiongroups as $group)
                        <br>
                        <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article">
                            <input type="checkbox" style="margin: 5px;" value="{{$group->group_name}}">
                            <label style="margin-top: 5px;">{{$group->group_name}}</label>
                        </div>
                
                        @endforeach --}}
                        @foreach($permissions as $permission)
                        <br>
                        <input type="checkbox" name="permissions[]" style="margin: 5px;" value="{{$permission->name}}">
                        <label style="margin-top: 5px;">{{$permission->name}}</label>
                        @endforeach
                        @endif
                    </div>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green" type="submit">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $("#checkall").click(function(){
        if($(this).is(':checked')){
                 // check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
             }else{
                 // un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
             }
    });
</script>
@endsection