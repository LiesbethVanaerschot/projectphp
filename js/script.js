$(document).ready(function(){
    var dagArray = ["maandag","dinsdag","woensdag","donderdag","vrijdag"];
    console.log(dagArray);
    $("#dag").text(dagArray[0]);

    var i = 0;
    console.log(dagArray[i]);

    $("#next").on("click",function(){
    	i = (i + 1) % dagArray.length;
    	$("#dag").text(dagArray[i]);

    	var dag = $("#dag").html();
    	console.log(dag);
    	
      var student = $(".user").html();
      console.log(student);

   		var request = $.ajax({
   			url: "./ajax/sendingvar.php",
   			type: "POST",
   			data: {dag : dag, student : student},
   			dataType: "html"
   		});
   		request.done(function(msg){
   			console.log("gestuurd!");
        //var json = msg;
        var json = jQuery.parseJSON(msg);
        console.log(typeof json);
        $.each(json, function(index, value){
          console.log(index);
          console.log(value.lesBegin);

          if(value.lesBegin === '08:30'){
            console.log('php');
            $('.lessenrooster .td').html(value.lesNaam);
          }
          
          /*$.each(value, function(key, value){
            document.write(value);
          });*/
          
        });
        //console.log(msg);
   		});
    });
    
    $("#prev").on("click",function(){
    	if(i>0)
    	{
    		i = (i-1);
    		$("#dag").text(dagArray[i]);

    		var dag = $("#dag").html();
   			console.log(dag);
    	}
    });


});