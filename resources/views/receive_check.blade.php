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
                                尚未領取名單
                            </div>
                            <table id="dataTable" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>房號</th>
                                        <th>問題類別</th>
                                        <th>申請時間</th>
                                        <th>處理人</th>
                                        <th>處理時間</th>
                                        <th>動作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($applications))
                                    @foreach($applications as $application)
                                    <tr>
                                        <td>{{ $application->room }}</td>
                                        @if(mb_strlen($application->content,'UTF-8')>10)
                                        <td>{{ mb_substr($application->content,0,10,"UTF-8") }}...</td>
                                        @else
                                        <td>{{ $application->content }}</td>
                                        @endif
                                        <td>{{ $application->post_time }}</td>
                                        <td>{{ $application->processer }}</td>
                                        <td>{{ $application->process_time }}</td>
                                        <td><a class="btn btn-success" href="/receive_doublecheck/{{ $application->id }}">確定發放</a></td>
                                    </tr>
                                    @endforeach
                                    <!--不到12欄就補到12欄 -->
                                    @for ($i = count($applications); $i < 12; $i++)
                                        <tr>
                                           <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                                        </tr>
                                    @endfor
                                    @endif
                                    <!-- 沒抓到值就給空表格 -->
                                    @if(!isset($applications))
                                        @for ($i = 0; $i < 12; $i++)
                                            <tr>
                                               <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                                           </tr>
                                        @endfor
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            {{ $applications->links() }}
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <!-- CONTENT-WRAPPER SECTION END-->
        @include('baseload_js')
    </body>
</html>
