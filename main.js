var states = ["Kentucky","New York","California"];
$(document).ready(function() {
	createCrewmateColorDetails();
	retrieveMapTable();
  $("#other_context_menu").hide();
  $("#country_list")
    .on("change", function() {
      var ctry = $("#country_list")[0].value;
      if (ctry == "United States") {
        var states_list = $('<tr id="state_row"><td id="state"><label>State: </label><select name="states" id="state_list"></select></td></tr>');
        $("#country_row").after(states_list);
        for (let i = 0; i < states.length; i++) {
          var newState = $('<option value="'+states[i]+'">'+states[i]+'</option>');
          newState.appendTo($("#state_list"));
        }
        
      } else {
        $("#state_row").remove();
      }
  });
  $(".button_theme")
    .on("click", function() {
    changetheme()
  })
  $("#context_menu_button")
    .on("mouseenter", function() {
    $("#other_context_menu").slideDown(300);
  })
    .on("mouseleave", function() {
    $("#other_context_menu").slideUp(100);
  })
  $("#filter_select")
	.on("click", function() {
		retrieveMapTable();
	})
	$("#filter_refresh")
	.on("click",function() {
		setTimeout(retrieveMapTable(),200);
	})
})

function retrieveMapTable() {
	var map = $("#lobby_filter_map_select")[0].value;
	var xhr = new XMLHttpRequest();
	
	xhr.open("GET","retrieve-lobby.php?map="+map, true);
	xhr.onload = function () {
		if (xhr.readyState == xhr.DONE && xhr.status == 200) {
			var respText = $(xhr.responseText);
			$("#lobbies_table").html(xhr.responseText);
		}
	}
	xhr.send();
}

function changetheme() {
  var curr_theme = $("body").attr("class");
  if (curr_theme == "dark_body") {
    $("body").attr("class","light_body");
    $("#header_uk").attr("src","img/head_crew_alt.png")
  } else if (curr_theme == "light_body") {
    $("body").attr("class","dark_body");
    $("#header_uk").attr("src","img/ukcrew.png")
  }
    
}

function isFormValid() {
  if ($("#tos_true")[0].checked == true) {
	return true;
  }
  else {
	alert("You have not accepted the Terms of Service.");
	return false
  }
}

function createCrewmateColorDetails() {
	const colors = ["Banana","Black","Blue","Brown","Coral","Cyan","Green","Grey","Lime","Maroon","Orange","Pink","Purple","Red","Rose","Tan","White","Yellow"];
	for (let i = 0; i < colors.length; i++) {
		var newCrew = $('<details><summary>'+colors[i]+'</summary><table class="crewmate_entry"><caption>Crewmate Info</caption><thead><tr><th class="crewmate_entry_header">Crewmate Picture</th><th class="crewmate_entry_header">Crewmate Height</th><th class="crewmate_entry_header">Crewmate ID</th><th class="crewmate_entry_header">Crewmate Weight</th></tr></thead><tbody><tr><td><img class="crewmate_pict" src="img/crew/player_'+colors[i].toLowerCase()+'.png" height="100" alt="'+colors[i]+' crewmate" title="'+colors[i]+' crewmate" /></td><td>3\'6"</td><td>'+colors[i].toUpperCase().substring(0,3)+'P0-14</td><td>92 lbs</td></tr></tbody></table></details>')
		$("#player_info").append(newCrew);
	}
}