class ShowObj {
	constructor(api) {
		this.api = api;
		this.show = null;
		this.shows = [];
		this.callShow();
	}


	callShow() {
		ajaxGet(this.api, reponse => {
			var shows = JSON.parse(reponse);
			shows['results'].forEach( show => {

				const link = document.createElement("a");
				link.setAttribute('href', 'movie.php?id=' + show.id + '');



				const carousel = document.createElement("div");
				carousel.setAttribute("class", "carousel-item col-md-4");
				const div = document.createElement("div");
				div.id = show.id;
				div.setAttribute("class", "movie-card" );
				carousel.appendChild(div);
				document.getElementById("movieCards").appendChild(carousel);
				div.appendChild(link);

				const infos = document.createElement("div");
				infos.setAttribute("class", "movie-info");
				const section_1 = document.createElement("div");
				section_1.setAttribute("class", "info-section");
				const label_1 = document.createElement("label");
				label_1.appendChild(document.createTextNode("Date de sortie"));
				const span_1 = document.createElement("span");
				span_1.appendChild(document.createTextNode(show.first_air_date));

				const section_2 = document.createElement("div");
				section_2.setAttribute("class", "info-section");
				const label_2 = document.createElement("label");
				label_2.appendChild(document.createTextNode("nb. votes"));
				const span_2 = document.createElement("span");
				span_2.appendChild(document.createTextNode(show.vote_count));

				const section_3 = document.createElement("div");
				section_3.setAttribute("class", "info-section");
				const label_3 = document.createElement("label");
				label_3.appendChild(document.createTextNode("Note"));
				const span_3 = document.createElement("span");
				span_3.appendChild(document.createTextNode(show.vote_average));
				span_3.insertAdjacentHTML('afterbegin', '<i class="fas fa-star"></i> ');

				const date = document.createElement("span");
				date.setAttribute("class", "date");
				date.appendChild(document.createTextNode("sortie : " + show.first_air_date));

				const header = document.createElement("div");
				header.setAttribute("class", "movie-header");
				let url = "url('https://image.tmdb.org/t/p/w500" + show.backdrop_path + "')";
				header.style.background = url;
				div.appendChild(header);

				const iconHeader = document.createElement("div");
				iconHeader.setAttribute("class", "header-icon-container");
				header.appendChild(iconHeader);

				const trailer = document.createElement("a");
				trailer.setAttribute('href', 'movie.php?id=' + show.id + '');
				iconHeader.appendChild(trailer)

				const playBtn = document.createElement("i");
				playBtn.setAttribute("class", "material-icons header-icon");
				playBtn.appendChild(document.createTextNode(""));
				trailer.appendChild(playBtn);

				const titleDiv = document.createElement("div");
				titleDiv.setAttribute("class", "movie-content-header")
				const title = document.createElement("h3");
				title.setAttribute("class", "movie-title" );
				title.appendChild(document.createTextNode(show.name));

				const imax = document.createElement("div");
				imax.setAttribute("class", "imax-logo");

				const content = document.createElement("div");
				content.setAttribute("class", "movie-content");
				
				link.appendChild(title);
				titleDiv.appendChild(link);
				titleDiv.appendChild(imax);

				content.appendChild(titleDiv);
				content.appendChild(infos);
				infos.appendChild(section_1);
				section_1.appendChild(label_1);
				section_1.appendChild(span_1);

				infos.appendChild(section_2);
				section_2.appendChild(label_2);
				section_2.appendChild(span_2);

				infos.appendChild(section_3);
				section_3.appendChild(label_3);
				section_3.appendChild(span_3);

				div.appendChild(content);
			});
		})
	}
}