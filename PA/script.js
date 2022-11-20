var icon = document.getElementById("darkmode");
icon.onclick = function(){
    document.body.classList.toggle("dark-theme");
    if(document.body.classList.contains("dark-theme")){
        icon.src = "sun.png";
    }else{
        icon.src = "moon.png";
    }
}

const button = document.getElementById("btn");
button.addEventListener("click", function showInfo() {
    const x = document.getElementById('info');
    if(x.style.display == 'none'){
        x.style.display ='block';
    } else{
        x.style.display = 'none';
    }
});