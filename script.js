document.addEventListener("DOMContentLoaded", function() {
    const getWeatherButton = document.getElementById("getWeatherButton");
    const cityInput = document.getElementById("cityInput");
    const weatherInfoElement = document.getElementById("weatherInfo");

    getWeatherButton.addEventListener("click", function() {
        const city = cityInput.value;

        fetchWeatherData(city);
    });

    function fetchWeatherData(city) {
        fetch(`http://localhost:80/project1/multiply.php?city=${encodeURIComponent(city)}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json(); // Parse JSON response
            })
            .then(data => {
                if (data.error) {
                    weatherInfoElement.textContent = data.error;
                } else {
                    // Update HTML elements with data received from PHP
                    weatherInfoElement.innerHTML = `
                    Max Temperature: ${data.maxTemp}<br>
                    Min Temperature: ${data.minTemp} °C<br>
                    Condition: ${data.condition}<br>
                    <img src="${data.conditionIcon}" alt="${data.condition}">
                `;
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    }
});