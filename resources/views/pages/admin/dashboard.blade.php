@extends('index-dash')
@section('webTittle','Dashboard')
 
@section('content')

<!-- Content Row -->
@if (auth()->user()->level==3)
    <div class="row">
        <div class="col-12 text-center">
            <h3 class="text-dark">Selamat Datang {{auth()->user()->full_name}}, Di Website Blossom Ville Citra Raya </h3>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-xl-4 text-center">
            Untuk membuat testimoni klik disini :<br>
            <a href="/admin/testimoni" class="btn btn-success">Halaman Testimoni</a>
        </div>
        <div class="col-xl-4 text-center">
            Untuk mempromosikan usaha anda klik disini :<br>
            <a href="/admin/usaha" class="btn btn-success">Halaman Usaha</a>
        </div>
        <div class="col-xl-4 text-center">
            Untuk mengajuan surat klik disini :<br>
            <a href="/admin/surat/daftar" class="btn btn-success">Halaman Surat</a>
        </div>
    </div>
@else
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-4 col-lg-7">
        <div class="card">
            <div class="card-body">
                <h5 class="text-dark card-title">Presentase Berdasarkan Jenis Kelamin</h5>
                <canvas id="jnsKel" height="150"></canvas>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card">
            <div class="card-body">
                <h5 class="text-dark card-title">Presentase Berdasarkan Usia</h5>
                <canvas id="usia" height="150"></canvas>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-5">
        <div class="card">
            <div class="card-body">
                <h5 class="text-dark card-title">Presentase Berdasarkan Status Pernikahan</h5>
                <canvas id="stsPernikahan" height="150"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row" >
    <div class="col-xl-12">
        <div class="card mt-3">
            <div class="card-body">
                <h2 class="card-title">Jumlah Warga Per RT</h2>
                <canvas id="totalWarga" height="70"></canvas>
            </div>
        </div>
    </div>
</div>
<script>
    const backgroundColor = [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ]
    const borderColor = [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ]
    getSummaryByGender()
    getSummaryByGeneration()
    getSummaryByMarriage()
    getSummaryResidentByGender()
    function getSummaryByGender(){
        $.get('/chart/summary/gender',function(data){
            const jnsKel = document.getElementById('jnsKel');
            var chartData =[];
            var label = [];
            console.log(data)
            $.each(data,function(){
                chartData.push(parseInt(this.total))
                label.push(this.gender)
            })
            if(label.indexOf('male')==-1) label.push('La');chartData.push(0);
            if(label.indexOf('female')==-1) label.push('female');chartData.push(0);
            console.log(label)
            const jnsKelCart = new Chart(jnsKel, {
                type: 'pie',
                data: {
                    labels: ['Laki-laki','Perempuan'],
                    datasets: [
                        {
                            label: 'Gender',
                            data: chartData,
                            backgroundColor: backgroundColor,
                            borderColor: borderColor,
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
    }
    function getSummaryByGeneration(){
        $.get('/chart/summary/generation',function(data){
            var label = [
                'Pre-Boomer','Baby Boomer','Gen X','Milenial','Gen Z','Post Gen Z'
            ]
            var chartData = []
            $.each(data,function(){
                chartData.push(parseInt(this.total))
            })
            $.each(label,function(){
                if(label.indexOf(this)==-1) chartData.push(0);
            })
            const usia = document.getElementById('usia');
            const usiaCart = new Chart(usia, {
                type: 'pie',
                data: {
                    labels: label,
                    datasets: [{
                        label: '# of Votes',
                        data: chartData,
                        backgroundColor: backgroundColor,
                        borderColor: borderColor,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
    }
    function getSummaryByMarriage(){
        $.get('/chart/summary/marriage',function(data){
            var label = [];
            var chartData = [];
            $.each(data,function(){
                label.push(this.marriage)
                chartData.push(parseInt(this.total))
            })
            const stsPernikahan = document.getElementById('stsPernikahan');
            const stsPernikahanCart = new Chart(stsPernikahan, {
                type: 'pie',
                data: {
                    labels: label,
                    datasets: [{
                        label: '# of Votes',
                        data: chartData,
                        backgroundColor: backgroundColor,
                        borderColor: borderColor,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
    }
    function getSummaryResidentByGender(){
        $.get('/chart/summary/resident/gender',function(data){
            var label = [];
            var maleData = [];
            var femaleData = [];
            $.each(data,function(){
                label.push('RT 0'+this.rt_no+'(Laki-Laki : '+this.male+', Perempuan  : '+this.female+')')
                maleData.push(parseInt(this.male))
                femaleData.push(parseInt(this.female))
            })
            const totalWarga = document.getElementById('totalWarga');
            const totalWargaCart = new Chart(totalWarga, {
                type: 'bar',
                data: {
                    labels: label,
                    datasets: [
                        {
                            label: 'Laki-Laki',
                            data: maleData,
                            backgroundColor: backgroundColor,
                            borderColor: borderColor,
                            borderWidth: 1
                        },
                        {
                            label: 'Perempuan',
                            data: femaleData,
                            backgroundColor: backgroundColor,
                            borderColor: borderColor,
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
    }
    
    </script>
@endif

@endsection