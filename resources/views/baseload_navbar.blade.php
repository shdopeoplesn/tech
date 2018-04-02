<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">
                <img src="{{ URL::asset('assets/img/logo.png') }}" />
            </a>

        </div>

        <div class="left-div">
            <div class="user-settings-wrapper">
                <ul class="nav">
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li>
                            @if($this_script == 'receive_check')
                                <a class="menu-top-active" href="receive_check">住宿生領取確認</a>
                            @else
                                <a href="receive_check">住宿生領取確認</a>
                            @endif
                        </li>
                        <li>
                            @if($this_script == 'application')
                                <a class="menu-top-active"  href="application">問題受理</a>
                            @else
                                <a href="application">問題受理</a>
                            @endif
                        </li>
                        <li>
                            @if($this_script == 'login')
                                <a class="menu-top-active"  href="login">資訊組登入</a>
                            @else
                                <a href="login">資訊組登入</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- MENU SECTION END-->