<?php

/* @var $this yii\web\View */
/* @var $auctions \common\models\Auctions */
/* @var $count \common\models\Auctions */
/* @var $counts \common\models\Auctions */
/* @var $auctionswait \common\models\Auctions */
/* @var $companies \common\models\Companies */

use common\helpers\LangHelper;

$this->title = 'Xarid | Samauto.uz';

$lang = Yii::$app->session->get('lang');
if ($lang == '') $lang = 'ru';

$title = 'title_' . $lang;
$text = 'text_' . $lang;
$name = 'name_' . $lang;
$descr = 'descr_' . $lang;
$link = 'link_' . $lang;
$material = 'material_' . $lang;

?>

<div class="sp-wrapper">

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="st-card red">
                    <p><?= LangHelper::t("Активные тендеры", "Активные тендеры", "Активные тендеры"); ?></p>
                    <h2><?= $count ?></h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="st-card yellow">
                    <p> <?= LangHelper::t("Все тендеры", "Все тендеры", "Все тендеры"); ?></p>
                    <h2><?= $counts ?></h2>
                </div>
            </div>
            <!--     <div class="col-md-3">
                  <div class="st-card blue">
                    <p>Активные аукционы</p>
                    <h2>43</h2>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="st-card green">
                    <p>Все аукционы</p>
                    <h2>43</h2>
                  </div>
                </div> -->
        </div>
    </div>


    <div class="apex-charts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="apex-card">
                        <h3> <?= LangHelper::t("Общая статистика", "Общая статистика", "Общая статистика"); ?></h3>
                        <div id="general_chart"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="statistics-card">
                        <header> <?= LangHelper::t("Предприятия тендер", "Предприятия тендер", "Предприятия тендер"); ?></header>
                        <table>
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> <?= LangHelper::t("Nomi", "Nomi", "Nomi"); ?></th>
                                <th> <?= LangHelper::t("Актив", "Актив", "Актив"); ?></th>
                                <th> <?= LangHelper::t("Тугаллаш", "Тугаллаш", "Тугаллаш"); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($auctions as $auction=>$t): ?>
                                <tr>
                                    <td><?= $t['company_id'] ?></td>
                                    <td><a href="#"> <?= $t['title_ru'] ?> </a></td>
                                    <td><?= $t['count(auctions.company_id)'] ?></td>
                                    <td></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="apex-card">
                        <h3> <?= LangHelper::t("Общая статистика", "Общая статистика", "Общая статистика"); ?></h3>
                        <div id="pie-chart"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="apex-card">
                        <h3> <?= LangHelper::t("Общая годовая статистика", "Общая годовая статистика", "Общая годовая статистика"); ?></h3>
                        <div id="year-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script type="text/javascript">

    var options = {
        series: [{
            data: [21, 22, 10, 28, 16, 21, 13, 30]
        }],
        chart: {
            height: 350,
            type: 'bar',
            events: {
                click: function (chart, w, e) {
                    // console.log(chart, w, e)
                }
            }
        },
        plotOptions: {
            bar: {
                columnWidth: '45%',
                distributed: true
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: [
                ['John', 'Doe'],
                ['Joe', 'Smith'],
                ['Jake', 'Williams'],
                'Amber',
                ['Peter', 'Brown'],
                ['Mary', 'Evans'],
                ['David', 'Wilson'],
                ['Lily', 'Roberts'],
            ],
            labels: {
                style: {
                    fontSize: '12px'
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#general_chart"), options);
    chart.render();


    var options = {
        series: [44, 55, 41, 17, 15],
        labels: ['Apple', 'Mango', 'Orange', 'Watermelon', 'Watermelon'],
        chart: {
            type: 'donut',
            plotOptions: {
                pie: {
                    donut: {
                        size: '65%',
                        background: 'red',
                        labels: {
                            show: true,
                            name: {
                                show: true,
                                fontSize: '22px',
                                fontFamily: 'Roboto, Arial, sans-serif',
                                fontWeight: 600,
                                color: '#000000',
                                offsetY: -10,
                                formatter: function (val) {
                                    return val
                                }
                            },
                            value: {
                                show: true,
                                fontSize: '16px',
                                fontFamily: 'Roboto, Arial, sans-serif',
                                fontWeight: 400,
                                color: '#000000',
                                offsetY: 16,
                                formatter: function (val) {
                                    return val
                                }
                            },
                            total: {
                                show: true,
                                showAlways: true,
                                label: 'Total',
                                fontSize: '22px',
                                fontFamily: 'Roboto, Arial, sans-serif',
                                fontWeight: 600,
                                color: '#373d3f',
                                formatter: function (w) {
                                    return w.globals.seriesTotals.reduce((a, b) => {
                                        return a + b
                                    }, 0)
                                }
                            }
                        }
                    }
                }
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart_2 = new ApexCharts(document.querySelector("#pie-chart"), options);
    chart_2.render();


    var options = {
        series: [{
            name: "High - 2013",
            data: [28, 29, 33, 36, 32, 32, 33]
        },
            {
                name: "Low - 2013",
                data: [12, 11, 14, 18, 17, 13, 13]
            }],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight'
        },
        title: {
            text: 'Product Trends by Month',
            align: 'left'
        },
        grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        }
    };

    var chart_3 = new ApexCharts(document.querySelector("#year-chart"), options);
    chart_3.render();

</script>
