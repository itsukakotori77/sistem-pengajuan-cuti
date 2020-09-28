<script src="{{ asset('asset/charts/Chart.min.js') }}"></script>
<script>
    var bar = document.getElementById('bar_chart').getContext('2d');
    var ctx = document.getElementById('donut_chart').getContext('2d');
    $(function(){
        $('.count-to').countTo();
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: [{
                    data: [
                        parseInt("{{ $jenis_cuti['cuti_tahunan'] }}"),
                        parseInt("{{ $jenis_cuti['cuti_sakit'] }}"),
                        parseInt("{{ $jenis_cuti['cuti_besar'] }}"),
                        parseInt("{{ $jenis_cuti['cuti_bersama'] }}"),
                        parseInt("{{ $jenis_cuti['cuti_penting'] }}"),
                        parseInt("{{ $jenis_cuti['cuti_hamil'] }}"),
                    ],
                    backgroundColor: [
                        "#36A2EB",
                        "#63FF84",
                        "#FF6384",
                        "#FFCD56",
                        "#37CB4B",
                        "#C75DE6",
                    ]
                }],
                labels: [
                    'Tahunan',
                    'Sakit',
                    'Besar',
                    'Bersama',
                    'Penting',
                    'Hamil',
                ]
            }
        });

        var myBarChart = new Chart(bar, {
            type: 'bar',
            data: {
                datasets: [{
                    // barPercentage: 0.5,
                    // barThickness: 6,
                    // maxBarThickness: 8,
                    // minBarLength: 2,
                    data: [
                        {x:'{{ date("Y-m-d") }}', y: parseInt("{{ $jenis_cuti['cuti_tahunan'] }}") }, 
                        {x:'{{ date("Y-m-d") }}', y: parseInt("{{ $jenis_cuti['cuti_sakit'] }}")},
                        {x:'{{ date("Y-m-d") }}', y: parseInt("{{ $jenis_cuti['cuti_besar'] }}")},
                        {x:'{{ date("Y-m-d") }}', y: parseInt("{{ $jenis_cuti['cuti_bersama'] }}")},
                        {x:'{{ date("Y-m-d") }}', y: parseInt("{{ $jenis_cuti['cuti_penting'] }}")},
                        {x:'{{ date("Y-m-d") }}', y: parseInt("{{ $jenis_cuti['cuti_hamil'] }}")},
                    ],
                    backgroundColor: [
                        "#36A2EB",
                        "#63FF84",
                        "#FF6384",
                        "#FFCD56",
                        "#37CB4B",
                        "#C75DE6",
                    ]  
                }],
                labels: [
                    'Tahunan',
                    'Sakit',
                    'Besar',
                    'Bersama',
                    'Penting',
                    'Hamil',
                ]
            },
            options: {
                scales: {
                    xAxes: [{
                        stacked: true
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });
    });

</script>