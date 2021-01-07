function checkForm(){
	const prenom = document.getElementById("prenom");
	const nom = document.getElementById("nom");
	const email = document.getElementById("email");
	const cemail = document.getElementById("cEmail");
	const password = document.getElementById("pwd");
	const cpassword = document.getElementById("cPwd");
	const errorprenom = checkFirstName(prenom);
	const errorname = checkName(nom);
	const erroremail = checkEmail(email);
	const errorCemail = checkcEmail(cemail);
	const errorpassword = checkPassword(password);
	const errorcpassword = checkCPassword(cpassword);
	Showerror(prenom, errorprenom);
	Showerror(nom, errorname);
	Showerror(email, erroremail);
	Showerror(cemail, errorCemail);
	Showerror(password, errorpassword);
	Showerror(cpassword, errorcpassword);
	return errorprenom === undefined &&
          errorname === undefined &&
          erroremail === undefined &&
          errorCemail === undefined &&
          errorpassword === undefined &&
          errorcpassword === undefined;
}


function Showerror(input, error){
		const parent = input.parentNode;
	  	const allErrors = parent.getElementsByTagName('p'); // retourne 1 tableau
	  	for(let i = 0; i < allErrors.length; i++) {
	    allErrors[i].remove();
	  }
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

function checkFirstName(input){
	const first = input.value.trim();
	if (first.length < 2 || first.length > 50) {
		return 'prenom incorrect';
	}
		return undefined;
}

function checkName(input){
	const second = input.value.trim();
	if (second.length < 2 || second.length > 100) {
		return 'nom incorrect';
	}
	return undefined;
}

function checkEmail(input){
	const emailes = input.value;
	const index = emailes.indexOf("@");
	const point = emailes.indexOf(".");
	if (index === -1 && point === -1) {
		return "Votre adresse mail n'est pas valide";
	}
	return undefined;

}

function checkcEmail(input){
	const b = input.value.trim();
	let email = document.getElementById("email")
	if (b !== email.value ) {
		return "<img src='assets/icons/errorForm.png'> L'email ne correspond pas";
	}
	return undefined;
}

function checkPassword(input){
	const c = input.value;
	if (c.length < 6) {
		return "<img src='assets/icons/errorForm.png'> 6 caractères minimum";
	}

	let countNumber = 0;
	let countMaj = 0;
	let countMin = 0;

	for(let i = 0; i < c.length; i++) {
    const checklength = c[i];
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
    return '<img src="assets/icons/errorForm.png"> une majuscule minimum';
  }
  if(countMin < 1) {
    return '<img src="assets/icons/errorForm.png"> une minuscule minimum';
  }
  if(countNumber < 1) {
    return '<img src="assets/icons/errorForm.png"> un chiffre minimum';
  }
  return undefined;
}

function checkCPassword(input){
	const d = input.value;
	let y = document.getElementById("pwd")
	if (d !== y.value) {
		return '<img src="assets/icons/errorForm.png"> le mot de passe ne correspond pas';
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