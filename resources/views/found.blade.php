
<span id="col" hidden>{{ $column }}</span>
<span id="asc" hidden>{{ $asc }}</span>
<span id="page" hidden>{{ $page }}</span>
<div class = "list margin-vertical-half">  
    <ul class="striped">
        <li>
            <div class="item-content header">
                <div class="item-inner item-cell">
                    <div class="item-row">
                        <div id="hNo" class="item-cell col-20" onClick="arrange('no', '{{ $column }}', '{{ $asc }}', '{{ $page}}', '{{ $where }}')">Number</div>
                        <div id="hName" class="item-cell col-20" onClick="arrange('name', '{{ $column }}', '{{ $asc }}', '{{ $page}}', '{{ $where }}')">Name</div>
                        <div id="hSurname" class="item-cell col-20" onClick="arrange('surname', '{{ $column }}', '{{ $asc }}', '{{ $page}}', '{{ $where }}')">Surname</div>
                        <div id="hDepartment" class="item-cell col-20" onClick="arrange('department', '{{ $column }}', '{{ $asc }}', '{{ $page}}', '{{ $where }}')">Department</div>
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

<script>
    var updown = ('{{ $asc }}' == "asc")? "&nbsp;&#x25b2;" : "&nbsp;&#x25bc;";
    var column = '{{ $column }}';
    var header = document.getElementById("h" + column[0].toUpperCase() + column.slice(1));
    header.innerHTML += updown;
    header.style.color = "#8888ff";
</script>