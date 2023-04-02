const playPauseButton = document.getElementById('play-pause');
  
  playPauseButton.addEventListener('click', function() {
    this.classList.toggle('fa-play');
    this.classList.toggle('fa-pause');
  });

  const repeatButton = document.getElementById('repeat');
  let repeatMode = 'off';
  
  repeatButton.addEventListener('click', function() {
    if(repeatMode === 'off'){
        this.classList.add('on');
        repeatMode = 'on';
    }else{
        this.classList.remove('on');
        repeatMode = 'off';
    }
  });

  const shuffleButton = document.getElementById('shuffle');
  let shuffleMode = 'off';
  
  shuffleButton.addEventListener('click', function() {
    if(shuffleMode === 'off'){
        this.classList.add('on');
        shuffleMode = 'on';
    }else{
        this.classList.remove('on');
        shuffleMode = 'off';
    }
  });

  const HeartButton = document.getElementById('Heart');
  let HeartMode = 'off';
  
  HeartButton.addEventListener('click', function() {
    if(HeartMode === 'off'){
        this.classList.add('onh');
        HeartMode = 'on';
    }else{
        this.classList.remove('onh');
        HeartMode = 'off';
    }
  });