<?php

/* @var $this yii\web\View */
/* @var $auctions \common\models\Auctions */
/* @var $count \common\models\Auctions */
/* @var $counts \common\models\Auctions */
/* @var $count_order \common\models\Orders */
/* @var $counts_order \common\models\Orders */
/* @var $auctionswait \common\models\Auctions */
/* @var $companies \common\models\Companies */
/* @var $statistic \common\models\Companies */
/* @var $orders \common\models\Companies */

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
                    <h2><?=$count_order  ?></h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="st-card yellow">
                    <p> <?= LangHelper::t("Прошедшие тендеры", "Mening auksionlarim", "My auctions"); ?></p>
                    <h2><?=$counts_order  ?></h2>
                </div>
            </div>
                 <div class="col-md-3">
                  <div class="st-card blue">
                    <p>  <?= LangHelper::t("Активные продажи ", " Faol savdolar", "Active sales"); ?></p>
                    <h2><?= $count ?></h2>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="st-card green">
                    <p><?= LangHelper::t("Все продажи", " Barcha savdolar", "All sales "); ?></p>
                    <h2><?=  $counts?></h2>
                  </div>
                </div>
        </div>
    </div>


    <div class="apex-charts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="apex-card">
                        <h3> <?= LangHelper::t("Общая статистика Конкурсы на продажи", "Общая статистика Конкурсы на продажи", "Общая статистика Конкурсы на продажи"); ?></h3>
                        <div id="general_chart"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="apex-card">
                        <h3> <?= LangHelper::t("Общая статистика Конкурсы на закупки", "Общая статистика Конкурсы на закупки", "Общая статистика Конкурсы на закупки"); ?></h3>
                        <div id="tender_chart"></div>
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

                                <tr>
                                    <td></td>
                                    <td><?=" СП ООО Самаркандский Автомобильный Завод " ?></td>
                                    <td> <?= $wait_auction  ?></td>
                                    <td><?=  $active_auction ?></td>

                                </tr>
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
            data: [<?php foreach ($statistic as $s){?> '<?= $s->full_count ?>' , <?php }?>]
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
                <?php foreach ($statistic as $s){?> '<?= $s->month ?>' , <?php }?>
            ],
            labels: {
                style: {
                    fontSize: '12px'
                }
            }
        }
    };
    var optionstender = {
        series: [{
            data: [<?php foreach ($orders as $o){?> '<?= $o->full_count ?>' , <?php }?>]
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
                <?php foreach ($orders as $o){?> '<?= $o->month ?>' , <?php }?>
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
    var chart = new ApexCharts(document.querySelector("#tender_chart"), optionstender);
    chart.render();

    var options = {
        series: [<?=$count?>,<?=$counts?>],
        labels: ['Текущие аукционы','Прошедшие аукционы'],
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
            name: "продажи - 2021",
            data: [0,<?php foreach ($yearstatistic as $a) {?> <?=  $a->full_count?> ,<?php }?>]
        },
            {
                name: "конкурсы - 2021",
                data: [0,<?php foreach ($yearorderstatistic as $o) {?> <?=  $o->full_count?> ,<?php }?>]
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
            categories: [2020,<?php foreach ($yearstatistic as $s){?> '<?= $s->year ?>' , <?php }?>],
    }
    };

    var chart_3 = new ApexCharts(document.querySelector("#year-chart"), options);
    chart_3.render();

</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>