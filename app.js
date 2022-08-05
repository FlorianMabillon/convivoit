let buttonChercher = document.querySelector("#chercher_trajet");
let buttonCreer = document.querySelector("#creer_trajet");

function initMap() {
  const directionsService = new google.maps.DirectionsService();
  const directionsRenderer = new google.maps.DirectionsRenderer();
  if (document.getElementById("map") != undefined) {
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 7,
      center: { lat: 41.85, lng: -87.65 },
    });

    directionsRenderer.setMap(map);
  }
}

function handleClick(event) {
  event.preventDefault();

  const directionsService = new google.maps.DirectionsService();
  const directionsRenderer = new google.maps.DirectionsRenderer();
  calculateAndDisplayRoute(directionsService, event);
}

function calculateAndDisplayRoute(directionsService, event) {
  directionsService
    .route({
      origin: {
        query: document.getElementById("start").value,
      },
      destination: {
        query: document.getElementById("end").value,
      },
      unitSystem: google.maps.UnitSystem.METRIC,
      drivingOptions: {
        departureTime: new Date(),
        trafficModel: "optimistic",
      },
      travelMode: google.maps.TravelMode.DRIVING,
    })
    .then((response) => {
      let results = response;

      let start = document.querySelector("#start").value;
      let end = document.querySelector("#end").value;
      let date = document.querySelector("#date").value;
      let time = document.querySelector("#time").value;
      let seats = document.querySelector("#nbrPlace").value;
      let travelDate = date + " " + time;
      let duree = results.routes[0].legs[0].duration.text;
      let distance = results.routes[0].legs[0].distance.text;

      if (event.target.value === "proposer") {
        window.location.href = `creation_trajet.php?start=${start}&end=${end}&travelDate=${travelDate}&seats=${seats}&duree=${duree}&distance=${distance}`;
      } else if (event.target.value === "chercher") {
        window.location.href = `recherche_trajet.php?start=${start}&end=${end}&travelDate=${travelDate}&seats=${seats}`;
      }
    });
}




buttonChercher.addEventListener("click", handleClick);
buttonCreer.addEventListener("click", handleClick);

