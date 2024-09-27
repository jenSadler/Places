var holdSurfers = [];
function insertWaves(closeButton){
    var audioIndex = 0;

    
    jQuery(".wp-block-audio").each(function() {
        

        var audioBlock = jQuery( this );
        var audioURL = audioBlock.find('audio').attr("src");

        audioBlock.after('<div class="holdSmallWave" ><button class="sswButton" id="startSmallWave'+audioIndex+'"><i class="fa-solid fa-play smallWaveIcon"></i><i class="fa-solid fa-pause smallWaveIcon hidden"></i></button><div class="smallWave" id="waveform'+audioIndex+'"></div></div>'); 

        var waveformContainer = '#waveform'+audioIndex;
        // Initialize WaveSurfer
        var myWaveSurfer = WaveSurfer.create({
            container: waveformContainer,
            waveColor: '#FFFFFF',
            progressColor: '#CCCCCC',
            url:audioURL,
            height: 150
        });

        holdSurfers[audioIndex] = myWaveSurfer;

        myWaveSurfer.load(audioURL);
        

        myWaveSurfer.on('ready', function () {

            var hiddenElements = jQuery(waveformContainer).parents().filter('.hidden').removeClass("hidden");;
            myWaveSurfer.drawBuffer();
            hiddenElements.addClass("hidden");
                    
        });
        

        jQuery(window).on('resize', function(){
            var hiddenElements = jQuery(waveformContainer).parents().filter('.hidden').removeClass("hidden");;
            myWaveSurfer.drawer.fireEvent('redraw');
            hiddenElements.addClass("hidden");
            
        });

        var swButtonContainer = 'startSmallWave'+audioIndex;
    
        jQuery(closeButton).on('click', () => {
            pauseSmallWave(myWaveSurfer,swButtonContainer);
        });

        audioIndex++;
    });


	jQuery(".sswButton").on('click', function(e) {
		var buttonContainerId = this.id
		var indexString = buttonContainerId.match(/\d+/);
		var buttonIndex = Number(indexString);

		//stop all
		jQuery.each(holdSurfers , function(index, val) { 
			var thisSurfer = val;
			if(index != buttonIndex){
				pauseSmallWave(thisSurfer,"startSmallWave"+index);
			}
		});
						
		//play specific
		toggleSmallWave(holdSurfers[buttonIndex],buttonContainerId );
		
	});
		
		
	}

    function toggleSmallWave(wave,waveButtonID){
        if(wave.backend.isPaused()){
            playSmallWave(wave,waveButtonID);
        }
        else{
            pauseSmallWave(wave,waveButtonID);
        }
    }

    function playSmallWave(wave, waveButtonID){
        wave.play();
        jQuery("#"+waveButtonID + " .fa-pause").removeClass("hidden");
        jQuery("#"+waveButtonID + " .fa-play").addClass("hidden");
    }

    function pauseSmallWave(wave,waveButtonID){
        
        wave.pause();
        jQuery("#"+waveButtonID + " .fa-pause").addClass("hidden");
        jQuery("#"+waveButtonID + " .fa-play").removeClass("hidden");

    }

    function drawBufferWaves(wave){
		var hiddenElements = jQuery(wave.container).parents().filter('.hidden').removeClass("hidden");
		wave.drawBuffer();		
		hiddenElements.addClass("hidden");
	}

	function refreshWaves(wave){

		
		var hiddenElements = jQuery(wave.container).parents().filter('.hidden').removeClass("hidden");;
        wave.drawer.fireEvent('redraw');
        hiddenElements.addClass("hidden");
		
	}