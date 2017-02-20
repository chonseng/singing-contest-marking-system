(function(){
	// $(".message").addClass("alert-box");
	// $(".message").addClass("success");
	// $(".message").addClass("radius");

	// $("#marking-form").submit(function(){
	// 	var is_correct = true;
		

	// 	if ($("#skill").val().match(/^([1-9]|10)$/) == null) {
	// 		is_correct = false;
	// 		$("#skill").addClass("invalid");
	// 	}
	// 	if ($("#interpretation").val().match(/^([1-9]|10)$/) == null) {
	// 		is_correct = false;
	// 		$("#interpretation").addClass("invalid");
	// 	}
	// 	if ($("#style").val().match(/^([1-9]|10)$/) == null) {
	// 		is_correct = false;
	// 		$("#style").addClass("invalid");
	// 	}
	// 	if ($("#creativity").val().match(/^([1-9]|10)$/) == null) {
	// 		is_correct = false;
	// 		$("#creativity").addClass("invalid");
	// 	}

	// 	if (!is_correct) return false;
	// })
})();

$( document ).ready(function() {
  $("#marking-form").submit(function(){
  	if( $("#singer_id").val()<=0) {
  		alert("'參賽者編號'輸入錯誤！");
  		$("#singer_id").focus();
  		return false;
  	}
  	if( $("#skill").val()<=0 || $("#skill").val()>40 ) {
  		alert("'歌唱技巧'的分數輸入錯誤！(範圍:1-40)");
  		$("#skill").focus();
  		return false;
  	}
  	if( $("#interpretation").val()<=0 || $("#interpretation").val()>40 ) {
  		alert("'歌曲詮釋'的分數輸入錯誤！(範圍:1-40)");
  		$("#interpretation").focus();
  		return false;
  	}
  	if( $("#style").val()<=0 || $("#style").val()>10 ) {
  		alert("'個人台風'的分數輸入錯誤！(範圍:1-10)");
  		$("#style").focus();
  		return false;
  	}
  	if( $("#creativity").val()<=0 || $("#creativity").val()>10 ) {
  		alert("'個人創意'的分數輸入錯誤！(範圍:1-10)");
  		$("#creativity").focus();
  		return false;
  	}
  })

  $("input[type='range']").on('input',function(){
    console.log($(this).val());
    console.log($(this).children());
  })

  $("#deleteall").click(function(){
    var result = window.prompt("Type 'delete' in this box to delete:");
    if (result != "delete") {
      window.alert("Action Canceled.")
      return false;
    }
  })
  $("#newsingers").click(function(){
    var result = window.prompt("Type 'renew' in this box to update the singers' information:");
    if (result != "renew") {
      window.alert("Action Canceled.")
      return false;
    }
  })
  $(".deleteMark").click(function(){
    if (!window.confirm("Are you sure?")) {
      return false;
    }
  })
});