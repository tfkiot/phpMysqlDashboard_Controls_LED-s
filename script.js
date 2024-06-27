
function toggleLED(led, status) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("led=" + led + "&status=" + status);
}

function handleToggle(event) {
    var led = event.target.name;
    var status = event.target.checked ? 1 : 0;
    toggleLED(led, status);
}


