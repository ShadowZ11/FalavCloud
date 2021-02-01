function showMoreTracks(){
	const showmore = document.getElementById('trackBehindContent');
	const button = document.getElementById('trackBehindButton');
	let numb = button.value;

	const show = new XMLHttpRequest();
	show.open('post', 'assets/functions/loadBehindTrack.php');

	show.onreadystatechange = function(){
		if (show.readyState === 4) {
			showmore.innerHTML = show.responseText;					 
		}
	};
	show.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	let body = 'version=' + numb;
	show.send(body);
}

function showMoreAlbums(){
	const showmore = document.getElementById('albumsBehindContent');
	const button = document.getElementById('albumsBehindButton');
	let numb = button.value;

	const show = new XMLHttpRequest();
	show.open('post', 'assets/functions/loadBehindAlbum.php');

	show.onreadystatechange = function(){
		if (show.readyState === 4) {
			showmore.innerHTML = show.responseText;					 
		}
	};
	show.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	let body = 'version=' + numb;
	show.send(body);
}

function showMoreNews(){
	const showmore = document.getElementById('newsBehindContent');
	const button = document.getElementById('newsBehindButton');
	let numb = button.value;

	const show = new XMLHttpRequest();
	show.open('post', 'assets/functions/loadBehindNews.php');

	show.onreadystatechange = function(){
		if (show.readyState === 4) {
			showmore.innerHTML = show.responseText;					 
		}
	};
	show.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	let body = 'version=' + numb;
	show.send(body);
}

function showMoreArtistesL(){
	const showmore = document.getElementById('artistesBehindContent');
	const button = document.getElementById('newsBehindButtonR');
	let numb = button.value;

	const show = new XMLHttpRequest();
	show.open('post', 'assets/functions/loadBehindArtistesL.php');

	show.onreadystatechange = function(){
		if (show.readyState === 4) {
			showmore.innerHTML = show.responseText;					 
		}
	};
	show.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	let body = 'version=' + numb;
	show.send(body);
}

function showMoreArtistesR(){
	const showmore = document.getElementById('artistesBehindContent');
	const button = document.getElementById('newsBehindButtonR');
	let numb = button.value;

	const show = new XMLHttpRequest();
	show.open('post', 'assets/functions/loadBehindArtistesR.php');

	show.onreadystatechange = function(){
		if (show.readyState === 4) {
			showmore.innerHTML = show.responseText;					 
		}
	};
	show.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	let body = 'version=' + numb;
	show.send(body);
}
