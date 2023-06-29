
// Prends l'indice des jour coché
function getMarkedDay(paramsContainer) {
    var ensembleJour = paramsContainer.getElementsByClassName("jour");
    var indices = [];
    for (let index = 0; index < ensembleJour.length; index++) {
        const element = ensembleJour[index];
        if (element.classList.contains("jour--checked")) {
            indices.push(index);
        }
    }
    return indices;
}

// Vérification du nouveau parametre
function checkNewParameter(newParams, oldParams) {
    for (let index = 0; index < oldParams.length; index++) {
        const element = oldParams[index];
        if (element[0] == newParams[0] && element[1] == newParams[1] && element[2] == newParams[2]) {
            return false;
        }
    }
    return true;
}

// Ajout le paramètre en HTLM dans le formulaire
function insertHTMLParameter(parametre) {
    var HTMLelement = `
        <input class="jour" type="number" name="jour[]">
        <input class="star-time" type="time" name="star-time[]">
        <input class="end-time" type="time" name="end-time[]">
        <input class="price" type="number" name="price[]">
    `;
    var input = document.createElement("div");
    input.classList.add("group-input");
    input.innerHTML = HTMLelement;
    
    var jour = input.getElementsByClassName("jour")[0];
    var start = input.getElementsByClassName("star-time")[0];
    var end = input.getElementsByClassName("end-time")[0];
    var price = input.getElementsByClassName("price")[0];

    jour.value = parametre[0];
    start.value = parametre[1];
    end.value = parametre[2];
    price.value = parametre[3];

    var paramsContainer = document.getElementById("send-form");
    paramsContainer.appendChild(input);
}

// Ajout du paramètre
function addNewParameter() {
    var insertParameter = document.getElementById("parameter-insert");
    var price = insertParameter.getElementsByClassName("prix")[0].value;
    var begin = insertParameter.getElementsByClassName("start")[0].value;
    var end = insertParameter.getElementsByClassName("end")[0].value;

    if (price == "" || begin == "" || end == "") {
        return;
    }

    var markedDay = getMarkedDay(insertParameter);
    var parameters = [];
    for (let index = 0; index < markedDay.length; index++) {
        const element = markedDay[index];
        parameters.push([element + 1, begin, end, price]);
    }

    for (let index = 0; index < parameters.length; index++) {
        const element = parameters[index];
        insertHTMLParameter(element);
    }

    const formulaire = document.getElementById("send-form");
    formulaire.submit();
}

function changeState(element) {
    if (!element.classList.contains("jour--checked")) {
        element.classList.add("jour--checked");
    } else {
        element.classList.remove("jour--checked");
    }
}


// Affichage des paramètres
function getDifferentParameter(inputsParameters) {
    var parameters = [];
    for (let index = 0; index < inputsParameters.length; index++) {
        const element = inputsParameters[index];
        if (!newParameters(parameters, element)) {
            parameters.push([element[1], element[2], element[3]]);
        }
    }
    return parameters;
}

function newParameters(parameters, newParams) {
    for (let index = 0; index < parameters.length; index++) {
        const element = parameters[index];
        if (element[0] == newParams[1] && element[1] == newParams[2] && element[2] == newParams[3]) {
            return true;
        }
    }
    return false;
}

function separateGroup(inputsParameters, parameters) {
    var groups = [];
    for (let index = 0; index < parameters.length; index++) {
        groups.push([]);
    }

    for (let i = 0; i < inputsParameters.length; i++) {
        const input = inputsParameters[i];
        for (let j = 0; j < parameters.length; j++) {
            const param = parameters[j];
            if (input[1] == param[0] && input[2] == param[1] && input[3] == param[2]) {
                groups[j].push(input);
            }
        }
    }

    return groups;
}

// Prends les parametres utile aux inputs
function getInputsParameters(formulaire) {
    var inputs = formulaire.getElementsByClassName("group-input");
    var inputsParameters = [];
    for (let index = 0; index < inputs.length; index++) {
        const element = inputs[index];
        inputsParameters.push([element.getElementsByClassName("jour")[0].value, element.getElementsByClassName("star-time")[0].value, element.getElementsByClassName("end-time")[0].value, element.getElementsByClassName("price")[0].value])
    }
    return inputsParameters;
}

// Coche les éléments présent dans le group
function changeDayState(paramGroup, group) {
    var dayList = paramGroup.getElementsByClassName("jour");
    for (let index = 0; index < group.length; index++) {
        const element = group[index];
        dayList[parseInt(element[0] - 1)].classList.add("jour--checked")
    }
}

// Affiche le groupe en html
function displayGroup(group) {
    var link = "/deleteDisponibility?start=" + group[0][1] + "&&end=" + group[0][2] + "&&price=" + group[0][3];
    var HTMLelement = `
            <div class="col-md-4">
                <ul>
                    <li class="jour">L</li>
                    <li class="jour">M</li>
                    <li class="jour">M</li>
                    <li class="jour">J</li>
                    <li class="jour">V</li>
                    <li class="jour">S</li>
                    <li class="jour">D</li>
                </ul>
            </div>
            <div class="col-md-3 hour">
                <span class="begin"> </span> à <span class="end"></span> 
            </div>
            <div class="col-md-3 price">
                
            </div>
            <div class="col-md-2 delete">
                <a href="` + link + `">
                    <i class="fas fa-times"></i>
                </a>
            </div>`;

    var paramGroup = document.createElement("div");
    paramGroup.classList.add("row", "param-group", "mt-2");
    paramGroup.innerHTML = HTMLelement;
    changeDayState(paramGroup, group);     // Checked les éléments présent dans le group

    var begin = paramGroup.getElementsByClassName("begin")[0];
    var end = paramGroup.getElementsByClassName("end")[0];
    var price = paramGroup.getElementsByClassName("price")[0];

    begin.textContent = group[0][1] + " H";
    end.textContent = group[0][2] + " H";
    price.textContent = group[0][3] + " Ar";

    var container = document.getElementById("listes-parametres");
    container.appendChild(paramGroup);
}

// Pour avoir les parametres existant
function getExistParameter() {
    var hiddenForm = document.getElementById('hidden-form');
    var inputsParameters = getInputsParameters(hiddenForm);
    var parameter = getDifferentParameter(inputsParameters);
    return parameter;
}

// Affiche les parametre en mode bouton rond
function displayParameter() {
    var hiddenForm = document.getElementById('hidden-form');
    var container = document.getElementById("listes-parametres");
    container.innerHTML = "";
    var inputsParameters = getInputsParameters(hiddenForm);
    var parameter = getDifferentParameter(inputsParameters);      // Trouve tous les parametres clé
    var groups = separateGroup(inputsParameters, parameter);       // Grouper les inputs à partir des paramètres clé
    for (let index = 0; index < groups.length; index++) {
        const element = groups[index];
        displayGroup(element);
    }
}

displayParameter();

