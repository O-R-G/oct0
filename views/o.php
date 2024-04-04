<video id="myVideo" controls loop>
    <!-- 
    <source src="/media/mp4/out-00100.mp4" type="video/mp4">
    <source src="/media/mp4/out-00300.mp4" type="video/mp4">
    <source src="/media/mp4/out-00400.mp4" type="video/mp4">
    -->  
    <source src="/media/mp4/out-00200.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>

<button id="speedup" onclick="speedUp()">Speed Up</button>
<button id="slowdown" onclick="slowDown()">Slow Down</button>

<script>
  var video = document.getElementById('myVideo');

  function speedUp() {
    video.playbackRate += 0.25; // Increase playback rate by 0.25
  }

  function slowDown() {
    video.playbackRate -= 0.25; // Decrease playback rate by 0.25
  }
</script>

<style>
    #myVideo {
        position: fixed;
        bottom: 0;
        right: 0;
        width: 200px;
        height: 200px;
        mix-blend-mode: multiply;
        z-index: 10000;    
    }

    button {
	display: none;
    }

    #speedup {
        position: fixed;
        top: 70px;
        right: 20px;        
    }

    #slowdown {
        position: fixed;
        top: 100px;
        right: 20px;        
    }

</style>
