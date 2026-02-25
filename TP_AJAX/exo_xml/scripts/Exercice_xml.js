window.onload = init;

function init() {
    let request = new XMLHttpRequest();
    request.open('GET', 'data/Route_du_cafe.xml');
    request.send();
    request.onreadystatechange = function () {
        traitementReponse(request);
    }

}

function imageMouseOver(element) {
    //console.log(element)
    div_noms = document.getElementById("nomDeClasse");
    div_noms.innerText = element.getAttribute("nom");
    for(let x = 0; x < element.getElementsByTagName("voilier").length; x++) {
        let texte_classe = document.createElement("p");
        texte_classe.innerText = "\n" + "\n" + element.getElementsByTagName("voilier")[x].getElementsByTagName('nom')[0].firstChild.nodeValue + "\nFabriqué en : " + element.getElementsByTagName("voilier")[x].getAttribute('date_construction');
        console.log(element.getElementsByTagName("voilier")[x]);
        div_noms.appendChild(texte_classe);

    }

}

function traitementReponse (request) {
    if (request.readyState == 4 && request.status == 200) {

        let classesVoiliers = request.responseXML.getElementsByTagName('classe');
        div_logos = document.getElementById("logos");
        //console.log(classesVoiliers)
        for(let i = 0; i < classesVoiliers.length; i++) {
            // console.log(classesVoiliers[i])
            let logo_classe = document.createElement("img")
            logo_classe.setAttribute("src", "photos/" + classesVoiliers[i].getElementsByTagName('photo')[0].firstChild.nodeValue)
            logo_classe.setAttribute("height", "120")
            logo_classe.setAttribute("width", "300")
            logo_classe.setAttribute("alt", "Logo de la classe" + classesVoiliers[i].getElementsByTagName('nom')[0].firstChild.nodeValue)
            div_logos.appendChild(logo_classe)
            logo_classe.onmouseover = function() {
                imageMouseOver(classesVoiliers[i])
            }
        }
    }
}





