const likedSongsCookie = decodeURIComponent(document.cookie)
  .split('; ')
  .find(cookie => cookie.startsWith('liked_songs='))
  ?.split('=')[1];

console.log(likedSongsCookie);




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
                top.window.location.href = "/track/" + 65498465894;
            })
        });
     

        const plylt = document.querySelectorAll(".playlist");

        plylt.forEach(ele => {
            const text = ele.querySelector('.text');
            let PlTitle;
            ele.addEventListener("mouseover",()=>{
                text.style.display="flex";
                text.style.opacity="1";
                 PlTitle = ele.querySelector('.plyt').textContent;
               
            })
            ele.addEventListener("mouseout",()=>{
                ele.style.opacity="1";
               text.style.display="none";
            })

            ele.addEventListener("click",()=>{
                window.location.href = "/playlist/" + PlTitle;
            })
        });

        const plybtns = document.querySelectorAll(".playbtn");
        const songTb = window.parent.document.querySelector("#sT");
        const songAb = window.parent.document.querySelector(".artist");
        const Cred = window.parent.document.querySelector(".picA");
        let song ;
console.log(songAb);
        const hicon = window.parent.document.querySelector('#Heart');
        plybtns.forEach(ele=>{
            ele.addEventListener("click",async ()=>{
                const pele = ele.parentElement;
                console.log(pele);
                event.stopPropagation();
                songAb.textContent = pele.querySelector(".author").textContent;
                songTb.textContent = pele.querySelector(".musictitle").textContent;
                const newImage = document.createElement('img');
                newImage.src = pele.querySelector('img').getAttribute('src');
                newImage.style.width = '50px';
                newImage.style.height ='55px';
               if(  Cred.querySelector('img')){
                Cred.removeChild(Cred.querySelector('img')); 
                Cred.appendChild(newImage);
               }else{
               Cred.appendChild(newImage);
               } 
              
                if (likedSongsCookie.includes(songTb.textContent)) {
                     HeartMode = 'on';
                     hicon.classList.add('onh');
                }else {
                    HeartMode = 'off';
                    hicon.classList.remove('onh');
                }
               const url = '/SongDetails/'+ pele.querySelector(".musictitle").textContent.toString().toLocaleLowerCase();
            
              try
              { 
                const response = await fetch(url, {
                    method: "get",
                    headers: {
                    "Content-Type": "application/json",
                     },
                    });
              const data = await response.json();
              song = data;
              
              updatePlayBar();
              } catch(error){
                console.log(error);
              }
                })
                
        });
        const time = window.parent.document.querySelector(".final");
        console.log(time);
        const updatePlayBar =  ()=>{
            const totalMinutes = Math.floor(song['Duration'] / 60) + ":" + (song['Duration'] % 60).toString().padStart(2, "0");
            time.textContent = totalMinutes;
        }
        