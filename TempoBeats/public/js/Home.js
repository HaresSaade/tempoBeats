 
        const albums = document.querySelectorAll(".album");
        

        albums.forEach(ele => {
            const playBtnDiv = ele.querySelector('.playbtn');
            ele.addEventListener("mouseover",()=>{
                ele.style.backgroundColor="rgba(255,255,255,0.1)";
                playBtnDiv.style.opacity="1";
            })
            ele.addEventListener("mouseout",()=>{
                ele.style.backgroundColor="";
                playBtnDiv.style.opacity="0";
            })

            ele.addEventListener("click",()=>{
                window.location.href = "/track/" + 65498465894;
            })
        });
     

        const plylt = document.querySelectorAll(".playlist");

        plylt.forEach(ele => {
            const text = ele.querySelector('.text');
            ele.addEventListener("mouseover",()=>{
                text.style.display="flex";
                text.style.opacity="1";
               
            })
            ele.addEventListener("mouseout",()=>{
                ele.style.opacity="1";
               text.style.display="none";
            })
        });

