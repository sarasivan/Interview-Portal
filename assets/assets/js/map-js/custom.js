(function ($) {
  // Custom js
  function buildMap(lat, lon) {
    document.getElementById("weathermap").innerHTML =
      "<div id='map' style='width: 100%; height: 100%;'></div>";
    var osmUrl = "http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
      osmAttribution =
        'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors,' +
        ' <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
      osmLayer = new L.TileLayer(osmUrl, {
        maxZoom: 18,
        attribution: osmAttribution,
      });
    var map = new L.Map("map");
    map.setView(new L.LatLng(lat, lon), 9);
    map.addLayer(osmLayer);
    var validatorsLayer = new OsmJs.Weather.LeafletLayer({ lang: "en" });
    map.addLayer(validatorsLayer);
  }
  document.getElementById("weathermap").innerHTML =
    "<div id='map' style='width: 100%; height: 100%;'></div>";
  var DATE_FORMAT = "dd.mm.yy";
  var strToDateUTC = function (str) {
    var date = $.datepicker.parseDate(DATE_FORMAT, str);
    return new Date(date - date.getTimezoneOffset() * 60 * 1000);
  };

  var map = L.map("map2").setView([60, 50], 3);

  var osm = L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
    maxZoom: 18,
    attribution:
      'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a  href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
  }).addTo(map);

  new L.Hash(map);

  var $date = $("#date");

  var now = new Date();
  var oneDay = 1000 * 60 * 60 * 24, // milliseconds in one day
    startTimestamp =
      now.getTime() - oneDay + now.getTimezoneOffset() * 60 * 1000,
    startDate = new Date(startTimestamp); //previous day

  $date.val($.datepicker.formatDate(DATE_FORMAT, startDate));

  var baseLayers = {};

  for (var id in L.GIBS_LAYERS) {
    baseLayers[id] = new L.GIBSLayer(id, {
      date: startDate,
      transparent: true,
    });
  }

  L.control.layers(baseLayers, null, { collapsed: false }).addTo(map);

  baseLayers["MODIS_Aqua_CorrectedReflectance_TrueColor"].addTo(map);

  $(".leaflet-control-layers").scrollTop(10000);

  var alterDate = function (delta) {
    var date = $.datepicker.parseDate(DATE_FORMAT, $date.val());

    $date
      .val(
        $.datepicker.formatDate(
          DATE_FORMAT,
          new Date(date.valueOf() + delta * oneDay)
        )
      )
      .change();
  };

  document.getElementById("prev").onclick = alterDate.bind(null, -1);
  document.getElementById("next").onclick = alterDate.bind(null, 1);

  $date
    .datepicker({
      dateFormat: DATE_FORMAT,
    })
    .change(function () {
      var date = strToDateUTC(this.value);
      for (var l in baseLayers) {
        baseLayers[l].setDate(date);
      }
    });

  map
    .on("click", function () {
      $date.datepicker("hide");
    })
    .on("baselayerchange", function (event) {
      $("#controls").toggle(event.layer.isTemporal());
      $("#transparent-container").toggle(!!event.layer.setTransparent);
    });

  $("#transparent-checkbox").change(function () {
    for (var l in baseLayers) {
      baseLayers[l].setTransparent &&
        baseLayers[l].setTransparent(this.checked);
    }
  });
})(jQuery);

// Area Bubbles //
var bubble_map = new Datamap({
  element: document.getElementById('bubbles'),

  geographyConfig: {
    popupOnHover: false,
    highlightOnHover: false,
  },
  fills: {
    defaultFill: 'rgba(var(--primary),0.6)',
    USA: '#fff',
  },
});
var radius = 6;
bubble_map.bubbles(
  [
    {
      name: 'Not a bomb, but centered on Brazil',
      radius: radius,
      centered: 'BRA',
      country: 'USA',
      yeild: 0,
      fillKey: 'USA',
      date: '1954-03-01',
      borderColor: 'var(--danger)',
      latitude: 50.415,
      longitude: 270,
    },
    {
      name: 'Not a bomb',
      radius: radius,
      yeild: 0,
      country: 'USA',
      centered: 'USA',
      date: '1986-06-05',
      significance: 'Centered on US',
      fillKey: 'USA',
      borderColor: 'rgba(var(--primary),1)',
      latitude: 50.415,
      longitude: 100.1619,
    },
    {
      name: 'Castle Bravo',
      radius: radius,
      yeild: 15000,
      country: 'USA',
      significance: 'First dry fusion fuel "staged" thermonuclear weapon; a serious nuclear fallout accident occurred',
      fillKey: 'USA',
      date: '1954-03-01',
      latitude: 1.415,
      longitude: 20.1619,
      borderColor: 'var(--title)',
    },
  ],
  {},
);

// Con Fig  //

var defaultOptions = {
  scope: 'world', //currently supports 'usa' and 'world', however with custom map data you can specify your own
  //returns a d3 path and projection functions
  projection: 'equirectangular', //style of projection to be used. try "mercator"
  height: null, //if not null, datamaps will grab the height of 'element'
  width: null, //if not null, datamaps will grab the width of 'element'
  responsive: true, //if true, call `resize()` on the map object when it should adjust it's size
  done: function () {}, //callback when the map is done drawing
  fills: {
    defaultFill: '#ABDDA4', //the keys in this object map to the "fillKey" of [data] or [bubbles]
  },
  dataType: 'json', //for use with dataUrl, currently 'json' or 'csv'. CSV should have an `id` column
  dataUrl: null, //if not null, datamaps will attempt to fetch this based on dataType ( default: json )
  geographyConfig: {
    dataUrl: null, //if not null, datamaps will fetch the map JSON (currently only supports topojson)
    hideAntarctica: true,
    borderWidth: 1,
    borderOpacity: 1,
    borderColor: '#FDFDFD',
    popupTemplate: function (geography, data) {
      //this function should just return a string
      return '<div class="hoverinfo"><strong>' + geography.properties.name + '</strong></div>';
    },
    popupOnHover: true, //disable the popup while hovering
    highlightOnHover: true,
    highlightFillColor: '#FC8D59',
    highlightBorderColor: 'rgba(250, 15, 160, 0.2)',
    highlightBorderWidth: 2,
    highlightBorderOpacity: 1,
  },
  bubblesConfig: {
    borderWidth: 2,
    borderOpacity: 1,
    borderColor: '#FFFFFF',
    popupOnHover: true,
    radius: 5,
    popupTemplate: function (geography, data) {
      return '<div class="hoverinfo"><strong>' + data.name + '</strong></div>';
    },
    fillOpacity: 0.75,
    animate: true,
    highlightOnHover: true,
    highlightFillColor: '#FC8D59',
    highlightBorderColor: 'rgba(250, 15, 160, 0.2)',
    highlightBorderWidth: 2,
    highlightBorderOpacity: 1,
    highlightFillOpacity: 0.85,
    exitDelay: 100,
    key: JSON.stringify,
  },
};
