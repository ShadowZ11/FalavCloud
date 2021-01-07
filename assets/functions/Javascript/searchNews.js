function displayNews(){
	const keyWordInput = document.getElementById('searchInput');
	const keyWord = keyWordInput.value;

	const request = new XMLHttpRequest();
	request.open('POST', 'assets/functions/searchNews.php');
	request.onreadystatechange = function(){
		if (request.readyState === 4){
			const list = document.getElementById('realContentNews');
			list.innerHTML = request.responseText;
			const putKeyWord = document.getElementById('keyWordSearch');
			putKeyWord.innerHTML = keyWord;
		}
		
	};
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    const body = 'keyWord=' + keyWord;
	request.send(body);
}