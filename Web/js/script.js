/**
 * [apivelov description]
 * @type {String}
 */
const api = "https://api.themoviedb.org/3/discover/tv?api_key=22b5d3d2b10babbb4291177132454423&language=fr-FR&sort_by=popularity.desc&air_date.gte=2019&page=1&timezone=France%2FPARIS&include_null_first_air_dates=false";

window.addEventListener("DOMContentLoaded", e => {
    /**
     * [show description]
     * @type {ShowObj}
     */
    let Shows = new ShowObj(api);
});

