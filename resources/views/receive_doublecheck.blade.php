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
                        <h1 class="page-head-line">住宿生領取確認 </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                房卡/學生證發放
                            </div>
                            @if(isset($applications))
                            @foreach($applications as $application)
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    {{ Form::open(["id"=>"form1", "url"=>"/receive_submit", "method"=>"post"]) }}
                                    <div class="form-group">
                                        <label for="applicant">房號</label>
                                        <input type="text" value="{{$application->room}}" class="form-control" readonly/>
                                        <label for="applicant">問題類別</label>
                                        <input type="text" value="{{$application->content}}" class="form-control" readonly/>
                                        <label for="applicant">申請時間</label>
                                        <input type="text" value="{{$application->post_time}}" class="form-control" readonly/>
                                        <label for="applicant">處理人</label>
                                        <input type="text" value="{{$application->processer}}" class="form-control" readonly/>
                                        <label for="applicant">處理時間</label>
                                        <input type="text" value="{{$application->process_time}}" class="form-control" readonly/>
                                        <label for="applicant">發放人</label>
                                        <input type="text" class="form-control" name="giveman" id="giveman" placeholder="填寫你的名字 e.g. 楊所長" required="required" maxlength="50" />
                                        <input type="hidden" value="{{$application->id}}" class="form-control" id="id" name="id" readonly/>
                                    </div>
                                    <div class="form-group" align="center">
                                        <button type="submit" class="btn btn-primary">確認發放</button>
                                    </div>
                                    {{Form::close()}}
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <!-- CONTENT-WRAPPER SECTION END-->
        @include('baseload_js')
    </body>
</html>
