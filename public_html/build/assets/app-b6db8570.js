let d=document.querySelector(".slider .list"),n=document.querySelectorAll(".slider .list .item"),c=document.getElementById("next"),a=document.getElementById("prev"),r=document.querySelectorAll(".slider .dots li"),o=n.length-1,e=0;c.onclick=function(){e=e+1<=o?e+1:0,t()};a.onclick=function(){e=e-1>=0?e-1:o,t()};let i=setInterval(()=>{c.click()},3e3);function t(){d.style.left=-n[e].offsetLeft+"px",document.querySelector(".slider .dots li.active").classList.remove("active"),r[e].classList.add("active"),clearInterval(i),i=setInterval(()=>{c.click()},3e3)}r.forEach((l,s)=>{l.addEventListener("click",()=>{e=s,t()})});window.onresize=function(l){t()};
