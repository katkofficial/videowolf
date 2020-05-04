class PLayer{
    _play;
    _pause;
    _stop;
    _fullscreen;
    _faster;
    _slower;
    _volume;
    _video;

    constructor(play, pause, stop, fullscreen, faster, slower, volume, video){
        this._play = play;
        this._pause = pause;
        this._stop = stop;
        this._fullscreen = fullscreen;
        this._faster = faster;
        this._slower = slower;
        this._volume = volume;
        this._video = video;
    }

    play(){
        this._video.play();
    }

    pause(){
        this._video.pause();
    }

    stop(){
        this._video.pause();
        this._video.currentTime = 0;
    }

    faster(){
        this._video.play();
        this._video.playbackRate = 1.5;
    }

    slower(){
        this._video.play();
        this._video.playbackRate = 0.5;
    }

    fullscreen(){
        if (this._video.requestFullscreen) {
            this._video.requestFullscreen();
          } 
        else if (this._video.mozRequestFullScreen) { /* Firefox */
            this._video.mozRequestFullScreen();
          } 
        else if (this._video.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
            this._video.webkitRequestFullscreen();
          } 
        else if (this._video.msRequestFullscreen) { /* IE/Edge */
            this._video.msRequestFullscreen();
        }
    }

    volume(){
        var val = this._volume.value;
        this._video.volume = val/100;
    }

}