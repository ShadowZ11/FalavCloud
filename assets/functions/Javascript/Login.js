function checkForm(){
	const login = document.getElementById("login");
	const pwd = document.getElementById("pwd");
	
	const errorLogin = checkLogin(login);
	const errorPwd = checkPwd(pwd);

	ShowError(login, errorLogin);
	ShowError(pwd, errorPwd);
	return errorLogin === undefined &&
			errorPwd === undefined;
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

function checkLogin(input){
	const checkL = input.value;
	const found = checkL.indexOf('@');
		if(found === -1) {
    	return '<img src="assets/icons/errorForm.png"> Il manque un @';
  }else if(checkL.length < 6){
  	return '<img src="assets/icons/errorForm.png"> l\'identifiant est votre email';
  }
  return undefined;
}

function checkPwd(input){
const checkpwd = input.value;
	if (checkpwd.length < 6) {
		return "<img src='assets/icons/errorForm.png'> 6 caractères minimum";
	}

	let countNumber = 0;
	let countMaj = 0;
	let countMin = 0;

	for(let i = 0; i < checkpwd.length; i++) {
    const checklength = checkpwd[i];
    if(isNumber(checklength)) {
      countNumber++;
    }
    if(isUpper(checklength)) {
      countMaj++;
    }
    if(isLower(checklength)) {
      countMin++;
    }
  }
  if(countMaj < 1) {
    return '<img src="assets/icons/errorForm.png"> Il manque la majuscule';
  }
  if(countMin < 1) {
    return '<img src="assets/icons/errorForm.png"> Il manque une minuscule';
  }
  if(countNumber < 1) {
    return '<img src="assets/icons/errorForm.png"> Il manque le chiffre';
  }
  return undefined;
}

function isNumber(ch) {
    const code = ch.charCodeAt(0);
    return code >= 48 && code <= 57; // true or false
}


function isUpper(ch) {
  const code = ch.charCodeAt(0);
  return code >= 65 && code <= 90; // true or false
}


function isLower(ch) {
  const code = ch.charCodeAt(0);
  return code >= 97 && code <= 122; // true or false
}