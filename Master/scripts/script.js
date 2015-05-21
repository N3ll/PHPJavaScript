var menu = document.querySelector('.subList');
var drop = document.querySelector('.dropdown');
var yogaLevels = document.querySelector('#levels');
var arrowPic = document.querySelector('#levels img');

// the dropdown menu is going down
menu.addEventListener('mouseover',function(event) {	
	drop.style.display = 'block';	
	yogaLevels.style.paddingBottom=1+'px';
	yogaLevels.style.color= 'rgba(' + 0 +',' + 76 + ',' + 0 +',' + 0.6 + ')';
	arrowPic.style.opacity = 0.5;
	arrowPic.style.webkitTransform='rotate(180deg)';
	arrowPic.style.transform='rotate(180deg)';

});

// drop downmenu is up
menu.addEventListener('mouseout',function(event) {
	drop.style.display='none';
	yogaLevels.style.backgroundColor='transparent';
	yogaLevels.style.color= 'rgba(' + 0 +',' + 76 + ',' + 0 +',' + 1 +')';
	arrowPic.style.opacity = 1;
	arrowPic.style.webkitTransform='rotate(360deg)';
	arrowPic.style.transform='rotate(360deg)';
});


// shwowing and hidding the log in dialog box
var signIn = document.querySelector('#sign');
var overlay = document.querySelector('#overlay');
var clickTohideOverlay = document.querySelector('#background');

if(signIn){
	signIn.addEventListener('click', function(){
		overlay.style.opacity=1;
		overlay.style.visibility='visible';
	});
};

function fadeLogIn(){
	overlay.style.webkitTransition = 'opacity 1s';
	overlay.style.transition = 'opacity 1s';
	overlay.style.opacity=0;

	setTimeout(function(){
		overlay.style.visibility='hidden';
	},1000);
	
};

clickTohideOverlay.addEventListener('click',fadeLogIn);

// checking if the two passwords match
var btn=document.getElementById('btnSubmit');
btn.addEventListener('click', function(){
	if(document.login.pass.value != document.login.pass2.value){
		alert('Password did not match');
		return false;
	}
	else
	{
		document.login.submit();
		return true;
	}
});

// the cancel button
var cancelBtn = document.getElementById('cancel');
cancelBtn.addEventListener('click',fadeLogIn);








