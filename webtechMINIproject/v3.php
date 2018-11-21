<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body{
            background: url('9.jpg');
            background-size: cover;
            
        }
    </style>
    <meta charset="UTF-8">
    <title>Video Player</title>
<link rel="icon" href="logo.ico"/>
<link rel='stylesheet' href='style.css'>

    <style>
          
        #player {
            width: 800px;
            height: auto;
            margin: 2% auto;
/*            border: 5px solid rgb(0, 0, 150);*/
            border-radius: 5px;
            position: relative;
            overflow: hidden;
/*            box-shadow: 0 0 10px 2px rgb(0, 0, 0);*/
        }

        .playerControls {
            width: 100%;
            position: absolute;
            bottom: -28px;
            background: rgba(0, 0, 0, 1);
            background: rgba(0, 0, 0, .5);
            transition: all 1s;
        }

        #video {
            width: 100%;
            display: block;

        }

        #progressBar {
            border: solid rgba(255, 255, 255, .1);
        }
                                   
        .currentProgress {
            background: red;
            width: 0%;
            height: 5px;
            border-radius: 5px;
            cursor: pointer;
        }

        #player:hover .playerControls {
            bottom: 0px;
            display: block;
        }

       .playerControls #playBtn {
            background: none!important;
            color: #fff!important;
            border: none!important;
            font-size: 18px;
            cursor: pointer;
        }

        input[type=range] {
            cursor: pointer;
            -webkit-appearance: none;
            background: yellow;
            width: 20%;
            margin: 0 5px;
            height: 4px;
            border-radius: 5px;

        }

       input[type=range]::-webkit-slider-thumb {
            height: 10px;
            width: 10px;
            border-radius: 20px;
            background: silver;
            cursor: pointer;
            -webkit-appearance: none;
            margin-top: -1.5px;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.2);
        }

        input[type=range]:focus {
            outline: none;
        }

        .rangeSliders {
            background: none;
            color: #fff;
            box-sizing: border-box;
            display: block;
            width: 80%;
            text-align: right;
            position: absolute;
            bottom: 5px;
            right: 0px;
            cursor: pointer;
        }

        .rangeSliders span {
            color: #fff!important;
            background: none!important;
            display: inline-block;
            cursor: pointer;
            position: relative;
            top: 4px;
        }

        .speedControlWrap {
            position: relative;
            display: inline-block;
            color: #fff;
            width: 30%;
        }

        .speedControls {
            background: none;
            color: #fff;
            border: none;
            cursor: pointer;

        }

        .sliders {
            width: 100%;
            color: black;
        }  
    </style>


</head>

<body>
 
    <div class='logo'>
            
         <img id='logo' alt="PES University-Education for real world" src="pes_logo.png">
        
        </div>
           
        <div id='mainWrap'>
            
        <div id="navbar">
  
        <ul id='menu'>
            
           <li><a href="myProject.php">Home</a></li>
            <li><a href="">About</a>
            <ul class="hidden">
                <li><a href="about1.php">About PES </a></li>
<!--                <li><a href="#">Infrastructure</a></li>-->
                <li><a href="founders.php" target="_blank">About Founder</a></li>
            </ul>
            </li>
            <li><a href="videoPlayer.php" target="_blank">Campus Tour</a>
<!--
                <ul class="hidden">
                    <li><a href="videoPlayer.html" target="_blank">PES Tour</a></li>
                </ul>
-->
            </li>
            <li><a href="">Aatmatrisha'18</a>
            <ul class="hidden">
                <li><a href="v2.php" target="_blank">Preparations</a></li>
<!--                <li><a href="#">Infrastructure</a></li>-->
                 <li><a href="v1.php" target="_blank">SEL live concert</a></li>
                <li><a href="v3.php" target="_blank">PES Fest</a></li>
            </ul>
            </li>
            
            <li><a href="">College Videos</a>
            <ul class="hidden">
                
                
                 <li><a href="v4.php" target="_blank">PESU/IO</a></li>
                 <li><a href="v5.php" target="_blank">Bootstrap</a></li>
                 
            </ul>
            </li>
<!--
            <li><a href="#">News</a></li>
            <li><a href="#">Contact</a></li>
-->
<!--            <li><a href="login.html" target="_blank">Login</a></li>-->
            <li><a href="signUp.php" target="_blank">Sign-up</a></li>
<!--            <li><a href="research.html" target="_blank">Research</a></li>-->
            
        </ul>
        </div>
        </div>
        

    <div id='player' class="videoPlayer">

        <video controlsList="nodownload" preload="metadata" id='video' src="videos/PES%20Fest%202K18_4.MP4">
          This Browser doesn't support this video
        </video>


        <div class="playerControls">
            <div class="progressBar" id='progressBar'>

                <div class="currentProgress" id='currentProgress'></div>

            </div>


            <button id='playBtn' class='toggle playButton'>&#9654;</button> 

            <div class="speedControlWrap">
                
                <button class="speedControls" name='-10' data-rewind='-10'>-10s « </button>
                <button class="speedControls" name='+10' >+10s »</button>

            </div>




            <div class="rangeSliders">
                
                <span id='volumeIcon'>&#128266;</span>
                <input type="range" name="volume" min="0" max="1" step='0.01' class='sliders'>
                <span>&#9193;</span>
                <input type="range" name="playbackRate" min="0.5" max="3" step='0.01' class='sliders'>

            </div>

        </div>
    </div>


    <script>
        let player = document.getElementById('player');
        let video = document.getElementById('video');
        let PlayBtn = document.getElementById('playBtn');
        let sliders = document.querySelectorAll('.sliders');
        let pC = document.querySelector('.playerControls');
        let skipButtons = document.querySelectorAll(".speedControls");
        let cP = document.getElementById('currentProgress');
        let pB = document.getElementById('progressBar');
        let vI = document.getElementById('volumeIcon');

        PlayBtn.addEventListener('click', TogglePlay);
        video.addEventListener('click', TogglePlay);
        video.addEventListener('dblclick', fullScreen);
        video.addEventListener('timeupdate', currentTime);
        pB.addEventListener('click', progressUpdate);
        vI.addEventListener('click', mute);
//        VI.addEventListener('click', change_mute)

        function TogglePlay() {
            let playStatus = video.paused ? (video.play(), PlayBtn.innerHTML = "&#9208;") : (video.pause(), PlayBtn.innerHTML = "&#9654;");

        }

       function updateSlide() {
            video[this.name] = Number(this.value);
          //  video[this.name] = Number(this.value);
        }

        skipButtons.forEach(btn => btn.addEventListener('click', timeSkip));
        sliders.forEach(slider => slider.addEventListener('change', updateSlide));


        function timeSkip() {
            video.currentTime += Number(this.name);
        }

        function currentTime() {
            let getPercent = (video.currentTime / video.duration) * 100;
            cP.style.width = getPercent + '%';
        }

       function progressUpdate(e) {
            let result = (e.offsetX / pB.offsetWidth) * video.duration;
            video.currentTime = result;
        }


        function mute() {
            let mute = video.volume > 0 ? (video.volume = 0 , vI.innerHTML = "&#128264;") : (video.volume = 1,vI.innerHTML = "&#128266;");
        }

        function fullScreen() {
            if (video.webkitRequestFullScreen) {
                video.webkitRequestFullScreen()
            }
        }
    </script>


</body>

</html>