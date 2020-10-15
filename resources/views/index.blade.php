<html>
    <head>
        <meta charset="UTF-8" />
        <meta
          name="Content-Security-Policy"
          content="default-src: http: https: 'self'"
        />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Lets Find GIF!</title>
       
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        
        <style>img { width: 70%; max-width: 70%; }</style>
    </head>
    <body>
        <main>
        <div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

                    <span class="login100-form-title p-b-34 p-t-27">
						Search Your Gif
					</span>

                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
                        <input class="input100" id="search" type="search"  placeholder="Search"/>
                    </div>

                    <div class="container-login100-form-btn">    
                        <button id="btnSearch" class="login100-form-btn">Go</button>
                    </div>
                </form>
                <br>
                <center><div class="out"></div></center>
            </div>
		</div>
	    </div>    
        </main>
        <script>
            let APIKEY = "9INBrFLWYLwlTMbDI2wCPIXxVAYX2lvn"
            
            document.addEventListener("DOMContentLoaded", init);
            function init() {
                document.getElementById("btnSearch").addEventListener("click", ev => {
                    ev.preventDefault(); //to stop the page reload
                    let url = `https://api.giphy.com/v1/gifs/search?api_key=${APIKEY}&limit=1&q=`;
                    let str = document.getElementById("search").value.trim();
                    url = url.concat(str);
                    console.log(url);
                    fetch(url)
                        .then(response => response.json())
                        .then(content => {
                        //  data, pagination, meta
                        console.log(content.data);
                        console.log("META", content.meta);
                        let fig = document.createElement("figure");
                        let img = document.createElement("img");
                        let fc = document.createElement("figcaption");
                        img.src = content.data[0].images.downsized.url;
                        img.alt = content.data[0].title;
                        fc.textContent = content.data[0].title;
                        fig.appendChild(img);
                        fig.appendChild(fc);
                        let out = document.querySelector(".out");
                        out.insertAdjacentElement("afterbegin", fig);
                        document.querySelector("#search").value = "";
                        })
                        .catch(err => {
                        console.error(err);
                    });
                });
            }
        </script>
    	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    	<script src="vendor/animsition/js/animsition.min.js"></script>
    	<script src="vendor/bootstrap/js/popper.js"></script>
	    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    	<script src="vendor/select2/select2.min.js"></script>
    	<script src="vendor/daterangepicker/moment.min.js"></script>
	    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    	<script src="vendor/countdowntime/countdowntime.js"></script>
    	<script src="js/main.js"></script>
    </body>
</html>