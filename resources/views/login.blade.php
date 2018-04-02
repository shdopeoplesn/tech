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
                        <h1 class="page-head-line">資訊組登入</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-md-offset-4">
                          <h4>輸入帳號密碼</h4>
                         <br />
                          <label>帳號 : </label>
                             <input type="text" class="form-control" />
                             <label>密碼 :  </label>
                             <input type="password" class="form-control" />
                             <hr />
                             <a href="index.html" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;登入 </a>&nbsp;
                     </div>
                </div>
            </div>
        </div>
        <!-- CONTENT-WRAPPER SECTION END-->
        @include('baseload_js')
    </body>
</html>
