$(function() {
    $("#form").submit(function() {
      var array =[];
      if($('#name').val() == '' || $('#name').val().length > 10) {
       array.push("氏名は必須入力です。10文字以内でご入力ください");  
      }
  
      if($('#kana').val() == '' || $('#kana').val().length > 10) {
        array.push("ふりがなは必須入力です。10文字以内でご入力ください");
      }
  
      if(isNaN($('#tel').val())) {
        array.push("電話番号は0-9の数字のみでご入力ください");
      }
  
      var reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/;
      if(!reg.test($('#email').val())) {                                    
        array.push("メールアドレスは正しくご入力ください"); 
      }
  
      if($('#body').val() == '') {
        array.push("お問合せ内容は必須入力です。"); 
       }
       
      if (array.length) {
        alert(array.join('\n'));
      }
    });
  });
  