// time 
// function startTime() {
//     var today = new Date();
//     var h = today.getHours();
//     var m = today.getMinutes();
//     // var s = today.getSeconds();
//     var ampm = h >= 12 ? 'PM' : 'AM';
//     h = h % 12;
//     h = h ? h : 12;
//     m = checkTime(m);
//     // s = checkTime(s);
//     document.getElementById('txt').innerHTML =
//         h + ":" + m + ' ' + ampm;
//     var t = setTimeout(startTime, 500);
// }
// function checkTime(i) {
//     if (i < 10) { i = "0" + i };  // add zero in front of numbers < 10
//     return i;
// }
// 
// order chart
// vector map
! function(maps) {
  "use strict";
  var b = function() {};
  b.prototype.init = function() {
      maps("#asia").vectorMap({
          map: "asia_mill",
          backgroundColor: "transparent",
          regionStyle: {
              initial: {
                  fill: CionAdminConfig.primary,
                  opacity: 0.50
              } 
          },
          zoomButtons : false,
          markers: [
              { latLng: [39.91, 116.36], name: 'china', style: {r: 8, fill:'#61ae41'}},
              { latLng: [24.774, 46.73], name: 'saudi Arbia', style: {r: 8, fill: CionAdminConfig.primary}},
              { latLng: [43.238949, 76.889709], name: 'Kazakhstan', style: {r: 8, fill: CionAdminConfig.secondary}}
          ],
          series: {
        regions: [{
          scale: ['#fdd5df', '#fd0846'],
          normalizeFunction: 'polynomial',
        }]
      }
      })
  }, maps.VectorMap = new b, maps.VectorMap.Constructor = b
}(window.jQuery),
  function(maps) {
      "use strict";
      maps.VectorMap.init()
}(window.jQuery);
// area spaline chart
var options1 = {
  chart: {
      height: 385,
      type: 'area',
      toolbar:{
        show: false
      }
  },
  dataLabels: {
      enabled: false
  },
  stroke: {
      curve: 'smooth'
  },
  series: [{
      name: 'series1',
      data: [0, 40, 25,80,35,40,38, 50, 35, 70, 40 , 100]
  }, {
      name: 'series2',
      data: [5, 50, 70,55,78,45,100, 80, 85, 60, 35 , 80]
  }],
  xaxis: {
      categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct" , "Nov" , "Dec"],
      labels: {
        style: {
          fontSize: "13px",
          colors: "#848789",
          fontFamily: "nunito, sans-serif",
        },
      },
      axisBorder: {
        show: false
      },
  },
  yaxis: {
    labels: {
      formatter: function (val) {
        return val + "0" + "k";
      },
      style: {
        fontSize: "14px",
        colors: "$black",
        fontFamily: "nunito, sans-serif",
      },
    },
  },
  tooltip: {
      x: {
          format: 'dd/MM/yy HH:mm'
      },
  },
  legend: {
    show: false,
  },
  fill: {
    colors: [ CionAdminConfig.primary , CionAdminConfig.secondary],
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.6,
      opacityTo: 0.4,
      stops: [0, 90, 100]
    },
  },
  colors:[ CionAdminConfig.primary , CionAdminConfig.secondary]
}
var chart1 = new ApexCharts(
  document.querySelector("#area-line"),
  options1
);
chart1.render();
// Product Sales
var options = {
  series: [{
    name: "Desktops",
    data: [5, 15, 65, 40, 39, 50, 35, 38, 47, 40 , 90, 58, 65, 70 , 75 , 70 , 67 , 30 , 69, 65, 75, 72, 65, 72, 95, 50 , 45 , 57 , 54 , 48 , 53 , 60 , 25, 30]
}],
  chart: {
  height: 300,
  type: 'line',
  zoom: {
    enabled: false
  },
  toolbar:{
    show: false,
  },  
},
dataLabels: {
  enabled: false
},
stroke: {
  curve: 'straight',
},
colors:[ CionAdminConfig.primary ],
grid: {
  row: {
    colors: ['transparent'], // takes an array which will be repeated on columns
    opacity: 0.5
  },
},
xaxis: {
  categories: [' ', ' ', '12:00', ' ', ' ', ' ', '', ' ', '15:00' , ' ' , ' ' , ' ' , ' ' , ' ' , '18:00', ' ', ' ', ' ', ' ', ' ', '21:00', ' ', ' ' , ' ' , ' ' , ' ' , '03:00' , ' ' , ' ', ' ', ' ', ' ' , '04:00' , ' ' , ' ' ],
  labels: {
    style: {
      fontSize: "13px",
      colors: "#848789",
      fontFamily: "nunito, sans-serif",
    },
  },
  axisBorder: {
    show: false
  },
},
yaxis: {
  labels: {
    formatter: function (val) {
      return "$" + val + "" + "k";
    },
    style: {
      fontSize: "14px",
      colors: "$black",
      fontWeight: "500",
      fontFamily: "nunito, sans-serif",
    },
  },
},
responsive: [
  {
    breakpoint: 1200,
    options: {
      chart: {
        height: 215,
      },
    },
  },
  {
    breakpoint: 992,
    options: {
      chart: {
        height: 180,
      },
    },
  },
]
};
var chart = new ApexCharts(document.querySelector("#product-sales"), options);
chart.render();
var options = {
  series: [
    {
      name: 'series2',
      data: [25, 35, 30, 25, 60, 37, 35, 50],
    },
  ],
  colors: ["#35bfbf21", "#35bfbf21", "#35bfbf21", "#35bfbf21", "#35bfbf21", "#35bfbf21", "#35bfbf21", "#33BFBF"],
  chart: {
    height: 95,
    type: 'bar',
    offsetY: 30,
    sparkline: {
      enabled: true,
    },
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: 'smooth',
  },
  plotOptions: {
    bar: {
      vartical: true,
      distributed: true,
      barHeight: '35%',
      dataLabels: {
        position: 'top',
      },
    }
  },
  responsive: [
    {
      breakpoint: 1700,
      options: {
        chart: {
          height: 86,
        },
      },
    },
    {
      breakpoint: 1699,
      options: {
        chart: {
          height: 95,
        },
      },
    },
    {
      breakpoint: 1460,
      options: {
        grid: {
          padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 5,
          },
        },
      },
    },
    {
    breakpoint: 576,
    options: {
      chart: {
        offsetY: 0,
      },
    },
    }, 
    {
      breakpoint: 376,
      options: {
        chart: {
          height: 50,
        },
      },
    },
  ],
};
var chart = new ApexCharts(document.querySelector("#expensesChart"), options);
chart.render();
var totalLikesOption = {
  series: [
    {
      name: 'series2',
      data: [0, 40, 25,80,35,40,38, 50, 35, 70, 40 , 100, 20],
    },
  ],
  chart: {
    height: 95,
    offsetY: 30,
    type: 'area',
    sparkline: {
      enabled: true,
    },
  },
  dataLabels: {
    enabled: false,
  },
  colors: ['#072448'],
  fill: {
    type: 'gradient',
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.6,
      opacityTo: 0.4,
    },
  },
  stroke: {
    curve: 'smooth',
    width: 2,
  },
  annotations: {
    points: [{
      x: 123,
      y: 40,
      marker: {
        size: 6,
        fillColor: '#ffffff',
        strokeColor: '#1F2F3E',
        strokeWidth: 2,
        radius: 1,
        cssClass: 'apexcharts-custom-class'
      },
    }]
  },
  responsive: [
    {
      breakpoint: 1800,
      options: {
        chart: {
          height: 80,
        },
      },
    },
    {
      breakpoint: 1500,
      options: {
        chart: {
          height: 80,
        },
      },
    },
    {
      breakpoint: 1400,
      options: {
        chart: {
          height: 80,
        },
      },
    },
    {
      breakpoint: 1200,
      options: {
        chart: {
          height: 70,
        },
        grid: {
          padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 5,
          },
        },
      },
    },
    {
      breakpoint: 576,
      options: {
        chart: {
          offsetY: 0,
        },
      },
      }, 
    {
      breakpoint: 376,
      options: {
        chart: {
          height: 50,
        },
      },
    },
  ],
};
var totalLikesEl = new ApexCharts(document.querySelector('#totalLikesAreaChart'), totalLikesOption);
totalLikesEl.render();
var income = {
  series: [46],
  chart: {
  type: 'radialBar',
  offsetY: 0,
  width: 270,
  height: 200,
  sparkline: {
    enabled: false,
  }
},
plotOptions: {
  radialBar: {
    startAngle: -90,
    endAngle: 90,
    track: {
      background: "rgba(255, 97, 80, 0.12)",
      strokeWidth: '120%',
      margin: 5,
    },
    dataLabels: {
      name: {
        show: true
      },
      value: {
        offsetY: 5,
        fontSize: '18px'
      }
    }
  },
  bar: {
    horizontal: false,
    dataLabels: {
      position: 'bottom'
    }
  }
},
labels: ['Visitors'],
stroke: {
  lineCap: 'round'
},
grid: {
  padding: {
    top: -10
  }
},
colors: [CionAdminConfig.secondary],
};
var IncomechrtchartEl = new ApexCharts(document.querySelector("#Incomechrt"), income);
IncomechrtchartEl.render();
