class Form {
	constructor(regexName) {
		this.regexName = regexName; // add regex with special charcaters for name  
		this.init();
	}

	init() {
	    this.regexControl("name");
	}

	regexControl(type) {
	    document.getElementById(type).addEventListener("blur", e => {
	        if (document.getElementById(type).value.length < 1) {
                $('#regex_Help_'+ type).text("");
            } else if (!this.regexName.test(e.target.value)) {
                switch (type) {
                    case "name":
                    	let name = document.getElementById("regex_Help_name");
                        if (name.innerHTML == "") {
                        	const i = document.createElement("i");
                        	i.setAttribute("class", "fas fa-times-circle")
                        	name.appendChild(i);
                        	name.css({
                        		color: 'red',
                        	});
                        }
                        break;
                }
            } else {
                $("#regex_Help_" + type).text("");
            }
	    });
	}

}