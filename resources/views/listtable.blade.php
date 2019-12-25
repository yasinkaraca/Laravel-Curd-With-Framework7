@extends('layouts.app')

@section('page')   
    
    <div data-page = "index" class = "page">
        <div class="navbar">
            <div class="navbar-bg"></div>
            <div class="navbar-inner">
                <div class="left"></div>
                <div class="title margin-left">Students</div>
                <div class="right">
                    <a href="newForm?col={{ $column }}&asc={{ $asc }}&page={{ $page }}&where={{ $where }}" class="link external icon-only color-black">
                        <i class="icon f7-icons">person_crop_circle_fill_badge_plus</i>
                    </a>
                    <a class="link icon-only searchbar-enable" data-searchbar=".searchbar">
                        <i class="icon f7-icons">search</i>  
                    </a>
                </div>
                <form class="searchbar searchbar-expandable no-margin no-padding">
                    <div class="searchbar-inner">
                        <div class="searchbar-input-wrap">
                            <input id="sInput" type="search" placeholder="Search" />
                            <i class="searchbar-icon"></i>
                            <span class="input-clear-button"></span>
                        </div>
                        <span class="searchbar-disable-button">Cancel</span>
                    </div>
                </form>
            </div>
        </div>
        <div class = "toolbar toolbar-bottom">  
            <div id = "links" class = "toolbar-inner">
                {{ $students->links('pagination::default', ['where' => $where]) }}
            </div>  
        </div>
        <div id = "content" class = "page-content">
            
            <span id="col" hidden>{{ $column }}</span>
            <span id="asc" hidden>{{ $asc }}</span>
            <span id="page" hidden>{{ $page }}</span>
            <div class = "list margin-vertical-half">  
                <ul class="striped">
                    <li>
                        <div class="item-content header">
                            <div class="item-inner item-cell">
                                <div class="item-row">
                                    <div id="hNo" class="item-cell col-20" onClick="arrange('no', '{{ $column }}', '{{ $asc }}', '{{ $page }}', '{{ $where }}')">Number</div>
                                    <div id="hName" class="item-cell col-20" onClick="arrange('name', '{{ $column }}', '{{ $asc }}', '{{ $page }}', '{{ $where }}')">Name</div>
                                    <div id="hSurname" class="item-cell col-20" onClick="arrange('surname', '{{ $column }}', '{{ $asc }}', '{{ $page }}', '{{ $where }}')">Surname</div>
                                    <div id="hDepartment" class="item-cell col-20" onClick="arrange('department', '{{ $column }}', '{{ $asc }}', '{{ $page }}', '{{ $where }}')">Department</div>
                                    <div class="item-cell col-10 no-margin no-padding"></div>
                                    <div class="item-cell col-10 no-margin no-padding"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @foreach($students as $student)
                        <li>
                            <div class="item-content">
                                <div class="item-inner item-cell">
                                    <div class="item-row">
                                        <div class="item-cell col-20">{{ $student->no }}</div>
                                        <div class="item-cell col-20">{{ $student->name }}</div>
                                        <div class="item-cell col-20">{{ $student->surname }}</div>
                                        <div class="item-cell col-20">{{ $student->department }}</div>
                                        <div class="item-cell col-10 no-margin no-padding">
                                            <a href="{{ url('update?col=' . $column . '&asc=' . $asc . '&page=' . $page . '&where=' . $where, ['no' => $student->no]) }}" class="link external icon-only color-black float-right">
                                                <i class="icon f7-icons">pencil_circle_fill</i>
                                            </a>
                                        </div>
                                        <div class="item-cell col-10 no-margin no-padding">
                                            <a href="{{ route('deleteStudent', ['no' => $student -> no]) }}" class="link external icon-only color-black float-right">
                                                <i class="icon f7-icons">trash_circle_fill</i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>  
            </div>  
        </div><!--page-content-->
        
    </div><!--page-->
@endsection
