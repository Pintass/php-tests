window.onload = init;

function init() {
    let request = new XMLHttpRequest();
    request.open('GET', 'data/Route_du_Cafe.json');
    request.send();
    request.onreadystatechange = function () {
        traitementReponse(request);
    }
    
}

function imageMouseOver(element) {
    div_noms = document.getElementById("nomDeClasse")
    div_noms.innerText = element.nom

    // on mets la liste de voiliers afin de for dessus.
    element = element.voiliers

    element.forEach(voilier => {
        let texte_classe = document.createElement("p")
        texte_classe.innerText = "\n" + "\n" + voilier.nom + "\nFabriqué en : " + voilier.année;
        div_noms.appendChild(texte_classe)
        
    });
    
}

function traitementReponse (request) {
    if (request.readyState == 4 && request.status == 200) {
        let objetJSON = JSON.parse(request.responseText);
        let classesVoiliers = objetJSON.classes;
        div_logos = document.getElementById("logos");
        classesVoiliers.forEach(element => {
            let logo_classe = document.createElement("img")
            logo_classe.setAttribute("src", "photos/" + element.logo)
            logo_classe.setAttribute("height", "120")
            logo_classe.setAttribute("width", "300")
            logo_classe.setAttribute("alt", "Logo de la classe" + element.nom)
            div_logos.appendChild(logo_classe)
            logo_classe.onmouseover = function() {
                imageMouseOver(element)
            }
        });
    }
}





