$(document).ready(function(){
    var dagArray = ["maandag","dinsdag","woensdag","donderdag","vrijdag"];
    // console.log(dagArray);
    $("#dag").text(dagArray[0]);

    var i = 0;
    // console.log(dagArray[i]);

    var nummer = window.location.href.slice(window.location.href.indexOf('?') + 1);
    console.log(nummer);

//FUNCTIES
//reset functie uitschrijven
  var resetschedule = function(){
        $('.lessenrooster .td-lesnaam').html(" ");
        $('.lessenrooster .td-lokaal').html(" ");
        $('.lessenrooster .td-docent').html(" ");
    }
//getschedule functie
  var getschedule = function(){
    var dag = $("#dag").html();
    // console.log(dag);
        
    var student = $(".user").html();

    console.log(student);
    var nummer = window.location.href.slice(window.location.href.indexOf('?') + 1);
    //console.log(nummer);
    arrayRnummer = nummer.split('=');
    rNummer = arrayRnummer[1];
    //console.log(rNummer);

    var request = $.ajax({
          url: "./ajax/sendingvar.php",
          type: "POST",
          data: {dag : dag, rNummer: rNummer},
          dataType: "html"
        });
        request.done(function(msg){

          var json = jQuery.parseJSON(msg);
          // console.log(json);
          // iets met als json === "" alle text in tabel weg 
          // als json !== "" $.each en dan met switch case tabel invullen.
            if(json.length){
              $.each(json, function(index, value){
                // console.log(index);
                // console.log(value.lesBegin);
                // console.log(value);
                var lesBegin = value.lesBegin;
                var lesEinde = value.lesEind;
                var beginString = lesBegin.split(':');
                var eindeString = lesEinde.split(':');
                var beginUur = new Date('2014', '05', '07', beginString[0], beginString[1]);
                var eindUur = new Date('2014', '05', '07', eindeString[0], eindeString[1]);

                var begin = $('.td-beginuur').html();
                var eind = $('.td-einduur').html();

                // console.log(value.lesNaam);
                // console.log(new Date('2014', '05', '07', '08', '30').getTime());
                // console.log(beginUur.getTime());
                // console.log(new Date('2014', '05', '07', '09', '30').getTime());
                // console.log('einduur ' + eindUur.getTime());

                //OPLOSSING DIE ERVOOR ZORGT DAT VAKKEN ZOALS PROJECT MET MEERDERE LESBLOKKEN OP ELK LESBLOK WORDT GETOOND
                if(new Date('2014', '05', '07', '08', '30').getTime() >= beginUur.getTime() && new Date('2014', '05', '07', '08', '30').getTime() < eindUur.getTime()) {
                  $('.l1').html(value.lesNaam);
                  $('.lo1').html(value.lesLokaal);
                  $('.d1').html(value.docentNaam);
                }
                // NIETINGIT
                if(new Date('2014', '05', '07', '09', '30').getTime() >= beginUur.getTime() && new Date('2014', '05', '07', '09', '30').getTime() < eindUur.getTime()) {
                  $('.l2').html(value.lesNaam);
                  $('.lo2').html(value.lesLokaal);
                  $('.d2').html(value.docentNaam);
                }
                if(new Date('2014', '05', '07', '10', '45').getTime() >= beginUur.getTime() && new Date('2014', '05', '07', '10', '45').getTime() < eindUur.getTime()) {
                  $('.l4').html(value.lesNaam);
                  $('.lo4').html(value.lesLokaal);
                  $('.d4').html(value.docentNaam);
                }
                if(new Date('2014', '05', '07', '11', '45').getTime() >= beginUur.getTime() && new Date('2014', '05', '07', '11', '45').getTime() < eindUur.getTime()) {
                  $('.l5').html(value.lesNaam);
                  $('.lo5').html(value.lesLokaal);
                  $('.d5').html(value.docentNaam);
                }
                if(new Date('2014', '05', '07', '13', '45').getTime() >= beginUur.getTime() && new Date('2014', '05', '07', '13', '45').getTime() < eindUur.getTime()) {
                  $('.l7').html(value.lesNaam);
                  $('.lo7').html(value.lesLokaal);
                  $('.d7').html(value.docentNaam);
                }
                if(new Date('2014', '05', '07', '14', '45').getTime() >= beginUur.getTime() && new Date('2014', '05', '07', '14', '45').getTime() < eindUur.getTime()) {
                  $('.l8').html(value.lesNaam);
                  $('.lo8').html(value.lesLokaal);
                  $('.d8').html(value.docentNaam);
                }
                if(new Date('2014', '05', '07', '16', '00').getTime() >= beginUur.getTime() && new Date('2014', '05', '07', '16', '00').getTime() < eindUur.getTime()) {
                  $('.l10').html(value.lesNaam);
                  $('.lo10').html(value.lesLokaal);
                  $('.d10').html(value.docentNaam);
                }
                if(new Date('2014', '05', '07', '17', '00').getTime() >= beginUur.getTime() && new Date('2014', '05', '07', '17', '00').getTime() < eindUur.getTime()) {
                  $('.l11').html(value.lesNaam);
                  $('.lo11').html(value.lesLokaal);
                  $('.d11').html(value.docentNaam);
                }


              });
            }
            else
            {
              $('.lessenrooster .td-lesnaam').html(" ");
              $('.lessenrooster .td-lokaal').html(" ");
              $('.lessenrooster .td-docent').html(" ");
            }
          });
  }

//AUTOLOAD MAANDAG
  getschedule();

//NEXT KLIKKEN

    $("#next").on("click",function(e){
    	i = (i + 1) % dagArray.length;
    	$("#dag").text(dagArray[i]);
      
      resetschedule();

   		getschedule();

        e.preventDefault();
      });

//PREVIOUS KLIKKEN
    
    $("#prev").on("click",function(e){
    	if(i>0)
    	{
    		i = (i - 1) % dagArray.length;
    		$("#dag").text(dagArray[i]);
    	}
      else
      {
        i = 4
        $("#dag").text(dagArray[i]);
      }
      resetschedule();
      getschedule();

      
      e.preventDefault();
    });

//TAB HIDE EN SHOW FUNCTIES
  $(".active-tab-rooster a").on("click",function(){
      console.log("click rooster");
      ClickRooster();
  });

  $(".active-tab-meldingen a").on("click",function(){
      console.log("click meldingen");
      ClickMeldingen();
  });

  function ClickRooster () {
      $("#div-rooster").css("display", "block");
      $("#div-meldingen").css("display", "none");
      $(".active-tab-rooster").css("background-color", "#f24f11");
      $(".active-tab-meldingen").css("background-color", "#007d8a");
      }

  function ClickMeldingen () {
      $("#div-rooster").css("display", "none");
      $("#div-meldingen").css("display", "block");
      $(".active-tab-rooster").css("background-color", "#007d8a");
      $(".active-tab-meldingen").css("background-color", "#f24f11");
      }    
});
