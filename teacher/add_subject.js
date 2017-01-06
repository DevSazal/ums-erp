$(document).ready(function(){
$("#course_submit").click(function(){
var var1 = $("#s_id").val();
var var2 = $("#semester_no").val();
var var3 = $("#course_code").val();



// Returns successful data submission message when the entered information is stored in database.
$.post("course_add_script.php",{ sid_: var1, s_: var2, c_code_: var3},
			function(data) {
      //  swal("Done :)", data, "success");
		//	alert(data);
			$('#addcourse_form')[0].reset(); //To reset form fields
			});



});
});
