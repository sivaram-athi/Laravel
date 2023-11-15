<div class="bg-dark container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="p-3 text-white bg-dark" style="height:94.2vh;">
                <ul class="nav nav-pills flex-column ">
                    <li>
                        <a href="#!" class="nav-link text-white hel">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#!page1" class="nav-link text-white hel">
                            user
                        </a>
                    </li>
                    <li>
                        <a href="#!page2" class="nav-link text-white hel">
                            Upload
                        </a>
                    </li>
                    <li>
                        <a href="#!page3" class="nav-link text-white hel">
                            Forms
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <ng-view></ng-view>
        </div>
    </div>
</div>