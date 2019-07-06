var mWaiting;
var mChallenges;

$(function(){
	$.ajaxSetup({cache: false});
	setInterval(function(){
		get_all_waiting();
	}, 1000);
});

function get_all_waiting(){
	$.ajax({
		url: BASE_URL + 'game/get_all_requests',
		data: "",
		dataType: 'json',
		success: function(data){
			if(data['waiting'].length > 0){
				$("#tbl-player")[0].innerHTML = 
					'<th>Player</th>' + 
					'<th>Rank</th>' + 
					'<th></th>'
				;

				for(var idx in data['waiting']){
					$("#tbl-player")[0].innerHTML += 
						'<tr>' +
							'<td>' + data['waiting'][idx]['player_name'] + '</td>' + 
							'<td>Noobs</td>' + 
							'<td><a onclick="set_challenge(' + data['waiting'][idx]['id'] + ')">Challenge!</a></td>' +  
						'</tr>'
					;
				}
			}
			else{
				$("#tbl-player")[0].innerHTML = 'No Players are currently logged in.';
			}
			
			mWaiting = data['waiting'];
		}
	});
}

function set_challenge(id){
	$.ajax({
		url: BASE_URL + 'game/set_challenge/' + id,
		data: "",
		dataType: 'json',
		success: function(data){
			alert('Challenge sent to: ');
		}
	});
}