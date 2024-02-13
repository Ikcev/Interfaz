// MAPADesktop
var mapDesktop = L.map("mapidDesktop").setView([43.34548, -1.79738], 8);
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "© OpenStreetMap contributors",
}).addTo(mapDesktop);

var lugares = [
    { "nombre": "Bilbao", "latitud": 43.2630, "longitud": -2.9350 },
    { "nombre": "Vitoria-Gasteiz", "latitud": 42.8467, "longitud": -2.6716 },
    { "nombre": "San Sebastián", "latitud": 43.3184, "longitud": -1.9812 },
    { "nombre": "Hondarribia", "latitud": 43.3686, "longitud": -1.7966 },
    { "nombre": "Zarautz", "latitud": 43.2826, "longitud": -2.1691 },
    { "nombre": "Eibar", "latitud": 43.1836, "longitud": -2.4750 },
    { "nombre": "Getxo", "latitud": 43.3566, "longitud": -3.0089 },
    { "nombre": "Durango", "latitud": 43.1667, "longitud": -2.6333 },
    { "nombre": "Azpeitia", "latitud": 43.1825, "longitud": -2.2650 },
    { "nombre": "Lekeitio", "latitud": 43.3597, "longitud": -2.4981 }
];

lugares.forEach(function (sitio, i = 0, lugares) {
    var marker = L.marker([lugares[i].latitud, lugares[i].longitud]).addTo(mapDesktop);
    marker.bindPopup(lugares[i].nombre).openPopup();
    marker.on('click', function () {
        actualizarInformacion(lugares[i].nombre);
        actualizarInformacion(sitio.nombre);
    });
});

// MAPAMobile
var mapMobile = L.map("mapidMobile").setView([43.34548, -1.79738], 8);
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "© OpenStreetMap contributors",
}).addTo(mapMobile);

lugares.forEach(function (sitio, i = 0, lugares) {
    var marker = L.marker([lugares[i].latitud, lugares[i].longitud]).addTo(mapMobile);
    marker.bindPopup(lugares[i].nombre).openPopup();
    marker.on('click', function () {
        actualizarInformacion(lugares[i].nombre);
        actualizarInformacion(sitio.nombre);
    });
});

//Función LocalStorage
function actualizarInformacion(nombre) {
    var lugaresGuardados = JSON.parse(localStorage.getItem('lugares')) || []; // Obtener lugares guardados o inicializar un array vacío si no hay ninguno
    var index = lugaresGuardados.indexOf(nombre); // Verificar si el nombre ya está en el almacenamiento local

    if (index !== -1) {
        lugaresGuardados.splice(index, 1);
    } else {
        lugaresGuardados.push(nombre);
    }

    localStorage.setItem('lugares', JSON.stringify(lugaresGuardados));
}

//Cambio nombre en localidad Mobile
function actualizarInformacion(nombre) {
    document.getElementById("nombreLocalidad").innerText = nombre;

    const imagen = document.getElementById("imagenLocalidad");

    if (nombre === "Azpeitia" || nombre === "Eibar") {
        imagen.src = `https://source.unsplash.com/1920x1080/?basque-country`;
    } else {
        imagen.src = `https://source.unsplash.com/1920x1080/?${nombre}`;
    }
}

//Actualizar hora Mobile
const now = new Date();
const hours = now.getHours();
const minutes = now.getMinutes();

const formattedHours = hours % 12 || 12;
const amPm = hours >= 12 ? 'PM' : 'AM';

document.getElementById("hora").innerHTML = formattedHours + ':' + (minutes < 10 ? '0' : '') + minutes + ' ' + amPm;


//DRAG&DROP
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();

    var data = ev.dataTransfer.getData("text");
    var draggedElement = document.getElementById(data);
    var iconName = draggedElement.alt;

    var dropTarget = ev.target.closest('.area-destino');


    if (dropTarget.querySelector('.icono-medida')) {
        return;
    }

    dropTarget.innerHTML = `
        <img src="${draggedElement.src}" alt="${iconName}" class="icono-medida" style="max-width: 100%; max-height: 100%;">
    `;

    var col8 = dropTarget.nextElementSibling;
    col8.innerHTML = `
        <p>${iconName}</p>
    `;
}

//GRÁFICO SEMANA
const xValorSemanal = [
    "Lunes",
    "Martes",
    "Miércoles",
    "Jueves",
    "Viernes",
    "Sábado",
    "Domingo",
];

new Chart("semana", {
    type: "line",
    data: {
        labels: xValorSemanal,
        datasets: [
            {
                label: "Temperatura",
                data: [-1, 3, 3, 1, 7, 11, -3],
                borderColor: "red",
                fill: false,
            },
            {
                label: "Humedad",
                data: [70, 20, 80, 88, 65, 63, 99],
                borderColor: "blue",
                fill: false,
            },
        ],
    },
    options: {
        legend: {
            display: true,
            position: "top",
            labels: {
                fontColor: "black",
            },
        },
    },
});

//GRÁFICO MENSUAL
function generaDatosTemperaturaMes() {
    var data = [];
    for (var i = 0; i <= 30; i++) {
        data.push(Math.floor(Math.random() * (20 - -10 + 1)) + -10);
    }
    return data;
}

function generaDatosHumedadMes() {
    var data = [];
    for (var i = 0; i <= 30; i++) {
        data.push(Math.floor(Math.random() * (100 - 50 + 1)) + 50);
    }
    return data;
}

