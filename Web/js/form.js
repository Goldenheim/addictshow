class Form {
	constructor(regexName) {
		this.regexName = regexName; // add regex with special charcaters for name  
		this.validationBtn = $("#editProfil");
		this.subscribeBtn = $("#subscribeBtn");
		this.init();
	}

	init() {
	    this.regexSame("mail_confirm", "mail");
	    this.regexSame("password_confirm", "password");
	    this.subscribe("mail_confirm", "password_confirm")
	}

	regexControl(type) {
	    document.getElementById(type).addEventListener("input", e => {
	        if (document.getElementById(type).value.length < 1) {
                $('#regex_Help_'+ type).text("");
            } else if (!this.regexName.test(e.target.value)) {
                switch (type) {
                    case "name":
                    	let help = document.getElementById("regex_Help_" + type);
                    	help.setAttribute("class", "ml-1")
                        if (help.innerHTML == "") {
                        	const i = document.createElement("i");
                        	i.setAttribute("class", "fas fa-times-circle")
                        	help.appendChild(i);
                        	help.style.color = "red";
                        }
                        break;
                }
            } else {
                $("#regex_Help_" + type).text("");
            }
	    });
	}

	regexSame(type, compare) {
	    document.getElementById(type).addEventListener("input", e => {
	    	let firstInput = document.getElementById(compare);
	        if (document.getElementById(type).value.length < 1) {
                $('#regex_Help_'+ type).text("");
            } else if (document.getElementById(type).value != firstInput.value) {
        		let help = document.getElementById("regex_Help_" + type);
        		help.setAttribute("class", "ml-1")
        	    if (help.innerHTML == "") {
        	    	const i = document.createElement("i");
        	    	i.setAttribute("class", "fas fa-times-circle")
        	    	help.appendChild(i);
        	    	help.style.color = "red";
                }
            } else {
                $("#regex_Help_" + type).text("");
            }
	    });
	}

	// validate btn
	validation() {
	    this.validationBtn.click(e => {
	        if (document.getElementById("regex_Help_name").innerHTML != "") {    
	        	e.preventDefault();
	            alert("Certaines informations sont incorrectes");                      
            }
	    });
	}

	// validate btn
	subscribe(mail, mdp) {
	    this.subscribeBtn.click(e => {
	        if (document.getElementById("regex_Help_" + mail).innerHTML != "" || document.getElementById("regex_Help_" + mdp).innerHTML != "") {    
	        	e.preventDefault();
	            alert("Certaines informations ne correspondent pas");                      
            }
	    });
	}
}