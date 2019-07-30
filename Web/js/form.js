class Form {
	constructor(regexName) {
		this.regexName = regexName; // add regex with special charcaters for name  
		this.validationBtn = $("#editProfil");
		this.init();
	}

	init() {
	    this.regexControl("name");
	    this.validation();
	}

	regexControl(type) {
	    document.getElementById(type).addEventListener("input", e => {
	        if (document.getElementById(type).value.length < 1) {
                $('#regex_Help_'+ type).text("");
            } else if (!this.regexName.test(e.target.value)) {
                switch (type) {
                    case "name":
                    	let name = document.getElementById("regex_Help_" + type);
                    	name.setAttribute("class", "ml-1")
                        if (name.innerHTML == "") {
                        	const i = document.createElement("i");
                        	i.setAttribute("class", "fas fa-times-circle")
                        	name.appendChild(i);
                        	name.style.color = "red";
                        }
                        break;
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
}