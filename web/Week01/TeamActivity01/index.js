function buttonClicked()
{
    window.alert("Clicked!");
}

function changeColor1()
{
    let color = document.getElementById("Color1").value;
    document.getElementById("Div1").style.backgroundColor = color;
}