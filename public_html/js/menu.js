// var x = document.getElementById('g');
// x.onmouseenter = ()=>{
// document.getElementById('a').style.maxHeight = '300px';
// document.getElementById('b').style.opacity = '1';
// document.getElementById('a').style.zIndex = '2';
// document.getElementById('b').style.zIndex = '2';

// }
// x.onmouseleave = ()=>{
//     document.getElementById('a').style.maxHeight = '0px';
//     document.getElementById('b').style.opacity = '0';
//     document.getElementById('a').style.zIndex = '0';
//     document.getElementById('b').style.zIndex = '0';
// }

// var y = document.getElementById('q');
// y.onmouseenter = ()=>{
// document.getElementById('w').style.maxHeight = '300px';
// document.getElementById('w').style.zIndex = '2';
// document.getElementById('e').style.opacity = '1';
// document.getElementById('e').style.zIndex = '2';
// }
// var y = document.getElementById('q');
// y.onmouseleave = ()=>{
// document.getElementById('w').style.maxHeight = '0px';
// document.getElementById('e').style.opacity = '0';
// document.getElementById('w').style.zIndex = '-1';
// document.getElementById('e').style.zIndex = '-1';

// }
var ul_4 = document.querySelector('.germ');
var subMenuContainer = document.querySelector('.sub-menu-container');
var subMenu = document.querySelector('.sub-menu');
ul_4.addEventListener('mouseenter',() => {
    subMenuContainer.style.maxHeight = '300px';
    subMenuContainer.style.zIndex = '2';
    subMenu.style.opacity = '1';
    subMenu.style.zIndex = '2';
});
ul_4.addEventListener('mouseleave',() => {
    subMenuContainer.style.maxHeight = '0px';
    subMenuContainer.style.zIndex = '-2';
    subMenu.style.opacity = '0';
    subMenu.style.zIndex = '-2';
})
var ul_4_1 = document.querySelector('.rela');
var subMenu2Container = document.querySelector('.sub2-menu-container');
var subMenu2 = document.querySelector('.sub2-menu');
ul_4_1.onmouseenter = ()=>{
    subMenu2Container.style.maxHeight = '300px';
    subMenu2Container.style.zIndex = '2';
    subMenu2.style.opacity = '1';
    subMenu2.style.zIndex = '2';
    }
ul_4_1.onmouseleave = ()=>{
    subMenu2Container.style.maxHeight = '0px';
    subMenu2Container.style.zIndex = '-2';
    subMenu2.style.opacity = '0';
    subMenu2.style.zIndex = '-2';
    }

    var hum = document.getElementById('hum');
    var list = document.getElementById('main-menu-container');
    hum.addEventListener('click',() => {
        if (list.style.display == 'none') {
            list.style.display = 'block'
            list.style.zIndex = '2'
        }
        else {
            list.style.display = 'none'
            list.style.zIndex = '0'
        }
});
