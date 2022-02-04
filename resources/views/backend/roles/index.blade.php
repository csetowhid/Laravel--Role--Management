@extends('backend.layouts.app')
@section('title','Roles - List')
@section('content')
<div class="mdl-grid mdl-grid--no-spacing dashboard">
    <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell--3-col-tablet mdl-cell--4-col-phone"></div>
    <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card mdl-shadow--2dp">
            <div class="row">
                <div class="mdl-card__title" style="float:left;width:50%">
                    <h1 class="mdl-card__title-text">Role List</h1>
                </div>
                <div class="mdl-card__title" style="float:right;width:50%;">
                    <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green" href="{{route('roles.create')}}"style="margin-bottom:-9px;">
                        Role Create
                    </a>
                </div>
            </div>
            <div class="mdl-card__supporting-text no-padding">
                @if (!empty($roles))
                <table class="mdl-data-table mdl-js-data-table">
                    <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">#</th>
                            <th class="mdl-data-table__cell--non-numeric">Name</th>
                            <th class="mdl-data-table__cell--non-numeric">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric" style="width: 25%;">{{$loop->iteration}}</td>
                                <td class="mdl-data-table__cell--non-numeric" style="width: 35%;">{{$role->name}}</td>
                                <td class="mdl-data-table__cell--non-numeric" style="width: 40%;">
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-light-blue">
                                        Edit
                                    </button>
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection