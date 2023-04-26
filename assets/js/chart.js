let chart1Id = 'myChart';
let views = [0, 1, 1, 1, 1, 1, 2, 3, 4, 5, 3, 6, 10, 9, 8, 7, 6, 5, 4, 2, 3, 4, 5, 6, 5, 4, 3, 4, 3, 2];
let leads = [0, 1, 2, 2, 3, 4, 5, 2, 2, 3, 2, 2, 3, 4, 5, 6, 7, 6, 5, 2, 4, 6, 7, 6, 4, 3, 2, 2, 1, 0];

let chartConfig = {
    type: 'area',
    title: {
        text: 'Chart Projets',
        fontWeight: 'normal',
        fontColor: 'var(--purple)',
        align: 'left',
        marginLeft: '2rem'
    },
    tooltip: {visible: false},
    globals: {fontColor: 'var(--fontColor)', fontFamily: 'Roboto'},
    legend: {borderWidth: 0, layout: 'horizontal', marker: {type: 'pie'}},

    scaleX: {
        lineWidth: 0,
        minValue: 1509537600000,
        step: 'day',
        label: {text: 'Days',},//clients
        tick: {visible: false},
        transform: {type: 'date', all: '%d'} //mettre les clients a la place
    },
    scaleY: {
        values: '0:10:2',
        lineWidth: 0,
        label: {text: 'Leads & Views',},//chiffre d'affaire
        tick: {visible: false},
        guide: {lineStyle: 'solid', lineColor: 'var(--boxShadow)'} //montant du chiffre d'affaire
    },
    crosshairX: {
        label: {
            text: "%v"
        },
        label: {
            visible: true
        }
    },
    crosshairY: {
        type: "multiple",
        label: {
            visible: false
        }
    },
    plot: {aspect: 'spline'},
    series: [{
        values: leads, //client1
        backgroundColor: 'var(--pink)',
        alphaArea: 1.0,
        lineColor: 'var(--pink)',
        text: 'Leads',
        marker: {visible: false}
    }, {
        values: views, //client2
        backgroundColor: 'var(--purple)',
        alphaArea: 1.0,
        lineColor: 'var(--purple)',
        text: 'Views',
        marker: {visible: false}
    }]
};
zingchart.render({id: chart1Id, data: chartConfig, height: '100%', width: '100%'});