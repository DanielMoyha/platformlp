Highcharts.chart('chart_pacientes', {
    chart: {
        type: 'areaspline',
        events: {
            load() {
              const chart = this;
              chart.showLoading('<i class="fa fa-spinner fa-spin px-2"></i>Cargando Gráfica');
              setTimeout(function() {
                chart.hideLoading();
              }, 3000);
            }
          }
    },
    lang: {
        viewFullscreen: "Ver en pantalla completa",
        printChart: "Imprimir Gráfico",
        downloadPNG: "Descargar en PNG",
        downloadJPEG: "Descargar en JPEG",
        downloadPDF: "Descargar en PDF",
        downloadSVG: "Descargar en SVG",
        downloadCSV: "Descarga CSV",
        downloadXLS: "Descargar en Excel",
        viewData: "Ver en Tabla",
    },
    credits: {
        enabled: true,
        text: "EPB Filial - La Paz",
        href: "#"
    },
    exporting: {
        csv: {
            columnHeaderFormatter: function(item, key) {
                if (!item || item instanceof Highcharts.Axis) {
                    return 'Meses'
                } else {
                    return item.name;
                }
            }
        },
        buttons: {
            contextButton: {
                menuItems:
                [
                    // {
                    //     textKey: 'printChart',
                    //     onclick: function () {
                    //         this.print();
                    //     }
                    // }, {
                    // separator: true
                    // },
                    {
                        textKey: 'downloadPNG',
                        onclick: function () {
                            this.exportChart();
                        }
                    }, {
                        textKey: 'downloadJPEG',
                        onclick: function () {
                            this.exportChart({
                                type: 'image/jpeg'
                            });
                        }
                    }, {
                        separator: true
                    },
                    {
                        textKey: 'downloadPDF',
                        onclick: function () {
                            this.exportChart({
                                type: 'application/pdf'
                            });
                        }
                    }, {
                        textKey: 'downloadXLS',
                        onclick: function () {
                            this.downloadXLS();
                        }
                    }
                ]
            }
        }
    },
    title: {
        text: `Casos Registrados de la gestión ${year}`
    },

    subtitle: {
        text: 'Fuente: Escuela de Padres de Bolivia Filial - La Paz'
    },

    yAxis: {
        title: {
            text: 'Número de Casos'
        }
    },

    xAxis: {
        categories: [
            'Enero', 'Febrero', 'Marzo',
            'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre',
            'Octubre', 'Noviembre', 'Diciembre'
        ]
    },

    legend: {
        layout: 'horizontal',
        align: 'center',
        verticalAlign: 'bottom',
        enabled: true,
        floating: false,

        // layout: 'vertical',
        // align: 'left',
        // verticalAlign: 'top',
        // enabled: true,
        // x: 60,
        // y: 65,
        // floating: false,
    },

    plotOptions: {
        series: {
            //label: {
                //connectorAllowed: false
            //},
            //pointStart: 2010*/
            allowPointSelect: true,
        }
    },

    series: [
        {
            name: 'Nuevos Casos', // se desactiva con enabled: false, de legend
            data: datas,
            color: '#FFD685'
        },
        {
            name: 'Pacientes Masculinos',
            data: pacientesMasculinos,
            color: '#8ECEFD',
            //color: '#5E666E',
        },
        {
            name: 'Pacientes Femeninos',
            data: pacientesFemeninos,
            color: '#F7ABD5',
        }
    ],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});