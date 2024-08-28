(function ($) {
  "use strict";
      var options = {
        series: [75, 55 , 44],
        chart: {
        type: 'donut',
      },
      plotOptions: {
        pie: {
          expandOnClick: false,
          startAngle: -90,
          endAngle: 90,
          offsetY: 10,
          donut: {
            size: "75%",
            labels: {
              show: true,
              name: {
                offsetY: -10,
              },
              value: {
                offsetY: -50,
              },
              total: {
                show: true,
                fontSize: "18px",
                fontFamily: "Outfit",
                fontWeight: 600,
                label: "Total",
                color: "#373d3f",
                formatter: (w) => "84%",
              },
            },
          },
          customScale: 1,
          offsetX: 0,
          offsetY: 0,
        },
      },
      grid: {
        padding: {
          bottom: -120
        }
      },
      colors: [ CionAdminConfig.primary , CionAdminConfig.secondary , "#072448"],
      responsive: [
        {
          breakpoint: 992,
          options: {
            chart: {
              height: 250,
            },
          },
          plotOptions: {
            pie: {
              expandOnClick: false,
              donut: {
                size: "75%",
                labels: {
                  total: {
                    show: true,
                    fontSize: "12px",
                    fontFamily: "Lato",
                    fontWeight: 500,
                    formatter: () => "Revenue",
                    label: "$45,256",
                  },
                },
              },
              customScale: 1,
              offsetX: 0,
              offsetY: 0,
            },
            legend: {
              position: "right",
              fontSize: "12px",
              verticalAlign: "center",
              horizontalAlign: "center",
              fontFamily: "Lato",
              fontWeight: 500,
              labels: {
                colors: ["#000000"],
              },
            },
            itemMargin: {
              horizontal: 10,
              vertical: 1,
            },
          },
        },
      ],
      legend: {
        show: false,
      },
      dataLabels: {
        enabled: false,
      },
      };
    var chart = new ApexCharts(document.querySelector("#customer-chart"), options);
    chart.render();
    var options = {
      series: [
        {
          name: "This Month ",
          type: "area",
          data: [275, 230, 235 ,240 ,220 ,280 ,190, 232, 280, 220, 240 , 200]
        },
        {
          name: "This Month",
          type: "line",
          data: [225, 260, 200, 230, 240, 350, 260, 280, 260 ,265 , 200 ,230],
        },
      ],
      chart: {
        height: 435,
        type: "line",
        zoom: {
          enabled: false,
        },
        toolbar: {
          show: false,
        },
      },
      dataLabels: {
        enabled: false,
      },
      stroke: {
        width: [4, 3],
        curve: "smooth",
        dashArray: [0, 8],
      },
      colors: [ CionAdminConfig.primary , CionAdminConfig.secondary ],
      markers: {
        size: 0,
        strokeColor: CionAdminConfig.primary,
        strokeWidth: 0,
      },
      xaxis: {
        categories: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec"
        ],
        axisBorder: {
          show: false,
        },
        axisTicks: {
          show: false,
        },
      },
      yaxis: {
        labels: {
          formatter: function (val) {
            return val + "" + "k";
          },
          style: {
            fontSize: "14px",
            colors: "$black",
            fontWeight: "500",
            fontFamily: "nunito, sans-serif",
          },
        },
      },
      fill: {
        colors: [ CionAdminConfig.primary , CionAdminConfig.secondary],
        type: ["gradient", "solid"],
        gradient: {
          shade: "light",
          type: "vertical",
          opacityFrom: 0.4,
          opacityTo: 0,
          stops: [0, 100 , 0 , 0],
        },
      },
      grid: {
        borderColor: "#f1f1f1",
      },
      legend: {
        show: true,
        position: 'top',
      }
    };
    var chart = new ApexCharts(document.querySelector("#company-viewchart"), options);
    chart.render();
    var options = {
      series: [{
      data: [
        { 
          x: 'Jan',
          y: 44,
          z: 44,
          goals: [
            {
              name: 'Expected',
              value: 48,
              strokeHeight: 1,
              strokeColor: '#2F2F3B'
            }
          ]
        },
        { 
          x: 'Feb',
          y: 60,
          z: 60,
          goals: [
            {
              name: 'Expected',
              value: 64,
              strokeHeight: 1,
              strokeColor: '#2F2F3B'
            }
          ]
        },
        { 
          x: 'Mar',
          y: 68,
          z: 68,
          goals: [
            {
              name: 'Expected',
              value: 72,
              strokeHeight: 1,
              strokeColor: '#2F2F3B'
            }
          ]
        },
        { 
          x: 'Apr',
          y: 57,
          z: 57,
          goals: [
            {
              name: 'Expected',
              value: 61,
              strokeHeight: 1,
              strokeColor: '#2F2F3B'
            }
          ]
        },
        { 
          x: 'May',
          y: 78,
          z: 78,
          goals: [
            {
              name: 'Expected',
              value: 82,
              strokeHeight: 1,
              strokeColor: '#2F2F3B'
            }
          ]
        },
        { 
          x: 'Jun',
          y: 43,
          z: 43,
          goals: [
            {
              name: 'Expected',
              value: 47,
              strokeHeight: 1,
              strokeColor: '#2F2F3B'
            }
          ]
        },
        { 
          x: 'Jul',
          y: 21,
          z: 21,
          goals: [
            {
              name: 'Expected',
              value: 25,
              strokeHeight: 1,
              strokeColor: '#2F2F3B'
            }
          ]
        },
        { 
          x: 'Aug',
          y: 64,
          z: 64,
          goals: [
            {
              name: 'Expected',
              value: 68,
              strokeHeight: 1,
              strokeColor: '#2F2F3B'
            }
          ]
        },
        { 
          x: 'Sept',
          y: 90,
          z: 90,
          goals: [
            {
              name: 'Expected',
              value: 94,
              strokeHeight: 1,
              strokeColor: '#2F2F3B'
            }
          ]
        },
        { 
          x: 'Oct',
          y: 31,
          z: 31,
          goals: [
            {
              name: 'Expected',
              value: 35,
              strokeHeight: 1,
              strokeColor: '#2F2F3B'
            }
          ]
        },
        { 
          x: 'Nov',
          y: 57,
          z: 57,
          goals: [
            {
              name: 'Expected',
              value: 61,
              strokeHeight: 1,
              strokeColor: '#2F2F3B'
            }
          ]
        },
        { 
          x: 'Dec',
          y: 65,
          z: 65,
          goals: [
            {
              name: 'Expected',
              value: 69,
              strokeHeight: 1,
              strokeColor: '#2F2F3B'
            }
          ]
        } ]
    }],
    grid: {
      show: true,
      borderColor: '#D6D6D6',
      strokeDashArray: 4,
    },
    chart: {
      height: 310,
      type: 'bar',
      stacked: true,
      toolbar: {
        show: false,
      }
    },
    plotOptions: {
      bar: {
        columnWidth: '50%',
        distributed: true,
      }
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      width: 0
    },
    xaxis: {
      labels: {
        rotate: -45
      },
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      tickPlacement: 'on'
    },
    yaxis: {
      labels: {
        formatter: function (val) {
          return val + "" + "k";
        },
        style: {
          fontSize: "14px",
          colors: "$black",
          fontWeight: "500",
          fontFamily: "nunito, sans-serif",
        },
      },
    },
    xaxis: {
      labels: {
        style: {
          fontSize: "14px",
          colors: "#848789",
          fontFamily: "nunito, sans-serif",
        },
      },
      axisBorder: {
        show: false
      },
    },
    colors: ['#e9e9ef' , '#e9e9ef' ,'#e9e9ef' , '#e9e9ef','#33BFBF' , '#e9e9ef', '#e9e9ef' , '#e9e9ef','#e9e9ef' , '#e9e9ef','#e9e9ef' , '#e9e9ef','#e9e9ef' , '#e9e9ef','#e9e9ef' , '#e9e9ef' , '#e9e9ef','#e9e9ef' , '#e9e9ef','#e9e9ef' , '#e9e9ef', , '#e9e9ef','#e9e9ef' , '#e9e9ef' ],
    fill: {
      type: 'gradient',
      gradient: {
        shade: 'light',
        type: "horizontal",
        shadeIntensity: 0.25,
        gradientToColors: undefined,
        inverseColors: true,
        opacityFrom: 1,
        opacityTo: 0.55,
        stops: [50, 0, 100]
      },
    },
    legend: {
      show: false
    },
    };
    var chart = new ApexCharts(document.querySelector("#balance-overview"), options);
    chart.render();
})(jQuery);