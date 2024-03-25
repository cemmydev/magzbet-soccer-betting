@extends('admin.layouts.app')

@section('content')
<div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
    <h1 class="text-2xl font-semibold">Dashboard</h1>
    <a href="https://github.com/oleksandr010419/BetTok-soccer_betting" target="_blank"
        class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
        View on github
    </a>
</div>

<!-- Content -->
<div class="mt-2">
    <!-- State cards -->
    <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">
        <!-- Value card -->
        <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                    User Logged
                </h6>
                <span class="text-xl font-semibold">{{$today_logged}}</span>
                <span class="inline-block px-2 py-px ml-2 text-xs @if($today_logged - $yesterday_logged < 0) text-red-600 bg-red-100 @else text-green-500 bg-green-100 @endif rounded-md">
                    {{($today_logged - $yesterday_logged) >= 0 ? '+'.($today_logged - $yesterday_logged) : ($today_logged - $yesterday_logged)}} logins
                </span>
            </div>
            <div>
                <span>
                    <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </span>
            </div>
        </div>

        <!-- Users card -->
        <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                    Total Users
                </h6>
                <span class="text-xl font-semibold">{{$total_users}}</span>
                <span class="inline-block px-2 py-px ml-2 text-xs @if($registered_users < 0) text-red-600 bg-red-100 @else text-green-500 bg-green-100 @endif rounded-md">
                    {{$registered_users >= 0 ? '+'.$registered_users : $registered_users}} users
                </span>
            </div>
            <div>
                <span>
                    <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </span>
            </div>
        </div>

        <!-- Orders card -->
        <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                    Orders
                </h6>
                <span class="text-xl font-semibold">{{$total_orders}}</span>
                <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                    +{{$orders_today}}
                </span>
            </div>
            <div>
                <span>
                    <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </span>
            </div>
        </div>

        <!-- Tickets card -->
        <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                    Income
                </h6>
                <span class="text-xl font-semibold">{{$total_orders * 45}} $</span>
                <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                    +{{$orders_today * 45}} $
                </span>
            </div>
            <div>
                <span>
                    <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                    </svg>
                </span>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
        <!-- Bar chart card -->
        <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
            <!-- Card header -->
            <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Latest Login Stats</h4>
                {{-- <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-500 dark:text-light">Last year</span>
                    <button class="relative focus:outline-none" x-cloak
                        @click="isOn = !isOn; $parent.updateBarChart(isOn)">
                        <div
                            class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker">
                        </div>
                        <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                            :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }">
                        </div>
                    </button>
                </div> --}}
            </div>
            <!-- Chart -->
            <div class="relative p-4 h-72">
                <canvas id="barChart"></canvas>
            </div>
        </div>

        <!-- Doughnut chart card -->
        <div class="bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
            <!-- Card header -->
            <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Doughnut Chart</h4>
                <div class="flex items-center">
                    <button class="relative focus:outline-none" x-cloak
                        @click="isOn = !isOn; $parent.updateDoughnutChart(isOn)">
                        <div
                            class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker">
                        </div>
                        <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                            :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }">
                        </div>
                    </button>
                </div>
            </div>
            <!-- Chart -->
            <div class="relative p-4 h-72">
                <canvas id="doughnutChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Two grid columns -->
    <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
        <!-- Active users chart -->
        <div class="col-span-1 bg-white rounded-md dark:bg-darker">
            <!-- Card header -->
            <div class="p-4 border-b dark:border-primary">
                <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Active users right now</h4>
            </div>
            <p class="p-4">
                <span class="text-2xl font-medium text-gray-500 dark:text-light" id="usersCount">0</span>
                <span class="text-sm font-medium text-gray-500 dark:text-primary">Users</span>
            </p>
            <!-- Chart -->
            <div class="relative p-4">
                <canvas id="activeUsersChart"></canvas>
            </div>
        </div>

        <!-- Line chart card -->
        <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
            <!-- Card header -->
            <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Line Chart</h4>
                <div class="flex items-center">
                    <button class="relative focus:outline-none" x-cloak
                        @click="isOn = !isOn; $parent.updateLineChart()">
                        <div
                            class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker">
                        </div>
                        <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                            :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }">
                        </div>
                    </button>
                </div>
            </div>
            <!-- Chart -->
            <div class="relative p-4 h-72">
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>

<script>
    // All javascript code in this project for now is just for demo DON'T RELY ON IT

const random = (max = 100) => {
  return Math.round(Math.random() * max) + 20
}

const randomData = () => {
  return [
    random(),
    random(),
    random(),
    random(),
    random(),
    random(),
    random(),
    random(),
    random(),
    random(),
    random(),
    random(),
  ]
}

const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']

const cssColors = (color) => {
  return getComputedStyle(document.documentElement).getPropertyValue(color)
}

