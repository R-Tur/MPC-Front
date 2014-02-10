function playTrack(path, el) {
	var s = path.split("");
	for (var i = 0; i < s.length; i++) {
		if (s[0] != '/')
			s.shift();
		else {
		    s.shift();
			break;
		}
	}
	s = s.join("");
	$("#now_played_track").html(s);
	$("#browserframe").contents().find(".diritem").css("background", "transparent");
	$(el).css("background", "grey");
	var oAudio = document.getElementById('audio');
	oAudio.src = path;
	oAudio.play();
};
function mpc(command, val, confirm_) {
	var value = "";
	if (val)
		value = val;
	if (confirm_)
		if (!confirm('Are you sure?'))
			return false;
	var strquery = "mpc.php?c=" + command + "&v=" + encodeURIComponent(value);
	$.getJSON(strquery, function (data) {
		if (data.status) {
			$("#mpc_status").html("");
			var str = "";
			for (var i = 0; i < data.status.length; i += 2) {
				var a = document.createElement("a");
				var title = data.status[i].substring(0, data.status[i].length - 1);
				if (title == "volume")
					continue;
				a.innerHTML = "| " + title.toUpperCase() + " |";
				$(a).css("color", "white");
				$(a).data("command", title);
				a.setAttribute('href', 'javascript:void(0)');
				if (data.status[i + 1] == "on")
					$(a).css("background", "green");
				else
					$(a).css("background", "grey");
				$(a).click(function () {
					mpc($(this).data("command"), "");
				});
				$("#mpc_status").append(a);
				$("#mpc_status").append(" ");
			}
		}
		if ($.trim(data.playlist).length > 0)
			$("#mpc_playlist").html(data.playlist);
	});
};
$(function () {
	mpc("status", "");
});
