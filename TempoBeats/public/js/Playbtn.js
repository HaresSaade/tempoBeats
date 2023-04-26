const audio = new Audio('/12.mpeg');
audio.addEventListener('ended', function() {
  isPaused = true;
  playPauseButton.classList.remove('fa-pause');
  playPauseButton.classList.add('fa-play');
  pausePosition = 0;
});


const playPauseButton = document.getElementById('play-pause');
playPauseButton.addEventListener('click', function() {
    if (!audio.paused) {
      this.classList.remove('fa-pause');
      this.classList.add('fa-play');
      audio.pause();
    }else {
   
    this.classList.remove('fa-play');
      this.classList.add('fa-pause');
      audio.play();
      progressLoop();
      updateTimeElapsed();  
  }
});


const progressBar = document.getElementById('progress-bar');
progressBar.value = 0; // set initial value to 0


const timeD = document.getElementsByClassName('initial')[0];
function updateTimeElapsed() {
  const timeElapsed = audio.currentTime;
  const minutes = Math.floor(timeElapsed / 60);
  const seconds = Math.round(timeElapsed % 60);
  const timeElapsedString = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
  timeD.textContent = timeElapsedString;
}
function progressLoop() {
  const intervalId = setInterval(() => {
    const progress = audio.currentTime / audio.duration;
    progressBar.value = progress * 100;
    if (!audio.paused) {
      updateTimeElapsed();
      updateGradient(progressBar.value);
    } else {
      clearInterval(intervalId);
    }
  }, 100);
}


const shuffleButton = document.getElementById('shuffle');
let shuffleMode = 'off';
shuffleButton.addEventListener('click', function() {
  if (shuffleMode === 'off') {
    this.classList.add('on');
    shuffleMode = 'on';
  } else {
    this.classList.remove('on');
    shuffleMode = 'off';
  }
});






const slider = document.getElementById('sound-slider');
slider.addEventListener('input', (e) => {
  const volume = parseFloat(e.target.value / 100);
  audio.volume = volume;
  volumeIcon();
});


const repeatButton = document.getElementById('repeat');
let repeatMode = 'off';
repeatButton.addEventListener('click', function() {
  if (repeatMode === 'off') {
    this.classList.add('on');
    repeatMode = 'on';
    audio.loop = true;
  } else {
    this.classList.remove('on');
    repeatMode = 'off';
    audio.loop = false;
  }
});


const volumespeak = document.getElementById('speaker');


function volumeIcon() {
  const SoundVolume = audio.volume;
  if (SoundVolume > 0 && volumespeak.classList.contains("fa-volume-mute")) {
    volumespeak.classList.remove("fa-volume-mute");
  }


  if (SoundVolume == 1 || SoundVolume >= 0.5) {
    volumespeak.classList.toggle("fa-volume-up", true);
    volumespeak.classList.toggle("fa-volume-down", false);
  } else if (SoundVolume < 0.5 && SoundVolume != 0) {
    volumespeak.classList.toggle("fa-volume-down", true);
    volumespeak.classList.toggle("fa-volume-up", false);
    console.log("in the else if of down sound");
  } else if (SoundVolume == 0) {
      volumespeak.classList.toggle("fa-volume-mute", true);
      volumespeak.classList.toggle("fa-volume-up", false);
      volumespeak.classList.toggle("fa-volume-down", false);
    }
  }




let previousVolume = audio.volume;
  volumespeak.addEventListener("click", () => {
    if (volumespeak.classList.contains("fa-volume-mute")) {
      volumespeak.classList.remove("fa-volume-mute");
      audio.volume= previousVolume;
      slider.value = previousVolume * 100;
      updateGradient2( slider.value);
      volumeIcon();
    } else {
      if(volumespeak.classList.contains("fa-volume-up")){
        volumespeak.classList.remove("fa-volume-up");
      }else if(volumespeak.classList.contains("fa-volume-down")){
        volumespeak.classList.remove("fa-volume-down");
      }
      volumespeak.classList.add("fa-volume-mute");
      previousVolume = audio.volume;
      audio.volume=0;
      slider.value = 0;
      updateGradient2( slider.value);
    }
  });


  const Slider1 = document.querySelector('.range1');
       


        function updateGradient2(rangeValue) {
          const percentage = (rangeValue - slider.min) / (slider.max - slider.min) * 100;
          slider.style.backgroundImage = `linear-gradient(90deg, #d6af2c ${percentage}%, transparent ${percentage}%)`;
        }
       
        // Update gradient onload
        updateGradient2(slider.value);
       
        // Update gradient oninput
        slider.addEventListener('input', (e) => {
            updateGradient2(e.target.value);
        });


     


        function updateGradient(rangeValue) {
          const percentage = (rangeValue - Slider1.min) / (Slider1.max - Slider1.min) * 100;
          Slider1.style.backgroundImage = `linear-gradient(90deg, #d6af2c ${percentage}%, transparent ${percentage}%)`;
        }
       
        // Update gradient onload
        updateGradient(Slider1.value);
       
        // Update gradient oninput
        Slider1.addEventListener('input', (e) => {
          updateGradient(e.target.value);
        });
