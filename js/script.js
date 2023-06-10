$(document).ready(function() {
  // Função para contar a média do sensor por mês
  function countSensorAverage(data) {
    var sums = {};
    var counts = {};

    // Processa os dados e calcula a soma e a contagem por mês
    data.forEach(function(entry) {
      if (entry) {
        var parts = entry.split(';');
        var datetime = parts[0].trim();
        var value = parseFloat(parts[1].trim());

        // Extrai a data e o mês
        var dateParts = datetime.split(' ')[0].split('/');
        var year = dateParts[0];
        var month = dateParts[1];

        var key = year + '-' + month;

        if (!sums[key]) {
          sums[key] = 0;
          counts[key] = 0;
        }

        sums[key] += value;
        counts[key]++;
      }
    });

    // Calcula a média por mês
    var averages = {};
    Object.keys(sums).forEach(function(key) {
      averages[key] = sums[key] / counts[key];
    });

    return averages;
  }

  // Função para carregar os dados do sensor e exibir o gráfico correspondente
  function loadChart(sensorName, chartType) {
    var dataUrl = "../api/files/" + sensorName + "/log.txt?_=" + new Date().getTime();

    // Faz a requisição dos dados do sensor
    $.get(dataUrl, function(data) {
      // Obtem as médias por mês
      var averagesByMonth = countSensorAverage(data.split('\n'));

      // Cria os arrays de rótulos e médias
      var labels = Object.keys(averagesByMonth);
      var averages = Object.values(averagesByMonth).map(function(item) {
        return item.toFixed(2);
      });

      // Cria o gráfico usando o Chart.js
      var ctx = document.getElementById("chart" + sensorName.charAt(0).toUpperCase() + sensorName.slice(1)).getContext('2d');
      var chart = new Chart(ctx, {
        type: chartType,
        data: {
          labels: labels,
          datasets: [{
            label: 'Média',
            data: averages,
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    });
  }

  // Função para contar o número de linhas no arquivo log
  function countLogLines(sensorName) {
    var logUrl = "../api/files/" + sensorName + "/log.txt?_=" + new Date().getTime();

    // Faz a requisição do arquivo log
    $.get(logUrl, function(data) {
      var lines = data.split('\n');
      var count = lines.length;

      // Atualiza o contador no HTML
      $("#counter" + sensorName.charAt(0).toUpperCase() + sensorName.slice(1)).text(count);
    });
  }

  // Chama a função loadChart para cada sensor
  loadChart('humidade', 'bar');
  loadChart('temperatura', 'bar');

  // Chama a função countLogLines para cada sensor
  countLogLines('alarme');
  countLogLines('porta');
  countLogLines('webcam');
});
