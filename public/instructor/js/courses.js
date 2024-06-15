let span= document.querySelector(".UP");
window.onscroll=function(){
    if(this.scrollY >=500){
        span.classList.add("show");
    }else{Dww
        span.classList.remove("show"); 
    }
    }
    span.onclick=function(){
        
        window.scrollTo({
            top:0,
            behavior:"smooth",
            
        })  
    }



