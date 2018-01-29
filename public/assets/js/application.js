/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//清空表單函數
function clear(){
    $("#optionsRadios1").prop('checked', false);
    $("#optionsRadios2").prop('checked', false);
    $("#optionsRadios3").prop('checked', false);
    $("#optionsRadios4").prop('checked', false);
    $("#optionsRadios5").prop('checked', false);
    $("#optionsRadios6").prop('checked', false);
    $("#optionsRadios7").prop('checked', false);
    $("#content").val("");
    //只要有改變，就把所有div隱藏，元件取消勾選
    $("#catelog_other").hide();
    $("#catelog_net").hide();
    $("#catelog_card").hide();
}

//初始值
$("#catelog").ready(function() {
    clear();//清空表單
    $("#catelog_card").show();
    $("#optionsRadios1").prop('checked', true);//預設勾選第一項
});

$("#catelog").change(function() {
  clear();//清空表單
  if(this.value == "卡片"){
      $("#catelog_card").show();
      $("#optionsRadios1").prop('checked', true);//預設勾選第一項
  }else if(this.value == "網路"){
      $("#catelog_net").show();
      $("#optionsRadios5").prop('checked', true);//預設勾選第一項
  }else{
      $("#catelog_other").show();
  }
  
});

//當冷氣卡問題的Radiobox切換時
$('input[type=radio][name=optionsRadios]').change(function() {
    //如果是冷氣卡的問題，不加床號
    if($("input[name='optionsRadios']:checked").val() == 'card_3'){
        alert('test');
        $("#room").attr('pattern', "((A|B|a|b)\\d{3})");
        $("#room").attr('title', "請遵照格式 e.g. B211(冷氣卡不加床號)");
    }else{
        $("#room").attr('pattern', "(((A|B|a|b)\\d{3})-(\\d{1}))");//加上房床號的pattern
        $("#room").attr('title', "請遵照格式 e.g. B211-1，網路問題若為整房麻煩填寫1號床");
    }
});

//如果有訊息，3秒後關閉div
t = setTimeout("timedCount()",3000);
function timedCount(){
    $(".alert").hide();
}


