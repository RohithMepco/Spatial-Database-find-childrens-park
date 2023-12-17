mapboxgl.accessToken =
  "pk.eyJ1Ijoicm9oaXRocmFtYWtyaXNobmFuciIsImEiOiJjbHE3cng3MzgwbjFoMmtuenk4cG9oZGZ1In0.1Z9VTr2Hzj8CAX8lBdGE6A"

navigator.geolocation.getCurrentPosition(successLocation, errorLocation, {
  enableHighAccuracy: true
})
function successLocation(position) {
  setupMap([position.coords.longitude, position.coords.latitude])
}

function errorLocation() {
  setupMap([position.coords.longitude, position.coords.latitude])
}

function setupMap(center) {
  const map = new mapboxgl.Map({
    container: "map",
    style: "mapbox://styles/mapbox/streets-v11",
    center: center,
    zoom: 15
  })

  const nav = new mapboxgl.NavigationControl()
  map.addControl(nav)

  var directions = new MapboxDirections({
    accessToken: mapboxgl.accessToken
  })

  map.addControl(directions, "top-left")
}
