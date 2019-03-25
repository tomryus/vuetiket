@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">ISI SPG</div>
                <div class="card-body">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
