"use strict";

window.onload = function() {
  const assignButton = document.getElementById("assignButton");
  const switchButton = document.getElementById("switchButton");
  const addNoteButton = document.getElementById("addNoteButton");
  var httpRequest = new XMLHttpRequest();
    
  addNoteButton.addEventListener('click',  e => {
    e.preventDefault();
    var notes = document.getElementById("notes").value;
    var url = "process-notes.php";
    httpRequest.onreadystatechange = loadNoteEnteredByUser;
    httpRequest.open('POST', url);
    httpRequest.setRequestHeader("content-type","application/x-www-form-urlencoded");
    httpRequest.send('notes=' + encodeURIComponent(notes));
  });

  function loadNoteEnteredByUser() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === 200) {
        var response = httpRequest.responseText;
        var updated = document.querySelector(".updated-at");
        var result = document.getElementById("notes-entered-by-user");
        var notesCreatedAt = document.getElementById("notes-created-at");
        var notesCreatedBy = document.getElementById("notes-created-by");

        updated.innerHTML = "Updated on " + response.split(".")[0];
        notesCreatedBy.innerHTML = response.split(".")[3];
        result.innerHTML = response.split(".")[1];
        notesCreatedAt.innerHTML = response.split(".")[2];
      } else {
        alert("A problem with the request occurred.");
      }
    }
  }

  assignButton.addEventListener('click',  e => {
    e.preventDefault();
    var url = "process-assign-to-me-button.php";
    httpRequest.onreadystatechange = updateTime;
    httpRequest.open('GET', url);
    httpRequest.send();
  });

  switchButton.addEventListener('click',  e => {
    e.preventDefault();
    var url = "process-switch-button.php";
    httpRequest.onreadystatechange = updateTime;
    httpRequest.open('GET', url);
    httpRequest.send();
  });

  function updateTime() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === 200) {
        var response = httpRequest.responseText;
        var updated = document.querySelector(".updated-at");
        updated.innerHTML = "Updated on " + response.split(".")[0];
      } else {
        alert("A problem with the request occurred.");
      }
    }
  }
};