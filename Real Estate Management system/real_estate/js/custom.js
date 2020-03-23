var email=document.getElementById('email');
var contact=document.getElementById('contact');
var nam=document.getElementById('name');
var pwd=document.getElementById('pwd');
var cpwd=document.getElementById('cpwd');
var emailerror=document.getElementById('emailerror');
var contacterror=document.getElementById('contacterror');
var lemail=document.getElementById('lemail');
var lpwd=document.getElementById('lpwd');
var loginerror=document.getElementById('loginerror');
var nameerror=document.getElementById('nameerror');
var signuperror=document.getElementById('signuperror');


function validateEmail(emailField){
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (reg.test(emailField.value) == false){
        return false;
    }
    return true;
}

	//checks whole validation
	function signupValidation(){
		if(!validateEmail(email)){
			emailerror.style.visibility='visible';
			console.log('email false');
			return false;
        }
    
        if(nam.value.length<3){
			nameerror.style.visibility='visible';
			console.log('nameerror false');
			return false;
		}

		if(contact.value.length!=10){
			contacterror.style.visibility='visible';
			console.log('contacterror false');
			return false;
        }

		if(pwd.value.length<8 || pwd.value.length>20){
			pwderror.style.visibility='visible';
			console.log('pwderror false');
			return false;
		}

		if(pwd.value!=cpwd.value){
			cpwderror.style.visibility='visible';
			console.log('cpwderror false');
			return false;
		}
	}

function loginValidation(){
    if(lemail.value.length<4){
        loginerror.style.visibility='visible';
        return false;
    }

    if(lpwd.value.length<4){
        loginerror.style.visibility='visible';
        return false;
    }
}
function  hideLError(){
    loginerror.style.visibility='hidden';
}

function hideNext(el){
    el=el.nextSibling.nextSibling;
    el.style.visibility='hidden';
    signuperror.style.visibility='hidden';
}