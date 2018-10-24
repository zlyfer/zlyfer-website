var message_buffer = []

function updateProgressBar() {
	files = document.getElementById("files").innerHTML;
    if (files != "") {
        changeValue("files", parseInt(files) + 1);
        total = document.getElementById("totalfiles").innerHTML;
        percentageround = Math.round(((parseInt(files) + 1) / total) * 100);
        percentage = ((parseInt(files) + 1) / total) * 100;
        changeValue("percentfiles", percentageround);
        document.getElementById('filled').style.width = percentage + "%";
    }
}

function AddMessageToBuffer(text, caller) {
	var message = document.createElement("p");
	message.className = "message";
	message.textContent = ">> " + text + "..................................................";
    if (caller == "status") {
        message.style.color = "#C73838";
    } else {
        message.style.color = "#A8A886";  
    }
    

	var messages = document.getElementById("message");

	messages.insertBefore(message, messages.firstChild);

	message_buffer.unshift(message);

	if (message_buffer.length >= 10) {
		var oldest_message = messages.lastChild;
		message_buffer.pop();

		messages.removeChild(oldest_message);
	}
    
	for (var i = 0; i < message_buffer.length; i++) {
		var message = message_buffer[i];
        message.style.opacity = 1 - (1/10) * i;
	}
}

function changeValue(target, value) {
    document.getElementById(target).innerHTML = value;
}

function SetStatusChanged(status) {
    if (status == "Sending client info...") {
        toVanish = document.getElementsByClassName("vanish");
        for (var i = 0, il = toVanish.length; i < il; i++) {
            toVanish[i].style.display = "none";
        }
        clientavatar = document.getElementById("clientavatar");
        clientavatar.style.borderTopLeftRadius = "10%";
        clientavatar.style.borderTopRightRadius = "10%";
        clientavatar.style.borderBottomLeftRadius = "10%";
        clientavatar.style.borderBottomRightRadius = "10%";
        windowwidth = window.innerWidth;
        size = windowwidth * 0.13;
        right = (windowwidth - size) / 2 ;
        clientavatar.style.border = "none";
        clientavatar.style.width = size + "px";
        clientavatar.style.height = size + "px";
        clientavatar.style.right = right + "px";
        clientavatar.style.top = "25%";
    }
	updateProgressBar();
    AddMessageToBuffer(status, "status");
}

function SetFilesTotal(total) {
    changeValue("totalfiles", total);
}

function DownloadingFile(fileName) {
    AddMessageToBuffer(fileName, "file")
	updateProgressBar();
}

function SetFilesNeeded(needed) {
    total = document.getElementById('totalfiles').innerHTML;
    files = total-needed;
    if (files < 0) {
        files = 0;
    }
    changeValue("files", files);
}

function GameDetails(servername, serverurl, mapname, maxplayers, steamid, gamemode) {
    changeValue("servername", servername);
    changeValue("mapname", 'Current Map: <span class="red">'+mapname+"</span>");
}