const getColor = () => {
  return window.localStorage.getItem('color') ?? 'cyan'
}

const colors = {
  primary: cssColors(`--color-${getColor()}`),
  primaryLight: cssColors(`--color-${getColor()}-light`),
  primaryLighter: cssColors(`--color-${getColor()}-lighter`),
  primaryDark: cssColors(`--color-${getColor()}-dark`),
  primaryDarker: cssColors(`--color-${getColor()}-darker`),
}

// const latest_login_data = JOSN.parse({{!!json_encode($latest_logins)!!}});
const latest7days = ['-6 days', '-5 days', '-4 days', '-3 days', '-2 days', '-1 days', 'Today']
var latestLogins = {!! json_encode($latest_logins) !!}

const barChart = new Chart(document.getElementById('barChart'), {
  type: 'bar',
  data: {
    labels: latest7days,
    datasets: [
      {
        data: latestLogins,
        backgroundColor: colors.primary,
        hoverBackgroundColor: colors.primaryDark,
      },
    ],
  },
  options: {
    scales: {
      yAxes: [
        {
          gridLines: false,
          ticks: {
            beginAtZero: true,
            stepSize: 50,
            fontSize: 12,
            fontColor: '#97a4af',
            fontFamily: 'Open Sans, sans-serif',
            padding: 10,
          },
        },
      ],
      xAxes: [
        {
          gridLines: false,
          ticks: {
            fontSize: 12,
            fontColor: '#97a4af',
            fontFamily: 'Open Sans, sans-serif',
            padding: 5,
          },
          categoryPercentage: 0.5,
          maxBarThickness: '10',
        },
      ],
    },
    cornerRadius: 2,
    maintainAspectRatio: false,
    legend: {
      display: false,
    },
  },
})


const doughnutChart = new Chart(document.getElementById('doughnutChart'), {
  type: 'doughnut',
  data: {
    labels: ['Oct', 'Nov', 'Dec'],
    datasets: [
      {
        data: [random(), random(), random()],
        backgroundColor: [colors.primary, colors.primaryLighter, colors.primaryLight],
        hoverBackgroundColor: colors.primaryDark,
        borderWidth: 0,
        weight: 0.5,
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      position: 'bottom',
    },

    title: {
      display: false,
    },
    animation: {
      animateScale: true,
      animateRotate: true,
    },
  },
})

const activeUsersChart = new Chart(document.getElementById('activeUsersChart'), {
  type: 'bar',
  data: {
    labels: [...randomData(), ...randomData()],
    datasets: [
      {
        data: [...randomData(), ...randomData()],
        backgroundColor: colors.primary,
        borderWidth: 0,
        categoryPercentage: 1,
      },
    ],
  },
  options: {
    scales: {
      yAxes: [
        {
          display: false,
          gridLines: false,
        },
      ],
      xAxes: [
        {
          display: false,
          gridLines: false,
        },
      ],
      ticks: {
        padding: 10,
      },
    },
    cornerRadius: 2,
    maintainAspectRatio: false,
    legend: {
      display: false,
    },
    tooltips: {
      prefix: 'Users',
      bodySpacing: 4,
      footerSpacing: 4,
      hasIndicator: true,
      mode: 'index',
      intersect: true,
    },
    hover: {
      mode: 'nearest',
      intersect: true,
    },
  },
})

const lineChart = new Chart(document.getElementById('lineChart'), {
  type: 'line',
  data: {
    labels: months,
    datasets: [
      {
        data: randomData(),
        fill: false,
        borderColor: colors.primary,
        borderWidth: 2,
        pointRadius: 0,
        pointHoverRadius: 0,
      },
    ],
  },
  options: {
    responsive: true,
    scales: {
      yAxes: [
        {
          gridLines: false,
          ticks: {
            beginAtZero: false,
            stepSize: 50,
            fontSize: 12,
            fontColor: '#97a4af',
            fontFamily: 'Open Sans, sans-serif',
            padding: 20,
          },
        },
      ],
      xAxes: [
        {
          gridLines: false,
        },
      ],
    },
    maintainAspectRatio: false,
    legend: {
      display: false,
    },
    tooltips: {
      hasIndicator: true,
      intersect: false,
    },
  },
})

let randomUserCount = 0

const usersCount = document.getElementById('usersCount')

const fakeUsersCount = async (item) => {
  randomUserCount = item
  activeUsersChart.data.datasets[0].data.push(randomUserCount)
  activeUsersChart.data.datasets[0].data.splice(0, 1)
  activeUsersChart.update()
  usersCount.innerText = randomUserCount
}

setInterval(() => {
  fakeUsersCount({!!DB::table('sessions')->whereNotNull('user_id')->count()!!})
}, 1000)

</script>

@endsection