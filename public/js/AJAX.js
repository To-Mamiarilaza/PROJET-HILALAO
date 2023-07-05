// Insertion des donnée du point en mode AJAX
function insertNewPoint(latitude, longitude) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Traitement de la réponse ici
            var response = xhr.responseText;
            console.log(response);
        }
    };

    var formData = new FormData();
    formData.append('latitude', latitude);
    formData.append('longitude', longitude);


    xhr.open('POST', 'http://localhost/TD_n_3/insertPosition.php', true);

    xhr.send(formData);
}

// Prendre tous les points dans la base 
function getAllPoint(stockage) {
    var xhr = new XMLHttpRequest();
    
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Traitement de la réponse ici
            var response = xhr.responseText;
            response = JSON.parse(response);
            var result = [];
            for (let index = 0; index < response.length; index++) {
                const element = response[index];
                result.push(new google.maps.LatLng(element.latitude, element.longitude));
            }
            stockage = result;
        }
    };

    xhr.open('GET', 'http://localhost/TD_n_3/getAllPoint.php', true);

    xhr.send();
}