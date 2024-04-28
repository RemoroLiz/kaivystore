(function(){let lightSwitch=document.getElementById("lightSwitch");if(lightSwitch){darkMode();lightSwitch.addEventListener("change",()=>{lightMode();});function darkMode(){let isSelected=localStorage.getItem("lightSwitch")!==null&&localStorage.getItem("lightSwitch")==="dark";if(isSelected){lightSwitch.checked=true;document.querySelectorAll(".bg-light").forEach((element)=>{element.className=element.className.replace(/-light/g,"-dark");});document.querySelectorAll(".table-light").forEach((element)=>{element.className=element.className.replace(/-light/g,'-dark')})
document.body.classList.add("bg-dark");document.body.style.backgroundColor="#2d3238"
if(document.body.classList.contains("text-dark")){document.body.classList.replace("text-dark","text-white");}else{document.body.classList.add("text-white");}
document.querySelectorAll(".text-dark").forEach((element)=>{element.className=element.className.replace("text-dark","text-white")})
document.querySelector("#footer-credit").style.backgroundColor="#181b1f"}else if(localStorage.getItem('lightSwitch')==="white"){lightMode()}}
function lightMode(){if(lightSwitch.checked){localStorage.setItem("lightSwitch","dark");darkMode();}else{document.querySelectorAll(".bg-dark").forEach((element)=>{element.className=element.className.replace(/-dark/g,"-light");});document.querySelectorAll(".text-white").forEach((element)=>{element.className=element.className.replace("text-white","text-dark")})
document.querySelectorAll(".table-dark").forEach((element)=>{element.className=element.className.replace(/-dark/g,'-light')})
document.body.style.backgroundColor="#ffff"
document.querySelector("#footer-credit").style.backgroundColor="#d5d5d5"
document.body.classList.replace("text-white","text-dark");localStorage.setItem('lightSwitch','white')}}}})();