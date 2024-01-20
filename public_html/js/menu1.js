var x = document.getElementById('g');
x.onmouseenter = ()=>{
document.getElementById('a').style.maxHeight = '300px';
document.getElementById('b').style.opacity = '1';
document.getElementById('a').style.zIndex = '2';
document.getElementById('b').style.zIndex = '2';

}
x.onmouseleave = ()=>{
    document.getElementById('a').style.maxHeight = '0px';
    document.getElementById('b').style.opacity = '0';
    document.getElementById('a').style.zIndex = '0';
    document.getElementById('b').style.zIndex = '0';
}
    
var y = document.getElementById('q');
y.onmouseenter = ()=>{
document.getElementById('w').style.maxHeight = '300px';
document.getElementById('e').style.opacity = '1';
document.getElementById('w').style.zIndex = '2';
document.getElementById('e').style.zIndex = '2';
}
var y = document.getElementById('q');
y.onmouseleave = ()=>{
document.getElementById('w').style.maxHeight = '0px';
document.getElementById('e').style.opacity = '0';
document.getElementById('w').style.zIndex = '0';
document.getElementById('e').style.zIndex = '0';

}

// if (x.onmouseleave==true) {
//     document.getElementById('a').style.maxHeight = '0px';
//     document.getElementById('b').style.opacity = '0';    
// }