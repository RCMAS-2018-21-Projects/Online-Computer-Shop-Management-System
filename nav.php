<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Menu Bar</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
  </head>
  <body>
    <header>
      <div class="logo">
        LOGO
      </div>
  
      <nav>
        <ul>
          <li><a href="#">Home</a></li>
           <li><a href="#">About</a></li>
            <li class="sub-menu"><a href="#">product</a>
              <ul>
                <li><a href="#">link1</a></li>
                <li><a href="#">link2</a></li>
                <li><a href="#">link3</a></li>
                <li><a href="#">link4</a></li>
              </ul>
            </li>
             <li><a href="#">Team</a></li>
              <li><a href="#">Port</a></li>
               <li><a href="#">Contact</a></li>
        </ul>      
         </nav>  
         <div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
            </header>
            <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.menu-toggle').click(function(){
        $('nav').toggleClass('active')
      })
      $('ul li').click(function(){
        $(this).toggleClass('active')
      })
    })
  </script>
  </body>
</html>
