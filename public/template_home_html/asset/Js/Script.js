const scroll_top = document.querySelector(".scroll-top");
const scroll_header = document.querySelector('.headerr');
const nav_link = document.querySelectorAll(".nav-link");
window.addEventListener('scroll',()=>{
    if(window.scrollY > 200){
        scroll_top.classList.add('visible');
    }else{
        scroll_top.classList.remove('visible');
    }
    if(window.scrollY > 140){
        scroll_header.classList.add('sticky-top');
        scroll_header.classList.add('nav-scroll');
        for(let i of nav_link){
            i.classList.add('text-light');
        }
    }else{
        scroll_header.classList.remove('sticky-top');
        scroll_header.classList.remove('nav-scroll');
        for(let i of nav_link){
            i.classList.remove('text-light');
        }
    }
})