function addNewLine() {
  var line = document.createElement("div");
  line.classList.add("line");

  var chords = document.createElement("div");
  chords.setAttribute("contenteditable", true);
  chords.classList.add("chords");

  var text = document.createElement("div");
  text.setAttribute("contenteditable", true);
  text.classList.add("text");

  line.appendChild(chords);
  line.appendChild(text);

  document.getElementById("song").appendChild(line);
}

function showCloseEditor() {
  var editorLines = document.getElementsByClassName("editor");
  for (var i = 0; i < editorLines.length; i++) {
    if (editorLines[i].hasAttribute()) {
      editorLines[i].removeAttribute("hidden");
    } else {
      editorLines[i].setAttribute("hidden", true);
    }
  }
}

function saveSong() {
  var song = document.getElementById("song").children;

  var songContent = "";
  for (var i = 0; i < song.length; i++) {
    var lineParts = song[i].children;

    songContent += "line=" + parseInt(i + 1) + ",";
    for (var j = 0; j < lineParts.length; j++) {
      songContent += lineParts[i].classList + "=" + lineParts[i].innerText;
      if (j < lineParts.length - 1) {
        songContent += ",";
      }
    }

    songContent += "\n";
  }

  var requestor = new XMLHttpRequest();
  requestor.onreadstatechange = function() {
    if (this.readyState === 4) {
      if (this.status === 200) {
          alert("Änderungen wurden erfolgreich gespeichert");
      }
    }
  };

  var getParameter = window.location.href.split("?")[1].split("&");

  var requestData = new FormData();
  requestData.append("song", songContent);
  for (var i = 0; i < getParameter.length; i++) {
    var parameterSplit = getParameter[i].split("=");
    requestData.append(parameterSplit[0], parameterSplit[1]);
  }

  requestor.open("POST", "/php/save-song.php", true);
  requestor.send(requestData);
}
