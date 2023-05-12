@extends('layout.master')
@section('dashboard')
active
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  
    <div class="flex bg-gray-50 py-2 px-2 font-normal text-xs text-gray-400">
        <div class="text-sm text-gray-700 font-semibold px-4">Welcome back!</div>
        <div class="ml-auto flex space-x-2 px-4">
          <span class="cursor-pointer transition-all ease-in-out duration-300 hover:text-green-500 hover:bg-gray-200 py-1 px-2 rounded-sm">Today</span>
          <span class="cursor-pointertransition-all ease-in-out duration-300 hover:text-green-500 hover:bg-gray-200 py-1 px-2 rounded-sm">Month</span>
          <span class="cursor-pointer transition-all ease-in-out duration-300 hover:text-green-500 hover:bg-gray-200 py-1 px-2 rounded-sm">Year</span>
          <span class="cursor-pointer transition-all ease-in-out duration-300 text-gray-400 bg-gray-200 py-1 rounded-sm px-2"
            >Today:
            <span class="text-green-500 ml-1"> Jan 5 </span>
          </span>
          <span class="cursor-pointer py-1 px-2 text-green-500 hover:bg-gray-200 rounded">
            <svg class="block w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
          </span>
        </div>
      </div>
    </nav>
    <div class="main_content bg-blue-100 col-span-10 overflow-y-scroll relative  grid grid-cols-1  ">
      <div class="container px-8 m-auto mt-6">
        <div class="grid md:grid-cols-12 gap-4 sm:grid-cols-1">
          <div class="col-span-4 bg-gray-100 shadow rounded-2xl grid grid-cols-2 gap-4 p-4">
            <div class="card-header h-52 col-span-2 bg-red-400 rounded-t-2xl -m-4"></div>
            <div class="col-span-1 bg-yellow-100 rounded-md px-2 py-5 -mt-6">
              <svg class="block text-yellow-500 w-6/12 h-3/6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
              </svg>
              <h4 class="text-base font-medium text-yellow-500">Weekly sales</h4>
            </div>
            <div class="col-span-1 bg-blue-100 rounded-md px-2 py-5 -mt-6">
              <svg class="block text-blue-500 w-6/12 h-3/6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
              <h4 class="text-base font-medium text-blue-500">Total users</h4>
            </div>

            <div class="col-span-1 bg-red-100 rounded-md px-2 py-5">
              <svg class="block text-red-400 w-6/12 h-3/6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 128 160" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M102.7,92.5l6.1,6.1c0.1,0.1,0.3,0.2,0.5,0.2c0.2,0,0.4-0.1,0.5-0.2l4.1-4.1c0.1-0.1,0.2-0.3,0.2-0.5   c0-0.2-0.1-0.4-0.2-0.5l-9.1-9.1l3.1-1.5c0.3-0.1,0.4-0.4,0.4-0.7v-0.4c0-0.3-0.2-0.6-0.5-0.7l-5.3-2.1v-27c0,0,0,0,0,0v0   c0,0,0-0.1,0-0.1c0,0,0,0,0,0c-0.1-0.3-0.4-0.5-0.7-0.6l-11.2-9.1V28.4c0-1.9-1.6-3.5-3.5-3.5h-18l-13.5-11c-0.3-0.2-0.7-0.2-0.9,0   l-13.5,11h-18c-1.9,0-3.5,1.6-3.5,3.5v13.9L8.4,51.4c-0.2,0-0.4,0.1-0.5,0.3c0,0,0,0.1-0.1,0.1c0,0,0,0.1,0,0.1   c0,0.1-0.1,0.2-0.1,0.3v54.7c0,0,0,0,0,0c0,0,0,0,0,0c0,0.1,0,0.2,0.1,0.3c0,0,0,0,0,0c0.1,0.1,0.1,0.2,0.2,0.2c0,0,0,0,0,0   c0,0,0,0,0,0c0.1,0.1,0.2,0.1,0.4,0.1h93.4c0.3,0,0.5-0.2,0.6-0.4l0,0c0.1-0.1,0.1-0.2,0.1-0.4v0c0,0,0,0,0,0V92.5z M103.3,83.6   c-0.2,0.1-0.4,0.3-0.4,0.5c0,0.2,0,0.5,0.2,0.6l9.3,9.3l-3.1,3l-9.3-9.3c-0.1-0.1-0.3-0.2-0.5-0.2c0,0-0.1,0-0.1,0   c-0.2,0-0.4,0.2-0.5,0.4l-1.5,3l-5.7-14.5l14.5,5.7L103.3,83.6z M90.7,74.5c-0.3-0.1-0.6,0-0.8,0.2c-0.2,0.2-0.3,0.5-0.2,0.8   l6.9,17.7c0.1,0.3,0.4,0.5,0.7,0.5c0.3,0,0.6-0.1,0.7-0.4l1.7-3.6l1.5,1.5v14.5L64.6,84.3l25.8-21.6l10.7-9v24.8L90.7,74.5z    M100.7,52.2l-10,8.3V44.2L100.7,52.2z M55.2,15.4l11.7,9.4H43.5L55.2,15.4z M21.2,28.4c0-1.1,0.9-2,2-2h18.2h27.5h18.2   c1.1,0,2,0.9,2,2v14.3v19.2L63.8,83l-0.5,0.4L60.7,82c-3.4-2-7.6-2-11,0l-2.6,1.5l-26-21.7V42.6V28.4z M9.2,105.5V53.7l36.6,30.5   L9.2,105.5L9.2,105.5z M19.7,44.2v16.4l-10-8.3L19.7,44.2z M11.2,106.1l2.2-1.3l37.1-21.6c2.9-1.7,6.6-1.7,9.5,0l39.3,22.8H11.2z" />
              </svg>

              <h4 class="text-base font-medium text-red-500">Items sales</h4>
            </div>
            <div class="col-span-1 bg-green-100 rounded-md px-2 py-5">
              <svg class="block text-green-500 w-6/12 h-3/6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="1 -1 100 125"" stroke="currentColor">
                <g xmlns="http://www.w3.org/2000/svg" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                  <ellipse class="st0" cx="51.1" cy="58" rx="30.2" ry="36.2" />
                  <line class="st0" x1="23.8" y1="42.3" x2="78.4" y2="42.3" />
                  <line class="st0" x1="51.1" y1="94.2" x2="51.1" y2="42.2" />
                  <line class="st0" x1="81.3" y1="60.9" x2="94.3" y2="60.9" />
                  <line class="st0" x1="79" y1="72.6" x2="92" y2="76.1" />
                  <line class="st0" x1="20.7" y1="60.9" x2="7.7" y2="60.9" />
                  <g stroke-linecap="round" stroke-linejoin="round" stroke-width="1">
                    <line class="st0" x1="80.6" y1="49.2" x2="93.6" y2="45.7" />
                    <line class="st0" x1="21.4" y1="49.2" x2="8.4" y2="45.7" />
                  </g>
                  <line class="st0" x1="23" y1="72.6" x2="10" y2="76.1" />
                  <g stroke-linecap="round" stroke-linejoin="round" stroke-width="1">
                    <circle class="st0" cx="68.1" cy="9.5" r="5.6" />
                    <line class="st0" x1="63.8" y1="25.3" x2="66.6" y2="14.9" />
                    <circle class="st0" cx="34.2" cy="9.5" r="5.6" />
                    <line class="st0" x1="38.4" y1="25.3" x2="35.6" y2="14.9" />
                  </g>
                </g>
                <g xmlns="http://www.w3.org/2000/svg" stroke-linecap="round" stroke-linejoin="round" stroke-width="1">
                  <circle class="st0" cx="35.3" cy="57.4" r="5.7" />
                  <circle class="st0" cx="39" cy="75.8" r="3.4" />
                  <circle class="st0" cx="66.7" cy="57.4" r="5.7" />
                  <circle class="st0" cx="63" cy="75.8" r="3.4" />
                </g>
              </svg>
              <h4 class="text-base font-medium text-green-500">Bug reports</h4>
            </div>
          </div>

          <div class="custom-scroll col-span-4 bg-gray-100 rounded-2xl text-sm text-gray-400 overflow-x-hidden overflow-y-auto">
            <h3 class="p-4  flex  ">
              <div class="pt-5" >
                <span class=" block font-semibold text-base text-gray-800">
                  My activities
                </span>
                <span class=" text-xs ">
                  13,234 Sales
                </span>
                </div>
              <div class=" ml-auto bg-gray-100 flex items-center px-3 rounded hover:bg-gray-200 transition-all ease-in-out duration-300 cursor-pointer">
                <svg class="block w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                </svg>
              </span>
            </h3>


            <ul class="font-medium">
              <li class=" grid  grid-cols-8 px-4 text-xs mb-6 ">
                <span class=" col-span-2 text-gray-800 font-semibold">12:30 PM</span> 
                <span class="block w-3 h-3 bg-gray-100 border-2 border-green-500  rounded-full col-span-1 relative z-10">
                  <span class=" absolute inset-x-1/4 w-1 opacity-25  h-16 bg-gray-300 slashed-zero"></span>
                </span>
                <span class=" col-span-5">
                 Outlines keep you honest. And keep structure 
                </span>
              </li>


              <li class=" grid  grid-cols-8 px-4 text-xs mb-6 ">
                <span class=" col-span-2 text-gray-800 font-semibold">12:30 PM</span> 
                <span class="block w-3 h-3 bg-gray-100 border-2 border-red-500  rounded-full col-span-1 relative z-10">
                  <span class=" absolute inset-x-1/4 w-1 opacity-25  h-16 bg-gray-300 slashed-zero"></span>
                </span>
                <span class=" col-span-5 text-gray-800">
                 Outlines keep you honest. And keep structure 
                </span>
              </li>

              <li class=" grid  grid-cols-8 px-4 text-xs mb-6 ">
                <span class=" col-span-2 text-gray-800 font-semibold">12:30 PM</span> 
                <span class="block w-3 h-3 bg-gray-100 border-2 border-purple-500  rounded-full col-span-1 relative z-10">
                  <span class=" absolute inset-x-1/4 w-1 opacity-25  h-16 bg-gray-300 slashed-zero"></span>
                </span>
                <span class=" col-span-5 text-gray-800">
                 Create new project ticket <span class=" text-blue-600">#4321</span> 
                </span>
              </li>


              <li class=" grid  grid-cols-8 px-4 text-xs mb-6 ">
                <span class=" col-span-2 text-gray-800 font-semibold">12:30 PM</span> 
                <span class="block w-3 h-3 bg-gray-100 border-2 border-blue-500  rounded-full col-span-1 relative z-10">
                  <span class=" absolute inset-x-1/4 w-1 opacity-25  h-16 bg-gray-300 slashed-zero"></span>
                </span>
                <span class=" col-span-5">
                 Outlines keep you honest. And keep structure 
                </span>
              </li>


              <li class=" grid  grid-cols-8 px-4 text-xs mb-6 ">
                <span class=" col-span-2 text-gray-800 font-semibold">12:30 PM</span> 
                <span class="block w-3 h-3 bg-gray-100 border-2 border-green-500  rounded-full col-span-1 relative z-10">
                  <span class=" absolute inset-x-1/4 w-1 opacity-25  h-16 bg-gray-300 slashed-zero"></span>
                </span>
                <span class=" col-span-5 text-gray-800">
                 Outlines keep you honest. And keep structure 
                </span>
              </li>

              <li class=" grid  grid-cols-8 px-4 text-xs mb-6 ">
                <span class=" col-span-2 text-gray-800 font-semibold">12:30 PM</span> 
                <span class="block w-3 h-3 bg-gray-100 border-2 border-green-500  rounded-full col-span-1 relative z-10">
                  <span class=" absolute inset-x-1/4 w-1 opacity-25  h-16 bg-gray-300 slashed-zero"></span>
                </span>
                <span class=" col-span-5">
                 Outlines keep you honest. And keep structure 
                </span>
              </li>

           
            </ul>
          </div>


          <div class="col-span-4  rounded grid">
            <div class="card-header w-full h-60 bg-gray-50 rounded-2xl"></div>
            <div class="card-header w-full h-60 bg-gray-50 rounded-2xl mt-auto"></div>
          </div>
        </div>


        <div class="grid md:grid-cols-12 gap-4 sm:grid-cols-1 mt-6">
          <div class="col-span-4 bg-gray-100 shadow rounded-2xl grid grid-cols-2 gap-4 p-4 h-40">
           
          </div>

          <div class="col-span-8  rounded grid h-40">
            <div class="card-header w-full h-full bg-gray-50 rounded-2xl"></div>
          </div>
        </div>



        <div class="grid md:grid-cols-12 gap-4 sm:grid-cols-1 mt-6">
          <div class="h-40 col-span-4 bg-gray-100 shadow rounded-2xl grid grid-cols-2 gap-4 p-4">
          </div>
          <div class="col-span-4  rounded grid">
            <div class="card-header w-full h-full bg-gray-50 rounded-2xl"></div>
          </div>
          <div class="col-span-4  rounded grid">
            <div class="card-header w-full h-full bg-gray-50 rounded-2xl"></div>
          </div>
        </div>


        <div class="grid md:grid-cols-12 gap-4 sm:grid-cols-1 mt-6">
          <div class="h-40 col-span-4 bg-gray-100 shadow rounded-2xl grid grid-cols-2 gap-4 p-4">
          </div>
          <div class="col-span-8  rounded grid">
            <div class="card-header w-full h-full bg-gray-50 rounded-2xl"></div>
          </div>
        </div>
      </div>


</body>
</html>


@endsection
