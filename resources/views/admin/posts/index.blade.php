<div class="bg-white pb-4 px-4 rounded-md w-full mb-2">
    <div class="flex justify-between w-full pt-6 ">
        <p class="ml-3"> Users Table</p>
        <svg width="14" height="4" viewBox="0 0 14 4" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g opacity="0.4">
                <circle cx="2.19796" cy="1.80139" r="1.38611" fill="#222222" />
                <circle cx="11.9013" cy="1.80115" r="1.38611" fill="#222222" />
                <circle cx="7.04991" cy="1.80115" r="1.38611" fill="#222222" />
            </g>
        </svg>
    </div>
    <div class="w-full flex justify-end px-2 mt-2">
        <div class="w-full sm:w-64 inline-block relative ">
            <input type="" name=""
                class="leading-snug border border-gray-300 block w-full appearance-none bg-gray-100 text-sm text-gray-600 py-1 px-4 pl-8 rounded-lg"
                placeholder="Search" />

            <div class="pointer-events-none absolute pl-3 inset-y-0 left-0 flex items-center px-2 text-gray-300">

                <svg class="fill-current h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999">
                    <path
                        d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z" />
                </svg>
            </div>
        </div>
    </div>
    <div class="p-4" style="text-align:right">
        <a class= "bg-primary p-2 m-20 text-white" href="{{ route('admin.posts.create') }}">+ Create</a>
    </div>
    <div class="overflow-auto mt-6">

        <table class="table border-collapse w-full">
            <thead>
                <tr class="rounded-lg text-sm font-medium text-gray-700 text-center" style="font-size: 0.9674rem">
                    <th class="px-4 py-2 " style="background-color:#f8f8f8">Event</th>
                    <th class="px-4 py-2 " style="background-color:#f8f8f8">Date</th>
                    <th class="px-4 py-2 " style="background-color:#f8f8f8">Description</th>
                    <th class="px-4 py-2 " style="background-color:#f8f8f8">Created at</th>
                    <th class="px-4 py-2 " style="background-color:#f8f8f8">Odd</th>
                    <th class="px-4 py-2 " style="background-color:#f8f8f8">Stake</th>
                    <th class="px-4 py-2 " style="background-color:#f8f8f8">Gain</th>
                    <th class="px-4 py-2 " style="background-color:#f8f8f8">Profit</th>
                    <th class="px-4 py-2 " style="background-color:#f8f8f8">Hidden</th>
                    <th class="px-4 py-2 " style="background-color:#f8f8f8">Subscription</th>
                    <th class="px-4 py-2 " style="background-color:#f8f8f8">Pick</th>
                    <th class="px-4 py-2 " style="background-color:#f8f8f8">Action</th>
                </tr>
            </thead>
            <tbody class="text-sm font-normal text-gray-700">
                @foreach($posts as $post)
                    <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
                        <td class="px-4 py-4 text-center">{{$post['event']}}</td>
                        <td class="px-4 py-4 text-center">{{$post['date']}}</td>
                        <td class="px-4 py-4 text-center">{{$post['description']}}</td>
                        <td class="px-4 py-4 text-center">{{date('d-m-Y', strtotime($post['created_at']))}}</td>
                        <td class="px-4 py-4 text-center">{{$post['odds']}}</td>
                        <td class="px-4 py-4 text-center">{{$post['stake']}}</td>
                        <td class="px-4 py-4 text-center">{{$post['gain']}}</td>
                        <td class="px-4 py-4 text-center">{{$post['profit']}}</td>
                        <td class="px-4 py-4 text-center">{{$post['hidden']}}</td>
                        <td class="px-4 py-4 text-center">{{$post['subscription_plan']['name']}}</td>
                        <td class="px-4 py-4 text-center">{{$post['pick']}}</td>
                        <td class="px-4 py-4 text-center flex justify-center">
                            <a href="{{route("admin.posts")}}/{{$post['id']}}">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 32 32">
    <path d="M 23.900391 3.9726562 C 22.853426 3.9726562 21.805365 4.3801809 20.992188 5.1933594 L 5.1796875 21.007812 L 3.7246094 28.275391 L 10.992188 26.820312 L 11.207031 26.607422 L 26.806641 11.007812 C 28.432998 9.381456 28.432998 6.8197164 26.806641 5.1933594 C 25.993462 4.3801809 24.947355 3.9726563 23.900391 3.9726562 z M 23.900391 5.8769531 C 24.403426 5.8769531 24.905757 6.1206004 25.392578 6.6074219 C 26.366221 7.5810649 26.366221 8.620107 25.392578 9.59375 L 24.699219 10.285156 L 21.714844 7.3007812 L 22.40625 6.6074219 C 22.893072 6.1206004 23.397355 5.8769531 23.900391 5.8769531 z M 20.300781 8.7148438 L 23.285156 11.699219 L 11.175781 23.810547 C 10.519916 22.5187 9.4812999 21.480084 8.1894531 20.824219 L 20.300781 8.7148438 z M 6.9042969 22.576172 C 8.0686534 23.064699 8.9374718 23.931222 9.4257812 25.095703 L 6.2753906 25.726562 L 6.9042969 22.576172 z"></path>
    </svg>
                            </a>
                            <a href="{{route("admin.posts")}}/{{$post['id']}}/delete">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 100 100">
<path d="M 74.660156 5.0214844 C 74.659429 5.0214844 69.267647 5.0769605 64.810547 8.953125 L 61.189453 5.7480469 A 1.0001 1.0001 0 0 0 60.550781 5.4960938 A 1.0001 1.0001 0 0 0 59.771484 5.8398438 L 54.826172 11.527344 L 48.322266 10.566406 A 1.0001 1.0001 0 0 0 47.59375 10.742188 L 41.730469 14.943359 L 39.160156 11.740234 A 1.0001 1.0001 0 0 0 38.375 11.365234 A 1.0001 1.0001 0 0 0 37.541016 11.824219 L 35.396484 15.154297 A 2.0002 2.0002 0 0 0 34.566406 15.011719 A 2.0002 2.0002 0 0 0 34.230469 15.054688 C 28.564511 16.211696 25.702757 18.228993 24.40625 20.404297 C 23.122886 22.557549 23.739249 24.790581 23.751953 24.835938 A 2.0002 2.0002 0 0 0 23.921875 26.287109 A 2.0002912 2.0002912 0 0 0 23.769531 26.962891 C 22.650064 50.479763 24.866574 69.477763 23.771484 87.005859 A 2.0002 2.0002 0 0 0 25.228516 89.056641 C 41.480363 93.591849 60.329009 93.25847 77.367188 89.072266 A 2.0002 2.0002 0 0 0 78.888672 87.177734 C 79.181141 74.956164 78.838177 61.65828 77.78125 47.146484 L 79.355469 25.46875 A 2.0002 2.0002 0 0 0 79.355469 25.146484 A 2.0004429 2.0004429 0 0 0 79.402344 24.832031 C 79.549081 22.606514 79.076621 19.934478 77.099609 17.259766 A 2.0002 2.0002 0 0 0 76.160156 16.544922 C 76.391807 15.884474 76.57399 15.171431 76.679688 14.386719 C 76.981713 12.144419 76.713948 9.3820338 75.617188 5.734375 A 1.0001 1.0001 0 0 0 74.660156 5.0214844 z M 73.873047 7.0878906 C 74.695809 10.100819 74.927484 12.409958 74.697266 14.119141 C 74.482486 15.713706 73.907255 16.86564 73.185547 17.939453 L 62.890625 14.871094 C 63.545954 13.498514 64.318081 12.376056 65.144531 11.443359 C 65.139907 11.810412 65.210276 12.205835 65.421875 12.572266 C 65.760738 13.159082 66.351747 13.601685 67.166016 13.939453 C 68.113478 14.332961 69.127496 14.205203 69.8125 13.710938 C 70.497504 13.21667 70.873346 12.452084 70.910156 11.652344 C 70.946966 10.852603 70.58194 9.9615174 69.800781 9.4414062 C 69.410202 9.1813508 68.948366 9.0197411 68.423828 8.9570312 C 68.326164 8.9453553 68.215263 8.954079 68.113281 8.9492188 C 70.540009 7.4756048 72.877889 7.1527782 73.873047 7.0878906 z M 60.619141 7.9140625 L 63.382812 10.361328 C 62.274707 11.626409 61.278679 13.184675 60.519531 15.121094 A 1.0001 1.0001 0 0 0 61.164062 16.445312 L 68.101562 18.511719 L 67.431641 20.144531 L 62.132812 18.666016 A 1.0001 1.0001 0 1 0 61.595703 20.591797 L 66.669922 22.007812 L 65.490234 24.888672 L 62.248047 23.84375 A 1.0001 1.0001 0 1 0 61.634766 25.746094 L 64.460938 26.658203 C 62.444545 27.035838 60.439462 27.315092 58.460938 27.509766 A 1.0001 1.0001 0 0 0 58.464844 27.365234 L 57.988281 17.105469 A 1.0001 1.0001 0 0 0 56.705078 16.193359 L 45.416016 19.535156 L 42.984375 16.503906 L 48.431641 12.603516 L 55.074219 13.585938 A 1.0001 1.0001 0 0 0 55.976562 13.253906 L 60.619141 7.9140625 z M 68.212891 11.007812 C 68.442891 11.01977 68.613312 11.053469 68.691406 11.105469 C 68.882592 11.232764 68.921425 11.358162 68.912109 11.560547 C 68.902809 11.762931 68.782528 11.987454 68.640625 12.089844 C 68.498722 12.192234 68.354178 12.267242 67.931641 12.091797 C 67.375409 11.861065 67.196824 11.649293 67.152344 11.572266 C 67.107864 11.495236 67.112131 11.494587 67.144531 11.382812 C 67.182221 11.252733 67.275116 11.165596 67.375 11.039062 C 67.693309 11.005643 67.98289 10.995855 68.212891 11.007812 z M 38.470703 14.076172 L 44.275391 21.310547 A 1.0001 1.0001 0 0 0 45.339844 21.642578 L 56.048828 18.472656 L 56.466797 27.457031 A 1.0001 1.0001 0 0 0 56.501953 27.677734 C 51.838306 28.01236 47.372256 27.90406 43.376953 27.537109 C 38.612801 27.099543 34.515016 26.307154 31.570312 25.527344 C 31.420877 25.48777 31.311421 25.449657 31.167969 25.410156 L 35.380859 18.873047 A 2.0002 2.0002 0 0 0 36.650391 16.900391 L 38.470703 14.076172 z M 70.027344 19.085938 L 73.351562 20.076172 A 1.0001 1.0001 0 0 0 74.125 19.990234 C 75.061339 21.35477 75.371701 22.434564 75.419922 23.53125 C 73.068807 24.461562 70.68255 25.217943 68.289062 25.820312 A 1.0003075 1.0003075 0 0 0 68.076172 25.722656 L 67.398438 25.503906 L 68.609375 22.550781 L 70.576172 23.099609 A 1.0005804 1.0005804 0 1 0 71.113281 21.171875 L 69.373047 20.685547 L 70.027344 19.085938 z M 32.515625 19.625 L 29.435547 24.408203 A 1.0001 1.0001 0 0 0 29.273438 24.839844 C 28.84409 24.696449 28.42389 24.55365 28.107422 24.427734 C 27.898142 24.344467 27.800854 24.290739 27.648438 24.220703 A 2.000291 2.000291 0 0 0 27.539062 23.550781 C 27.539062 23.550781 27.322554 23.322368 27.841797 22.451172 C 28.260958 21.747895 29.439469 20.588434 32.515625 19.625 z M 75.167969 27.90625 L 73.785156 46.974609 A 2.0002 2.0002 0 0 0 73.785156 47.265625 C 73.815309 47.677604 73.838268 48.078429 73.867188 48.488281 C 71.992266 49.316141 70.02588 49.339844 66.888672 49.339844 A 1.0001 1.0001 0 1 0 66.888672 51.339844 C 69.724725 51.339844 71.905979 51.342185 74.009766 50.587891 C 74.838729 63.143247 75.095155 74.709941 74.886719 85.466797 C 65.633437 87.597924 55.875682 88.529872 46.398438 88.142578 L 47.029297 86.228516 A 1.0001 1.0001 0 0 0 46.087891 84.902344 A 1.0001 1.0001 0 0 0 45.128906 85.601562 L 44.324219 88.039062 C 43.292661 87.975352 42.266524 87.894792 41.244141 87.798828 L 42.388672 86.191406 A 1.0001 1.0001 0 0 0 41.585938 84.599609 A 1.0001 1.0001 0 0 0 40.759766 85.03125 L 38.958984 87.5625 C 38.153149 87.466905 37.352587 87.35853 36.554688 87.242188 L 37.775391 84.798828 A 1.0001 1.0001 0 0 0 36.835938 83.339844 A 1.0001 1.0001 0 0 0 35.986328 83.904297 L 34.484375 86.910156 C 33.379178 86.721966 32.282742 86.51469 31.197266 86.285156 L 32.775391 83.130859 A 1.0001 1.0001 0 0 0 31.833984 81.671875 A 1.0001 1.0001 0 0 0 30.986328 82.236328 L 29.318359 85.570312 A 1.0001167 1.0001167 0 0 0 29.230469 85.839844 C 28.755125 85.726811 28.275413 85.621294 27.804688 85.5 C 28.676515 68.345114 26.78738 50.325961 27.710938 28.529297 C 28.536968 28.815219 29.449391 29.103898 30.546875 29.394531 C 31.19236 29.565467 31.913237 29.733907 32.646484 29.900391 L 30.986328 33.222656 A 1.0001 1.0001 0 1 0 32.775391 34.115234 L 34.441406 30.78125 A 1.0001 1.0001 0 0 0 34.552734 30.296875 C 35.475772 30.479674 36.446035 30.650215 37.46875 30.8125 L 36.542969 32.666016 A 1.0001161 1.0001161 0 1 0 38.332031 33.560547 L 39.546875 31.128906 C 40.601947 31.268783 41.698706 31.393482 42.832031 31.5 L 41.826172 32.875 A 1.0001 1.0001 0 1 0 43.439453 34.056641 L 45.185547 31.671875 C 46.070987 31.731487 46.952406 31.790868 47.873047 31.824219 L 47.1875 33.384766 A 1.0004822 1.0004822 0 1 0 49.019531 34.189453 L 50.037109 31.875 C 50.935882 31.884936 51.843945 31.8831 52.767578 31.863281 L 52.035156 33.328125 A 1.0001165 1.0001165 0 1 0 53.824219 34.222656 L 55.042969 31.785156 C 56.090608 31.733464 57.15302 31.654715 58.222656 31.558594 L 57.484375 33.927734 A 1.0001544 1.0001544 0 1 0 59.394531 34.521484 L 60.388672 31.332031 C 61.458422 31.204951 62.534466 31.054835 63.617188 30.876953 L 62.75 32.255859 A 1.0001 1.0001 0 1 0 64.441406 33.322266 L 66.289062 30.390625 C 67.552909 30.132192 68.821526 29.826192 70.089844 29.488281 L 68.849609 32.992188 A 1.000736 1.000736 0 1 0 70.736328 33.660156 L 71.980469 30.146484 A 1.0001 1.0001 0 0 0 71.693359 29.039062 C 72.853827 28.697224 74.012913 28.322523 75.167969 27.90625 z M 36.996094 36.333984 C 36.127077 36.333984 35.293186 36.669679 34.677734 37.279297 C 34.060823 37.890375 33.723338 38.732249 33.763672 39.595703 A 1.0001 1.0001 0 0 0 33.763672 39.597656 C 33.923647 42.940234 34.2092 48.831499 34.212891 48.908203 L 33.103516 67.291016 A 1.0001 1.0001 0 0 0 33.101562 67.398438 C 33.101562 67.398438 33.386834 73.573606 33.548828 77.105469 C 33.634948 79.004338 35.279144 80.466797 37.197266 80.466797 L 38.332031 80.466797 C 39.882555 80.466797 41.214844 79.239152 41.214844 77.683594 L 41.214844 51.554688 A 1.0001 1.0001 0 1 0 39.214844 51.554688 L 39.214844 77.683594 C 39.214844 78.098035 38.857507 78.466797 38.332031 78.466797 L 37.197266 78.466797 C 36.275388 78.466797 35.582755 77.806756 35.546875 77.015625 A 1.0001 1.0001 0 0 0 35.546875 77.013672 C 35.385879 73.503552 35.105065 67.443362 35.101562 67.367188 L 36.210938 48.980469 A 1.0001 1.0001 0 0 0 36.210938 48.871094 C 36.210938 48.871094 35.922705 42.865656 35.761719 39.501953 C 35.748049 39.209407 35.854899 38.926141 36.083984 38.699219 C 36.312533 38.472836 36.64511 38.333984 36.996094 38.333984 L 37.027344 38.333984 C 37.621965 38.333984 38.186933 38.560265 38.59375 38.945312 C 38.998746 39.330649 39.214844 39.834723 39.214844 40.355469 L 39.214844 45.761719 A 1.0001 1.0001 0 1 0 41.214844 45.761719 L 41.214844 40.355469 C 41.214844 39.274818 40.758796 38.242631 39.970703 37.494141 A 1.0001 1.0001 0 0 0 39.96875 37.492188 C 39.179567 36.745235 38.124723 36.333984 37.027344 36.333984 L 36.996094 36.333984 z M 64.226562 36.333984 C 63.357546 36.333984 62.521701 36.669679 61.90625 37.279297 C 61.291417 37.889759 60.951798 38.731099 60.992188 39.595703 A 1.0001 1.0001 0 0 0 60.992188 39.597656 C 61.152161 42.940234 61.437716 48.831499 61.441406 48.908203 L 60.332031 67.291016 A 1.0001 1.0001 0 0 0 60.330078 67.398438 C 60.330078 67.398438 60.614326 73.573089 60.777344 77.105469 C 60.863464 79.004338 62.507659 80.466797 64.425781 80.466797 L 65.5625 80.466797 C 67.113024 80.466797 68.443359 79.239152 68.443359 77.683594 L 68.443359 54.714844 A 1.0001 1.0001 0 1 0 66.443359 54.714844 L 66.443359 77.683594 C 66.443359 78.098035 66.087976 78.466797 65.5625 78.466797 L 64.425781 78.466797 C 63.503903 78.466797 62.811271 77.806756 62.775391 77.015625 A 1.0001 1.0001 0 0 0 62.775391 77.013672 C 62.613424 73.504066 62.333569 67.443362 62.330078 67.367188 L 63.439453 48.980469 A 1.0001 1.0001 0 0 0 63.441406 48.871094 C 63.441406 48.871094 63.15122 42.865656 62.990234 39.501953 C 62.976624 39.210557 63.085284 38.926757 63.314453 38.699219 C 63.543002 38.472836 63.87558 38.333984 64.226562 38.333984 L 64.257812 38.333984 C 64.851791 38.333984 65.415547 38.561025 65.822266 38.945312 C 66.228406 39.330399 66.443359 39.833287 66.443359 40.355469 L 66.443359 45.761719 A 1.0001 1.0001 0 1 0 68.443359 45.761719 L 68.443359 40.355469 C 68.443359 39.275651 67.989078 38.243054 67.199219 37.494141 A 1.0001 1.0001 0 0 0 67.199219 37.492188 C 66.409989 36.745275 65.355193 36.333984 64.257812 36.333984 L 64.226562 36.333984 z M 50.523438 37.386719 C 48.610732 37.386719 46.970938 38.840477 46.875 40.732422 C 46.712007 43.984282 46.439453 49.398437 46.439453 49.398438 A 1.0001 1.0001 0 0 0 46.441406 49.507812 L 47.550781 67.898438 C 47.547681 67.975437 47.24019 75.480607 47.083984 79.332031 C 47.049624 80.194062 47.391028 81.029166 48.003906 81.634766 A 1.0001 1.0001 0 0 0 48.005859 81.638672 C 48.620921 82.242074 49.452684 82.572266 50.318359 82.572266 L 50.365234 82.572266 C 51.461825 82.572266 52.517031 82.163372 53.306641 81.416016 A 1.0001 1.0001 0 0 0 53.306641 81.414062 C 54.0965 80.665149 54.552734 79.632553 54.552734 78.552734 L 54.552734 71.039062 A 1.0001 1.0001 0 1 0 52.552734 71.039062 L 52.552734 78.552734 C 52.552734 79.074916 52.337781 79.577804 51.931641 79.962891 C 51.525251 80.347534 50.960643 80.572266 50.365234 80.572266 L 50.318359 80.572266 C 49.968942 80.572266 49.639036 80.436461 49.410156 80.212891 L 49.408203 80.210938 C 49.180413 79.984973 49.07238 79.703219 49.083984 79.412109 C 49.240978 75.541265 49.550781 67.919922 49.550781 67.919922 A 1.0001 1.0001 0 0 0 49.548828 67.820312 L 48.441406 49.4375 C 48.445206 49.36269 48.71118 44.063381 48.873047 40.833984 C 48.913107 40.043929 49.604142 39.386719 50.523438 39.386719 L 51.671875 39.386719 C 51.91837 39.386719 52.151595 39.482549 52.3125 39.634766 C 52.474429 39.788437 52.550781 39.975992 52.550781 40.169922 L 52.550781 65.246094 A 1.0001 1.0001 0 1 0 54.550781 65.246094 L 54.550781 40.169922 C 54.550781 39.417852 54.231571 38.699922 53.6875 38.183594 A 1.0001 1.0001 0 0 0 53.6875 38.181641 C 53.144405 37.667907 52.42338 37.386719 51.671875 37.386719 L 50.523438 37.386719 z M 71.333984 71.570312 C 70.720984 71.570313 70.222656 72.068641 70.222656 72.681641 C 70.222656 73.294641 70.719984 73.792969 71.333984 73.792969 C 71.947984 73.792969 72.445312 73.295641 72.445312 72.681641 C 72.445312 72.068641 71.947984 71.570312 71.333984 71.570312 z M 72.029297 77.615234 C 71.415297 77.615234 70.919922 78.113563 70.919922 78.726562 C 70.919922 79.339562 71.415297 79.837891 72.029297 79.837891 C 72.642297 79.837891 73.140625 79.340563 73.140625 78.726562 C 73.140625 78.112562 72.642297 77.615234 72.029297 77.615234 z M 68.482422 82.507812 C 67.868422 82.507812 67.371094 83.006141 67.371094 83.619141 C 67.371094 84.232141 67.868422 84.730469 68.482422 84.730469 C 69.095422 84.730469 69.59375 84.232141 69.59375 83.619141 C 69.59375 83.005141 69.095422 82.507812 68.482422 82.507812 z"></path>
</svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="pagination" class="w-full flex justify-center border-t border-gray-100 pt-4 items-center">

        <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g opacity="0.4">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M9 12C9 12.2652 9.10536 12.5196 9.29289 12.7071L13.2929 16.7072C13.6834 17.0977 14.3166 17.0977 14.7071 16.7072C15.0977 16.3167 15.0977 15.6835 14.7071 15.293L11.4142 12L14.7071 8.70712C15.0977 8.31659 15.0977 7.68343 14.7071 7.29289C14.3166 6.90237 13.6834 6.90237 13.2929 7.29289L9.29289 11.2929C9.10536 11.4804 9 11.7348 9 12Z"
                    fill="#2C2C2C" />
            </g>
        </svg>

        <p class="leading-relaxed cursor-pointer mx-2 text-blue-600 hover:text-blue-600 text-sm">1</p>
        <p class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600">2</p>
        <p class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600"> 3 </p>
        <p class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600"> 4 </p>
        <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M15 12C15 11.7348 14.8946 11.4804 14.7071 11.2929L10.7071 7.2929C10.3166 6.9024 9.6834 6.9024 9.2929 7.2929C8.9024 7.6834 8.9024 8.3166 9.2929 8.7071L12.5858 12L9.2929 15.2929C8.9024 15.6834 8.9024 16.3166 9.2929 16.7071C9.6834 17.0976 10.3166 17.0976 10.7071 16.7071L14.7071 12.7071C14.8946 12.5196 15 12.2652 15 12Z"
                fill="#18A0FB" />
        </svg>

    </div>
</div>

<style>
    thead tr th:first-child {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    thead tr th:last-child {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    tbody tr td:first-child {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 0px;
    }

    tbody tr td:last-child {
        border-top-right-radius: 5px;
        border-bottom-right-radius: 0px;
    }
</style>