<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        @include('baseload_css')
    </head>
    <body>
        @include('baseload_navbar')
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">值班幹部/管理員登入</h1>
                    </div>
                </div>
                {{ Form::open(["id"=>"form1", "url"=>"/login", "method"=>"post"]) }}
                <div class="row">
                    <div class="col-md-3 col-md-offset-4">
                        <br />
                        <label>學號 / 帳號 : </label>
                        <input type="text" name="account" id="account" class="form-control" />
                        <br />
                        <div class="col-md-3 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">登入</button>
                        </div>
                    </div>
                </div>
                {{ csrf_field() }}
                {{Form::close()}}
            </div>
        </div>
        <!-- CONTENT-WRAPPER SECTION END-->
        @include('baseload_js')
    </body>
</html>
