function checkForms(){
	const newsTitle = document.getElementById("newsTitle");
	const newsIMG = document.getElementById("newsImg");
	const newsIntro = document.getElementById("newsIntro");
	const newsContent = document.getElementById("newsContent");
	const errorTitle = checkTitle(newsTitle);
	const errorIMG = checkimg(newsIMG);
	const errorIntro = checkIntro(newsIntro);
	const errorContent = checkContent(newsContent);
	ShowError(newsTitle, errorTitle);
	ShowError(newsIMG, errorIMG);
	TextareaError(newsIntro, errorIntro);
	TextareaError(newsContent, errorContent);
	return errorTitle === undefined &&
			errorIMG === "attention la vérification de format de fichier n'est pas complètement effective le format de votre fichier doit être png, jpg ou jpeg" &&
			errorIntro === undefined &&
			errorContent === undefined;
}

function ShowError(input, error){
		const parent = input.parentNode;
	 if (error) {
		const p = document.createElement('p');
		p.style.color = "#D24534";
	  	p.style.fontSize = "13px";
	  	p.style.marginBottom = "32px";
	  	p.style.marginTop = "-28px";
		p.innerHTML = error;
		parent.appendChild(p);
	 }else{
		const p = document.createElement('p');
		p.className = "goodForm";
		p.style.color = "#55B760";
		p.style.fontSize = "13px";
		p.style.marginBottom = "32px";
		p.style.marginTop = "-28px";
		p.innerHTML = "<img style='padding-top:2px; padding-right:2px;' src='assets/icons/goodForm.png'>ok";
		parent.appendChild(p);
	 }
}

function TextareaError(textarea, error){
			const hello = textarea.parentNode;
	 	 
	  	if (error) {
		  	const p = document.createElement('p');
		  	p.style.color = "#D24534";
		  	p.style.fontSize = "13px";
		  	p.style.marginBottom = "32px";
		  	p.style.marginTop = "-28px";
		  	p.innerHTML = error;
		  	hello.appendChild(p);
	  	}else{
		  	const p = document.createElement('p');
		  	p.className = "goodForm";
		  	p.style.color = "#55B760";
		  	p.style.fontSize = "13px";
		  	p.style.marginBottom = "32px";
		  	p.style.marginTop = "-28px";
		  	p.innerHTML = "<img style='padding-top:2px; padding-right:2px;' src='assets/icons/goodForm.png'>ok";
		  	hello.appendChild(p);
		}
}

function checkTitle(input){
	const value = input.value.trim();
	if (value.length < 2 || value.length > 60) {
		return "<img src='assets/icons/errorForm.png'> Le Titre doit faire entre 2 et 60 caractères";
	}
	return undefined;
}

function checkIntro(textarea){
	const intro = textarea.value.trim();
	if (intro.length < 10) {
		return "<img src='assets/icons/errorForm.png'> L'introduction est trop courte";
	}else if(intro.length > 220){
		return "<img src='assets/icons/errorForm.png'> L'introduction est trop longue réduisez la";
	}
	return undefined;
}

function checkContent(textarea){
	const content = textarea.value.trim();
	if (content.length < 180) {
		return '<img src="assets/icons/errorForm.png"> Le contenu est trop court';
	}else if (content.length > 10000) {
		return '<img src="assets/icons/errorForm.png"> Il y a trop de contenu faut pas raconter sa vie non plus ;)';
	}
	return undefined;
}

function checkimg(input){
	
	return "attention la vérification de format de fichier n'est pas complètement effective le format de votre fichier doit être png, jpg ou jpeg";
}