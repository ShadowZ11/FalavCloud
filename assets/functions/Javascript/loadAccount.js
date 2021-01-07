function showMoreTracks(){
	const showmore = document.getElementById('bibliographieContent');
	const button = document.getElementById('trackAccountButton');
	let numb = button.value;

	const show = new XMLHttpRequest();
	show.open('POST', 'assets/functions/loadAccountTracks.php');

	show.onreadystatechange = function(){
		if (show.readyState === 4) {
			showmore.innerHTML = show.responseText;					 
		}
	};
	show.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	let body = 'VERSION=' + numb;
	show.send(body);
}

function showMoreAlbums(){
	const showmore = document.getElementById('albumAcountContent');
	const button = document.getElementById('albumAccountButton');
	let numb = button.value;

	const show = new XMLHttpRequest();
	show.open('POST', 'assets/functions/loadAccountAlbum.php');

	show.onreadystatechange = function(){
		if (show.readyState === 4) {
			showmore.innerHTML = show.responseText;					 
		}
	};
	show.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	let body = 'VERSION=' + numb;
	show.send(body);
}

function showMoreAlbumsWantlist(){
	const showmore = document.getElementById('albumAcountContentWantList');
	const button = document.getElementById('albumAccountButtonWantlist');
	let numb = button.value;

	const show = new XMLHttpRequest();
	show.open('POST', 'assets/functions/loadAccountAlbumWantlist.php');

	show.onreadystatechange = function(){
		if (show.readyState === 4) {
			showmore.innerHTML = show.responseText;					 
		}
	};
	show.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	let body = 'VERSION=' + numb;
	show.send(body);
}

function showMoreAlbumsCollection(){
	const showmore = document.getElementById('albumAcountContentCollection');
	const button = document.getElementById('albumAccountButtonCollection');
	let numb = button.value;

	const show = new XMLHttpRequest();
	show.open('POST', 'assets/functions/loadAccountAlbumCollection.php');

	show.onreadystatechange = function(){
		if (show.readyState === 4) {
			showmore.innerHTML = show.responseText;					 
		}
	};
	show.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	let body = 'VERSION=' + numb;
	show.send(body);
}


