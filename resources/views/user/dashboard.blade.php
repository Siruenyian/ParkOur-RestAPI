<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700,800" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <!--Replace with your tailwind.css once created-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">

    <style>
        :root {
            --series1: #bc96ff;
            --series3: #6c79b3;
            --series2: #96d5ff;

        }
        .nunito {
            font-family: 'nunito', font-sans;
        }

        .border-b-1 {
            border-bottom-width: 1px;
        }

        .border-l-1 {
            border-left-width: 1px;
        }

        hover\:border-none:hover {
            border-style: none;
        }

        #sidebar {
            transition: ease-in-out all .3s;
            z-index: 9999;
        }

        #sidebar span {
            opacity: 0;
            position: absolute;
            transition: ease-in-out all .1s;
        }

        #sidebar:hover {
            width: 150px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            /*shadow-2xl*/
        }

        #sidebar:hover span {
            opacity: 1;
        }

        #chart1 .ct-series-a .ct-line {
            /* Set the colour of this series line */
            stroke: var(--series1);

        }
        #chart1 .ct-series-b .ct-line {
            /* Set the colour of this series line */
            stroke: var(--series2);

        }
        #chart1 .ct-series-c .ct-line {
            /* Set the colour of this series line */
            stroke: var(--series3);
        }

        #chart3 .ct-series-a .ct-bar {
            /* Set the colour of this series line */
            stroke: var(--series1);

        }
        #chart3 .ct-series-b .ct-bar {
            /* Set the colour of this series line */
            stroke: var(--series2);

        }
        #chart3 .ct-series-c .ct-bar {
            /* Set the colour of this series line */
            stroke: var(--series3);
        }

        #chart2 .ct-series-a .ct-point{
            /* Set the colour of this series line */
            stroke: var(--series1);

        }
        #chart2 .ct-series-a .ct-line{
            /* Set the colour of this series line */
            stroke: var(--series1);

        }
        #chart2 .ct-series-b .ct-point{
            /* Set the colour of this series line */
            stroke: var(--series2);

        }
        #chart2 .ct-series-b .ct-line{
            /* Set the colour of this series line */
            stroke: var(--series2);

        }
        #chart2 .ct-series-c .ct-point{
            /* Set the colour of this series line */
            stroke: var(--series3);
        }
        #chart2 .ct-series-c .ct-line{
            /* Set the colour of this series line */
            stroke: var(--series2);

        }
    </style>

</head>

<body class="flex h-screen bg-gray-100 font-sans">

<!-- Side bar-->
<div id="sidebar" class="h-screen w-16 menu bg-white text-white px-4 flex items-center nunito static fixed shadow">

    <ul class="list-reset ">
        <li class="my-2 md:my-0">
            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                <i class="fas fa-home fa-fw mr-3"></i><span class="w-full inline-block pb-1 md:pb-0 text-sm">Home</span>
            </a>
        </li>
        <li class="my-2 md:my-0">
            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                <i class="fa fa-envelope fa-fw mr-3"></i><span class="w-full inline-block pb-1 md:pb-0 text-sm">Messages</span>
            </a>
        </li>
        <li class="my-2 md:my-0">
            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                <i class="fas fa-chart-area fa-fw mr-3 text-indigo-400"></i><span class="w-full inline-block pb-1 md:pb-0 text-sm">Analytics</span>
            </a>
        </li>
        <li class="my-2 md:my-0">
            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                <i class="fa fa-history  fa-fw mr-3"></i><span class="w-full inline-block pb-1 md:pb-0 text-sm">History</span>
            </a>
        </li>
    </ul>

</div>

