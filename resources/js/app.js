document.getElementById("country").addEventListener("change", function () {
    var countryId = this.value;

    if (countryId) {
        console.log(countryId);

        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/get-states/" + countryId, true);

        xhr.onload = function () {
            console.log(xhr.status);
            
            if (xhr.status === 200) {
                alert(200);
                try {
                    console.log(xhr.responseText);
                    
                    var states = JSON.parse(xhr.responseText);
                    console.log(states);
                   

                    var stateSelect = document.getElementById("state");
                    stateSelect.innerHTML =
                        '<option value="">Select state</option>';

                    states.forEach(function (state) {
                        var option = document.createElement("option");
                        option.value = state.id;
                        option.textContent = state.name;
                        stateSelect.appendChild(option);
                    });
                } catch (e) {
                    console.error("Invalid JSON response:", xhr.responseText);
                }
            } else {
                console.error("Error loading states:", xhr.status);
            }
        };
        xhr.onerror = function () {
            console.error("Request failed.");
        };

        xhr.send();
    } else {
        var stateSelect = document.getElementById("state");
        stateSelect.innerHTML = '<option value="">Select state</option>';
    }
});
document.getElementById("state").addEventListener("change", function () {
    var stateId = this.value;
    if (stateId) {
        
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/get-city/" + stateId, true);


        xhr.onload = function () {
            console.log(xhr.status);
            if (xhr.status === 200) {
                
                try {
                    var cities = JSON.parse(xhr.responseText);
                    console.log(cities);
                   

                    var cityselect = document.getElementById("city");
                    cityselect.innerHTML =
                        '<option value="">Select city</option>';

                    cities.forEach(function (city) {
                        var option = document.createElement("option");
                        option.value = city.id;
                        option.textContent = city.name;
                        cityselect.appendChild(option);
                    });
                } catch (e) {
                    console.error("Invalid json response", xhr.responseText);
                }
            } else {
                console.error("Error loading states", xhr.status);
            }
        };
        xhr.onerror = function () {
            console.error("Request failed.");
        };
        xhr.send();
    } else {
        var selectcity = document.getElementById("city");
        selectcity.innerHTML = '<option value="">Select city</option>';
    }
});

document.getElementById("city").addEventListener("change", function () {
    var cityId = this.value;
    alert(cityId);
    if (cityId) {
        
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/select-city/" + cityId, true);


        xhr.onload = function () {
            console.log(xhr.status);
            if (xhr.status === 200) {
                
                try {
                    var cities = JSON.parse(xhr.responseText);
                    console.log(cities);
                } catch (e) {
                    console.error("Invalid json response", xhr.responseText);
                }
            } else {
                console.error("Error loading states", xhr.status);
            }
        };
        xhr.onerror = function () {
            console.error("Request failed.");
        };
        xhr.send();
    } else {
       
    }
});

