//MAPADesktop
var mapDesktop = L.map("mapidDesktop").setView([43.34548, -1.79738], 8);
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "© OpenStreetMap contributors",
}).addTo(mapDesktop);

var lugares = [
    { "nombre": "Irun", "latitud": 43.3390, "longitud": -1.7896 },
    { "nombre": "Donosti", "latitud": 43.3183, "longitud": -1.9812 },
    { "nombre": "Renteria", "latitud": 43.3119, "longitud": -1.8985 }
];

lugares.forEach( function(sitio,i=0,lugares){
    L.marker([lugares[i].latitud, lugares[i].longitud]).addTo(mapDesktop)
        .bindPopup(lugares[i].nombre)
        .openPopup();
});

//MAPA
var mapMobile = L.map("mapidMobile").setView([43.34548, -1.79738], 8);
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "© OpenStreetMap contributors",
}).addTo(mapMobile);

lugares.forEach( function(sitio,i=0,lugares){
    L.marker([lugares[i].latitud, lugares[i].longitud]).addTo(mapMobile)
        .bindPopup(lugares[i].nombre)
        .openPopup();
});


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
    ev.target.appendChild(document.getElementById(data));

    var draggedElement = document.getElementById(data);
    var iconName = draggedElement.alt;

    var dropTarget = ev.target.closest('.area-destino');
    var col9 = dropTarget.nextElementSibling;

    col9.innerHTML = `<p>${iconName}</p>`;
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