<div class="flex flex-row flex-wrap flex-1 flex-grow content-start pl-16">

    <div class="h-40 lg:h-20 w-full flex flex-wrap">
        <nav id="header" class="bg-gray-200 w-full lg:max-w-sm flex items-center border-b-1 border-gray-300 order-2 lg:order-1">

            <div class="px-2 w-full">
                <select name="" class="bg-gray-300 border-2 border-gray-200 rounded-full w-full py-3 px-4 text-gray-500 font-bold leading-tight focus:outline-none focus:bg-white focus:shadow-md" id="form-field2">
                    <option value="Default">default</option>
                    <option value="A">simple</option>
                </select>
            </div>

        </nav>
        <nav id="header1" class="bg-gray-100 w-auto flex-1 border-b-1 border-gray-300 order-1 lg:order-2">

            <div class="flex h-full justify-between items-center">


                <!--Menu-->
                <h5 class="px-8 font-bold">
                    {{ $tempatdetail->nama }}
                </h5>
                <div class="flex relative inline-block pr-6">

                    <div class="relative text-sm">
                        <button id="userButton" class="flex items-center focus:outline-none mr-3">
                            <img class="w-8 h-8 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of User"> <span class="hidden md:inline-block">Hi, {{ $user->email }} </span>
                            <svg class="pl-2 h-2" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
                                <g>
                                    <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"></path>
                                </g>
                            </svg>
                        </button>
                        <div id="userMenu" class="bg-white nunito rounded shadow-md mt-2 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30 invisible">
                            <ul class="list-reset">
                                <li><a href="#" class="px-4 py-2 block text-gray-900 hover:bg-indigo-400 hover:text-white no-underline hover:no-underline">My account</a></li>
                                <li><a href="#" class="px-4 py-2 block text-gray-900 hover:bg-indigo-400 hover:text-white no-underline hover:no-underline">Notifications</a></li>
                                <li>
                                    <hr class="border-t mx-2 border-gray-400">
                                </li>
                                <li>
                                    <form  action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 block text-gray-900 hover:bg-indigo-400 hover:text-white no-underline hover:no-underline">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

                <!-- / Menu -->

            </div>

        </nav>
    </div>

    <!--Dash Content -->
    <div id="dash-content" class="bg-gray-200 py-6 lg:py-0 w-full lg:max-w-sm flex flex-wrap content-start">

        <div class="w-1/2 lg:w-full">
            <div class="border-2 border-gray-400 border-dashed hover:border-transparent hover:bg-white hover:shadow-xl rounded p-6 m-2 md:mx-10 md:my-6">
                <div class="flex flex-col items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-3 bg-gray-300"><i class="fa fa-wallet fa-fw fa-inverse text-indigo-500"></i></div>
                    </div>
                    <div class="flex-col">
                        <h3 class="font-bold text-3xl">Rp{{ $tempatdetail->pendapatan }},00 <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                        <h5 class="font-bold text-gray-500">Total Revenue</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-1/2 lg:w-full">
            <div class="border-2 border-gray-400 border-dashed hover:border-transparent hover:bg-white hover:shadow-xl rounded p-6 m-2 md:mx-10 md:my-6">
                <div class="flex flex-col items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-3 bg-gray-300"><i class="fas fa-users fa-fw fa-inverse text-indigo-500"></i></div>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-3xl">{{$totaltransaction}} <span class="text-orange-500"><i class="fas fa-exchange-alt"></i></span></h3>
                        <h5 class="font-bold text-gray-500">Total Transaction</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-1/2 lg:w-full">
            <div class="border-2 border-gray-400 border-dashed hover:border-transparent hover:bg-white hover:shadow-xl rounded p-6 m-2 md:mx-10 md:my-6">
                <div class="flex flex-col items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-3 bg-gray-300"><i class="fas fa-user-plus fa-fw fa-inverse text-indigo-500"></i></div>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-3xl">0 <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span></h3>
                        <h5 class="font-bold text-gray-500">New Transaction</h5>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <!--Graph Content -->
    <div id="main-content" class="w-full flex-1">

        <div class="flex flex-1 flex-wrap">

            <div class="w-full xl:w-2/3 p-6 xl:max-w-6xl">

                <!--"Container" for the graphs"-->
                <div class="max-w-full lg:max-w-3xl xl:max-w-5xl">

                    <!--Graph Card-->
                    <div class="border-b p-3">
                        <h5 class="font-bold text-black">Volume Parkir Per Minggu</h5>
                    </div>
                    <div class="p-5">
                        <div class="ct-chart ct-golden-section" id="chart1"></div>
                    </div>
                    <!--/Graph Card-->

                    <!--Table Card-->
                    <div class="p-3">
                        <div class="border-b p-3">
                            <h5 class="font-bold text-black">Current Statistics</h5>
                        </div>
                        <div class="p-5">
                            <table class="w-full p-5 text-gray-700">
                                <thead>
                                <tr>
                                    <th class="text-left text-blue-900">Mobil</th>
                                    <th class="text-left text-blue-900">Motor</th>
                                    <th class="text-left text-blue-900">Pendapatan</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <a href="/tempat/{{ $tempatdetail->id_tempat }}">
                                            <td>{{ $tempatdetail->avail_mobil }}/{{ $tempatdetail->max_mobil }}
                                                @if ($tempatdetail->avail_mobil > 0)
                                                    <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">
                                                        <span class="w-2 h-2 mr-1 bg-green-300 rounded-full"></span>
                                                        Available
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center bg-red-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">
                                                        <span class="w-2 h-2 mr-1 bg-red-300 rounded-full"></span>
                                                        Full
                                                    </span>
                                                @endif

                                            </td>
                                            <td>{{ $tempatdetail->avail_motor }}/{{ $tempatdetail->max_motor }}
                                                @if ($tempatdetail->avail_motor > 0)
                                                    <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">
                                                        <span class="w-2 h-2 mr-1 bg-green-300 rounded-full"></span>
                                                        Available
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center bg-red-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">
                                                        <span class="w-2 h-2 mr-1 bg-red-300 rounded-full"></span>
                                                        Full
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($tempatdetail->pendapatan !=null)
                                                    {{ $tempatdetail->pendapatan }}
                                                @else
                                                    -
                                                @endif
                                            </td>

                                        </a>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/table Card-->

                </div>

            </div>

            <div class="w-full xl:w-1/3 p-6 xl:max-w-4xl border-l-1 border-gray-300">

                <!--"Container" for the graphs"-->
                <div class="max-w-sm lg:max-w-3xl xl:max-w-5xl">


                    <!--Graph Card-->
                    <div class="border-b p-3">
                        <h5 class="font-bold text-black">Pendapatan</h5>
                    </div>
                    <div class="p-5">
                        <div class="ct-chart ct-golden-section" id="chart3"></div>
                    </div>

                    <!--/Graph Card-->

                    <!--Graph Card-->


                    <div class="p-5">
                        <div class="ct-chart ct-golden-section" id="chart2"></div>
                    </div>

                    <!--/Graph Card-->



                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
