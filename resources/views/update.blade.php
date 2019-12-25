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
                <div class="title margin-left">Update Student</div>
                <div class="right"></div>
            </div>
        </div>
        <div class="page-content">
            @component('components.form')
                @slot('no')
                    {{ $student->no }}
                @endslot
                @slot('name')
                    {{ $student->name }}
                @endslot
                @slot('surname')
                    {{ $student->surname }}
                @endslot
                @slot('department')
                    {{ $student->department}}
                @endslot
                @slot('button')
                    Save
                @endslot

            @endcomponent
        </div>
    </div>
@endsection