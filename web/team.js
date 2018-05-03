function clicked() {
    alert("Clicked!");
}

function changeColor() {
    var textbox    = document.getElementById("divColor");
    
    var div    = document.getElementById("div1");

    var color  = textbox.value;
    div.style.backgroundColor = color;
}