<script>
    /* Refer to https://gionkunz.github.io/chartist-js/examples.html for setting up the graphs */

    var mainChart = new Chartist.Line('#chart1', {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        series: [
            [3, 5, 20, 1, 3, 2],
        ]
    }, {
        low: 0,
        showArea: true,
        showPoint: false,
        fullWidth: true
    });

    mainChart.on('draw', function(data) {
        if (data.type === 'line' || data.type === 'area') {
            data.element.animate({
                d: {
                    begin: 1000 * data.index,
                    dur: 1000,
                    from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                    to: data.path.clone().stringify(),
                    easing: Chartist.Svg.Easing.easeOutQuint
                }
            });
        }
    });

    var chartScatter = new Chartist.Line('#chart2', {
        labels: ['Q1', 'Q2', 'Q3', 'Q4'],
        series: [
            [12, 9, 7, 8],
        ]
    }, {
        low: 0
    });

    chartScatter.on('draw', function(data) {
        if (data.type === 'line' || data.type === 'area') {
            data.element.animate({
                d: {
                    begin: 500 * data.index,
                    dur: 1000,
                    from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                    to: data.path.clone().stringify(),
                    easing: Chartist.Svg.Easing.easeOutQuint
                }
            });
        }
    });

    var chartBar = new Chartist.Bar('#chart3', {
        labels: ['Q1', 'Q2', 'Q3', 'Q4'],
        series: [
            [12, 9, 7, 8],
        ]
    }, {
        stackBars: true,
        axisY: {
            labelInterpolationFnc: function(value) {
                return 'Rp' + (value / 100000);
            }
        }
    })

    chartBar.on('draw', function(data) {
        if (data.type === 'bar') {
            data.element.attr({
                style: 'stroke-width: 30px'
            }),
                data.element.animate({
                    y2: {
                        dur: '0.5s',
                        from: data.y1,
                        to: data.y2
                    }
                });
        }
    });




    var chartPie = new Chartist.Pie('#chart4', {
        series: [10, 20, 50],
        labels: [10, 20, 50],
    }, {
        donut: true,
        showLabel: true
    });

    chartPie.on('draw', function(data) {
        if (data.type === 'slice') {
            var pathLength = data.element._node.getTotalLength();
            data.element.attr({
                'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
            });

            var animationDefinition = {
                'stroke-dashoffset': {
                    id: 'anim' + data.index,
                    dur: 200,
                    from: -pathLength + 'px',
                    to: '0px',
                    easing: Chartist.Svg.Easing.easeOutQuint,
                    fill: 'freeze'
                }
            };

            if (data.index !== 0) {
                animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
            }

            data.element.attr({
                'stroke-dashoffset': -pathLength + 'px'
            });

            data.element.animate(animationDefinition, false);
        }
    });
</script>

<script>
    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var userMenuDiv = document.getElementById("userMenu");
    var userMenu = document.getElementById("userButton");

    document.onclick = check;

    function check(e) {
        var target = (e && e.target) || (event && event.srcElement);

        //User Menu
        if (!checkParent(target, userMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, userMenu)) {
                // click on the link
                if (userMenuDiv.classList.contains("invisible")) {
                    userMenuDiv.classList.remove("invisible");
                } else {
                    userMenuDiv.classList.add("invisible");
                }
            } else {
                // click both outside link and outside menu, hide menu
                userMenuDiv.classList.add("invisible");
            }
        }

    }

    function checkParent(t, elm) {
        while (t.parentNode) {
            if (t == elm) {
                return true;
            }
            t = t.parentNode;
        }
        return false;
    }
</script>

</body>

</html>
