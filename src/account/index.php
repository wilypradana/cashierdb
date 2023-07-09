<!doctype html>
<html lang="id-ID">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
    <script src="https://cdn.tailwindcss.com"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style>
      /*
		You may need this for responsive background
		header {
			background: url('bg-425.jpg');
		}

		@media only screen and (min-width:640px) {
			header {
				background: url('bg-640.jpg');
			}
		}

		@media only screen and (min-width:768px) {
			header {
				background: url('bg-768.jpg');
			}
		}

		@media only screen and (min-width:1024px) {
			header {
				background: url('bg-1024.jpg');
			}
		}

		@media only screen and (min-width:1025px) {
			header {
				background: url('bg-max.jpg');
			}
		} */
      /* Default background by https://www.pexels.com/@knownasovan */
      header {
        background:url('../../assets/cons.webp');}
	</style>
</head>

<body>
	<header id="up" class="bg-center bg-fixed bg-no-repeat bg-center bg-cover h-screen relative">
		<!-- Overlay Background + Center Control -->
		<div class="h-screen bg-opacity-50 bg-black flex items-center justify-center" style="background:rgba(0,0,0,0.5);">
			<div class="mx-2 text-center">
           <h2 class="text-gray-200 font-extrabold text-3xl xs:text-4xl md:text-5xl leading-tight">
         <span class="text-white"> This page is under Construction</span>
           </h2>
           <h5 class="text-gray-200 font-bold text-2xl xs:text-sm md:text-md p-3 leading-tight">
         <span class="text-white"> We are looking For it</span>
           </h5>
           <div class="inline-flex">
            <a href="register/"><button class="p-2 my-5 mx-2 bg-indigo-700 hover:bg-indigo-800 font-bold text-white rounded border-2 border-transparent hover:border-indigo-800 shadow-md transition duration-500 md:text-xl">Sign Up</button></a>
           <a href="login/"><button class="p-2 my-5 mx-2 bg-transparent border-2 bg-indigo-200 bg-opacity-75 hover:bg-opacity-100 border-indigo-700 rounded hover:border-indigo-800 font-bold text-indigo-800 shadow-md transition duration-500 md:text-lg text-white">Sign In</button>
           </div>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 text-white">
        <a href="https://dribbble.com/shots/6003020--Under-Construction" >Image Source</a>
    </div>
</header>
  </body>
</html>