window.onload = init;

function init() {
    let request = new XMLHttpRequest();
    request.open('GET', 'data/Route_du_cafe.xml');
    request.send();
    request.onreadystatechange = function () {
        traitementReponse(request);
    }

}
function onchangeCheckbox(element) {
    let requete = new XMLHttpRequest();
    requete.open('POST', 'scripts/sauvegarde.php');
    requete.setRequestHeader('Content-Type', 'application/json');
    requete.send(JSON.stringify((element)));
    requete.onreadystatechange = function () {
        console.log(requete.responseText)
    }
}

function imageMouseOver(element) {
    let liste_checkboxs = []
    let liste_voiliers_checked = []
    div_noms = document.getElementById("nomDeClasse");
    div_noms.innerText = element.getAttribute("nom");
    for(let x = 0; x < element.getElementsByTagName("voilier").length; x++) {
        let texte_classe = document.createElement("p");
        texte_classe.innerText = "\n" + "\n" + element.getElementsByTagName("voilier")[x].getElementsByTagName('nom')[0].firstChild.nodeValue + "\nFabriqué en : " + element.getElementsByTagName("voilier")[x].getAttribute('date_construction');
        div_noms.appendChild(texte_classe);

        let checkboxs = document.createElement("input");
        checkboxs.setAttribute("type", "checkbox");
        div_noms.appendChild(checkboxs);

        let voilier = {
            nom: element.getElementsByTagName("voilier")[x].getElementsByTagName('nom')[0].firstChild.nodeValue,
            skipper1: element.getElementsByTagName("voilier")[x].getElementsByTagName('skipper')[0].firstChild.nodeValue,
            skipper2: element.getElementsByTagName("voilier")[x].getElementsByTagName('skipper')[1].firstChild.nodeValue,
            index: x,
        }
        liste_checkboxs.push([checkboxs, voilier]) // ajout dans la liste des checkboxs

    }

    for(let x = 0; x < liste_checkboxs.length; x++) {
        liste_checkboxs[x][0].onchange = function () {
            if (liste_checkboxs[x][0].checked) {
                for (let k = 0; k < liste_checkboxs.length; k++) {
                    if (liste_checkboxs[k][0].checked) {
                        liste_voiliers_checked.push(liste_checkboxs[k][1])
                    }
                }
                onchangeCheckbox(liste_voiliers_checked);
            }
        }
    }
}

function traitementReponse (request) {
    if (request.readyState == 4 && request.status == 200) {

        let classesVoiliers = request.responseXML.getElementsByTagName('classe');
        div_logos = document.getElementById("logos");
        for(let i = 0; i < classesVoiliers.length; i++) {
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







