/**
 * @license
 * Copyright 2019 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
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

  calculateAndDisplayRoute(directionsService, directionsRenderer)
}

function calculateAndDisplayRoute(directionsService, directionsRenderer) {

  let url_string = window.location.href
  let url = new URL(url_string);
  let start = url.searchParams.get("start");
  let end = url.searchParams.get("end");

  directionsService
    .route({
      origin: {
        query: start,
      },
      destination: {
        query: end,
      },
      unitSystem: google.maps.UnitSystem.METRIC,
      drivingOptions: {
        departureTime: new Date(),
        trafficModel: 'optimistic'
      },
      travelMode: google.maps.TravelMode.DRIVING,
    })
    .then((response) => {
      let results = response;
      console.log(response);

      // Affichage de la page avec les infos

      // const depart = document.querySelector('#depart');
      // depart.textContent = results.routes[0].legs[0].start_address;

      // const arrivee = document.querySelector('#arrivee');
      // arrivee.textContent = results.routes[0].legs[0].end_address;

      // const distance = document.getElementById('distance');
      // distance.textContent = results.routes[0].legs[0].distance.text;

      // const duree = document.getElementById('duree');
      // duree.textContent = results.routes[0].legs[0].duration.text;

      

      directionsRenderer.setDirections(response);
    })
    .catch((e) => console.log(e))

}

window.initMap = initMap;