function generateDateArrayMes() {
    const startDate = moment().startOf("day").subtract(1, "months");
    const endDate = moment().endOf("day");
    const dateArray = [];

    let currentDate = startDate.clone();

    while (currentDate.isSameOrBefore(endDate, "day")) {
        dateArray.push(currentDate.format("YYYY-MM-DD"));
        currentDate.add(1, "day");
    }

    return dateArray;
}

const xValorMensual = generateDateArrayMes();

new Chart("mes", {
    type: "line",
    data: {
        labels: xValorMensual,
        datasets: [
            {
                label: "Temperatura",
                data: generaDatosTemperaturaTrimestre(),
                borderColor: "red",
                fill: false,
            },
            {
                label: "Humedad",
                data: generaDatosHumedadTrimestre(),
                borderColor: "blue",
                fill: false,
            },
        ],
    },
    options: {
        legend: {
            display: true,
            position: "top",
            labels: {
                fontColor: "black",
            },
        },
        scales: {
            xAxes: [
                {
                    type: "time",
                    time: {
                        unit: "day",
                        displayFormats: {
                            day: "YYYY-MM-DD",
                        },
                    },
                    ticks: {
                        autoSkip: true,
                        maxRotation: 45,
                        minRotation: 45,
                    },
                },
            ],
        },
    },
});

//GRÁFICO TRIMESTRAL
function generaDatosTemperaturaTrimestre() {
    var data = [];
    for (var i = 0; i <= 90; i++) {
        data.push(Math.floor(Math.random() * (20 - -10 + 1)) + -10);
    }
    return data;
}

function generaDatosHumedadTrimestre() {
    var data = [];
    for (var i = 0; i <= 90; i++) {
        data.push(Math.floor(Math.random() * (100 - 50 + 1)) + 50);
    }
    return data;
}

function generateDateArrayTrimestre() {
    const startDate = moment().startOf("day").subtract(3, "months");
    const endDate = moment().endOf("day");
    const dateArray = [];

    let currentDate = startDate.clone();

    while (currentDate.isSameOrBefore(endDate, "day")) {
        dateArray.push(currentDate.format("YYYY-MM-DD"));
        currentDate.add(1, "day");
    }

    return dateArray;
}

const xValorTrimestral = generateDateArrayTrimestre();

new Chart("trimestre", {
    type: "line",
    data: {
        labels: xValorTrimestral,
        datasets: [
            {
                label: "Temperatura",
                data: generaDatosTemperaturaTrimestre(),
                borderColor: "red",
                fill: false,
            },
            {
                label: "Humedad",
                data: generaDatosHumedadTrimestre(),
                borderColor: "blue",
                fill: false,
            },
        ],
    },
    options: {
        legend: {
            display: true,
            position: "top",
            labels: {
                fontColor: "black",
            },
        },
        scales: {
            xAxes: [
                {
                    type: "time",
                    time: {
                        unit: "day",
                        displayFormats: {
                            day: "YYYY-MM-DD",
                        },
                    },
                    ticks: {
                        autoSkip: true,
                        maxRotation: 45,
                        minRotation: 45,
                    },
                },
            ],
        },
    },
});

//APARICIÓN DE GRÁFICOS

let graficoActual = null;

function mostrarGrafico(idGrafico) {
    if (graficoActual) {
        document.getElementById(graficoActual).classList.add('d-none');
    }

    document.getElementById(idGrafico).classList.remove('d-none');

    graficoActual = idGrafico;
}

//Tooltip
const url = "https://api.euskadi.eus/euskalmet/weather/regions/basque_country/zones/great_bilbao/locations/bilbao/forecast/at/2023/11/28/for/20231129";
const token = "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJtZXQwMS5hcGlrZXkiLCJpc3MiOiJJRVMgUExBSUFVTkRJIEJISSBJUlVOIiwiZXhwIjoyMjM4MTMxMDAyLCJ2ZXJzaW9uIjoiMS4wLjAiLCJpYXQiOjE2Mzk3NDc5MDcsImVtYWlsIjoiaWtjZXZAcGxhaWF1bmRpLm5ldCJ9.nbfhKPLI8jE7041hYZqHbqJt1-1zF7MMQW3R6HTvqCC3iljvf25kC4uSNLo6FPI1YWwNW-PB8IBNJeyFmdtoaKLsR2V1lLwUDvahmiVZaaBorwQJba6-ow9jt_9fcPuvjEpa_dizNQuzb1NIHjsC1BdV_VB1_N7TT0F7Qc8veA3gyZtt4L3ygkNG89nLcZtJvzZoTD9hwquT6h0JbGRwW80Rr0PVEawK0U6WCuKJVeuuOlDFq7nSog6JcgYUqiricSlWvDiQ2UHI_IS3ZFVA7UjxGoxwCtfXI_kDoOUeJvJS1BwPSb410yGPf-RPS0h0iIqqbwVFGaw8w2ibeugADg";

async function fetchData() {
  try {
    const response = await fetch(url, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
    
    if (!response.ok) {
      if (response.status === 401) {
        throw new Error("Error de autenticación. Comprueba tu token.");
      } else {
        throw new Error(`Error HTTP! Estado: ${response.status}`);
      }
    }
    
    const data = await response.json();

    if (data.forecastText && data.forecastText.SPANISH) {
      const forecastTextSpanish = data.forecastText.SPANISH;

      const forecastTextElement = document.getElementById("forecast-text");
      forecastTextElement.innerText = forecastTextSpanish;

      console.log(forecastTextSpanish);
    } else {
      throw new Error("No se pudo encontrar el pronóstico en español.");
    }
  } catch (error) {
    console.error("Error al hacer la solicitud:", error);
  }
}

fetchData();



