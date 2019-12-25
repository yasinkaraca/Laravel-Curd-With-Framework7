@extends('layouts.app')

@section('page')
    <div class="page">
        <div class="navbar">
            <div class="navbar-bg"></div>
            <div class="navbar-inner">
                <div class="left">
                    <a href="/?col={{ $column }}&asc={{ $asc }}&page={{ $page }}&where={{ $where }}" class="link external">
                        <i class="icon icon-back"></i>
                        <span class="if-not-md">Back</span>
                    </a>
                </div>
                <div class="title">
                    <i class="icon f7-icons">person_fill</i>
                    <span>New Student</span>
                </div>
                <div class="right"></div>
            </div>
        </div>
        <div class="page-content">
            @component('components.form')
                @slot('no')
                    {{ $nextnumber }}
                @endslot
                @slot('name')
                @endslot
                @slot('surname')
                @endslot
                @slot('department')
                @endslot
                @slot('button')
                    Add
                @endslot

            @endcomponent
        </div>
    </div>
@endsection

