window.onload = init;

function init() {
    const chaineJSON = '[{"nom": "Class40", "logo": "logo_class40.webp", "voiliers": [{"nom": "ALTERNATIVE SAILING- LES CONSTRUCTIONS DU BELON", "année": "2023"}, {"nom": "LES INVINCIBLES", "année": "2024"}]},' +
                    '{"nom": "IMOCA", "logo": "logo_imoca.webp", "voiliers": [{"nom": "CHARAL", "année": "2020"}, {"nom": "ASSOCIATION PETITS PRINCES - QUEGUINER", "année": "2025"}]},' +
                    '{"nom": "Ocean Fifty", "logo": "logo_oceanfifty.webp", "voiliers": [{"nom": "LE RIRE MÉDECIN - LAMOTTE", "année": "2009"}, {"nom": "SOLIDAIRES EN PELOTON", "année": "2020"}]},' +
                    '{"nom": "Ultim", "logo": "logo_classultim.webp", "voiliers": [{"nom": "ACTUAL ULTIM 4", "année": "2017"}, {"nom": "SODEBO ULTIM 3", "année": "2019"}]}]';

    let classesVoiliers = JSON.parse(chaineJSON);
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





