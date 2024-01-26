// Contoh Data Chart
const data = [
    { year: 2010, count: 10 },
    { year: 2011, count: 20 },
    { year: 2012, count: 15 },
    { year: 2013, count: 25 },
    { year: 2014, count: 22 },
    { year: 2015, count: 30 },
    { year: 2016, count: 28 },
  ];
const config = {
    type: 'bar',
    data: {
    labels: data.map(row => row.year),
    datasets: [
            {
            label: ['Total Kamar Terjual'],
            data: data.map(row => row.count),
            backgroundColor: '#36A2EB75'
            }
        ]
    },
    options: {
        animation: false
    }
};

// Contoh Parsing
const data1 = [{x: 'Jan', net: 100, cogs: 50, gm: 50}, {x: 'Feb', net: 120, cogs: 55, gm: 75}];
const cfg = {
  type: 'bar',
  data: {
    labels: ['Jan', 'Feb'],
    datasets: [{
      label: 'Net sales',
      data: data1,
      parsing: {
        yAxisKey: 'net'
      }
    }, {
      label: 'Cost of goods sold',
      data: data1,
      parsing: {
        yAxisKey: 'cogs'
      }
    }, {
      label: 'Gross margin',
      data: data1,
      parsing: {
        yAxisKey: 'gm'
      }
    }]
  },
};


new Chart(document.getElementById('chartJS'), cfg);

