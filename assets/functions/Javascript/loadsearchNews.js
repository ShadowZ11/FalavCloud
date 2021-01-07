
function showMoreNews(){
	const showmore = document.getElementById('realContentNews');
	const button = document.getElementById('newsSearchButton');
	let numb = button.value;

	const show = new XMLHttpRequest();
	show.open('POST', 'assets/functions/loadNews.php');

	show.onreadystatechange = function(){
		if (show.readyState === 4) {
			showmore.innerHTML = show.responseText;					 
		}
	};
	show.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	let body = 'VERSION=' + numb;
	show.send(body);
}

function showMoreNewsSearch(){
	const showmore = document.getElementById('realContentNews');
	const button = document.getElementById('newsSearchButton');
	let numb = button.value;

	const show = new XMLHttpRequest();
	show.open('POST', 'assets/functions/loadNewsSearch.php');

	show.onreadystatechange = function(){
		if (show.readyState === 4) {
			showmore.innerHTML = show.responseText;					 
		}
	};
	show.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	let body = 'VERSION=' + numb;
	show.send(body);
}

