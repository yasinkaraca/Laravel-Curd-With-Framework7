
<form class="list form-store-data" id="mForm">
    <ul>
        <li>
            <div class="item-content item-input">
                <div class="item-inner">
                    <div class="item-title item-label">No</div>
                    <div class="item-input-wrap">
                        <input type="text" name="no" value="{{ $no }}" disabled>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="item-content item-input">
                <div class="item-inner">
                    <div class="item-title item-label">Name</div>
                    <div class="item-input-wrap">
                        <input type="text" name="name" value="{{ $name }}">
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="item-content item-input">
                <div class="item-inner">
                    <div class="item-title item-label">Surname</div>
                    <div class="item-input-wrap">
                        <input type="text" name="surname" value="{{ $surname }}">
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="item-content item-input">
                <div class="item-inner">
                    <div class="item-title item-label">Department</div>
                    <div class="item-input-wrap">
                        <input type="text" name="department" value="{{ $department }}">
                    </div>
                </div>
            </div>
        </li>
    </ul>
</form>
<div class="block block-strong row">
    <div class="col"><a class="button link reset-form" href="#">Clear</a></div>
    <div class="col"><a class="button convert-form-to-data" href="#">{{ $button }}</a></div>
</div>