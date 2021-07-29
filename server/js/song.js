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
