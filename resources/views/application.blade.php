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
                        <h1 class="page-head-line">問題受理 </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                事件申請
                            </div>
                            @if(Session::has('response'))
                            @if(Session::get('response') == 'true')
                            <div class="alert alert-success">
                                事件申請成功！
                            </div>
                            @endif
                            @if(Session::get('response') == 'false')
                            <div class="alert alert-danger">
                                傳送參數有誤！
                            </div>
                            @endif                              
                            @endif
                            <div class="panel-body">
                                {{ Form::open(["id"=>"form1", "url"=>"/application_submit", "method"=>"post"]) }}
                                <div class="form-group">
                                    <label for="applicant">交代人</label>
                                    <input type="text" class="form-control" name="applicant" id="applicant" placeholder="填寫你的名字 e.g. 楊銓興a.k.a.煞氣銓哥" required="required" maxlength="50" />
                                </div>
                                <div class="form-group">
                                    <label for="date">房號/床號</label>
                                    <!--<input type="class="form-control" id="exampleInputPassword1" placeholder="Password" />-->
                                    <input type="text" class="form-control" name="room" id="room" placeholder="e.g. B211-1，冷氣卡可不加床號" 
                                           required="required" pattern="(((A|B|a|b)\d{3})-(\d{1}))" title="請遵照格式 e.g. B211-1，冷氣卡可不加床號" maxlength="50"/>
                                </div>
                                <div class="form-group">
                                    <label>選擇問題</label>
                                    <select class="form-control" id="catelog" >
                                        <option value="卡片">卡片</option>
                                        <option value="網路">網路</option>
                                        <option value="其他">其他</option>
                                    </select>
                                </div>
                                <hr />
                                <div id="catelog_card">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="card_1" checked />
                                            補發學生證登錄
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="card_2" />
                                            房卡遺失/毀損
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="card_3" />
                                            冷氣卡遺失/毀損
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios4" value="card_4" />
                                            餘額加值失敗
                                        </label>
                                    </div>
                                </div>
                                <div id="catelog_net">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios5" value="net_1" checked />
                                            網路線遺失
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios6" value="net_2" />
                                            網路線毀損
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios7" value="net_3" />
                                            網路狀態異常
                                        </label>
                                    </div>
                                </div>
                                <div id="catelog_other">
                                    <textarea id="content" name="content" class="form-control" rows="3" placeholder="請詳細說明問題狀況，最多300個字" style="resize: none;" maxlength="300"></textarea>
                                    <br>
                                </div>
                                <button type="submit" class="btn btn-default">送出</button>
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                待處理事件(資訊組趕工中)
                            </div>
                            <table id="dataTable" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>交代人</th>
                                        <th>房號</th>
                                        <th>問題類別</th>
                                        <th>申請時間</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($applications))
                                    @foreach($applications as $application)
                                    <tr>
                                        <td>{{ $application->applicant }}</td>
                                        <td>{{ $application->room }}</td>
                                        @if(mb_strlen($application->content,'UTF-8')>10)
                                        <td>{{ mb_substr($application->content,0,10,"UTF-8") }}...</td>
                                        @else
                                        <td>{{ $application->content }}</td>
                                        @endif
                                        <td>{{ $application->post_time }}</td>
                                    </tr>
                                    @endforeach
                                    <!--不到12欄就補到12欄 -->
                                    @for ($i = count($applications); $i < 12; $i++)
                                        <tr>
                                           <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                                       </tr>
                                    @endfor
                                    @endif
                                    <!-- 沒抓到值就給空表格 -->
                                    @if(!isset($applications))
                                        @for ($i = 0; $i < 12; $i++)
                                            <tr>
                                               <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
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
