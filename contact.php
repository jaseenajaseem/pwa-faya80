
<!doctype html>
<html ⚡ lang="en">
  <head>
    <title>Faya:80</title>
    <meta charset="utf-8" />
    <meta name="theme-color" content="#87c042"/>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <meta name="Description" content="FAYA:80 is a monthly technology hangout for technology enthusiasts by technology enthusiasts to break the ice, analyse and evaluate emerging trends in technology. Held on the first Wednesday of the month at the Floor of Madness (FAYA, Technopark, Thiruvananthapuram), the series stands for Free Knowledge Sharing and aims to provide an open platform for entrepreneurs, developers and technology professionals to keep at par with the latest tools and technologies">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="canonical" href="/index.html">
    <link rel="shortcut icon" href="../amp_favicon.ico">
    <link rel="manifest" href="/manifest.json">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="styles/common.css">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-install-serviceworker" src="https://cdn.ampproject.org/v0/amp-install-serviceworker-0.1.js"></script>
    <script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"> </script>
    <script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js?ver=1.0.0'></script>
    <script  type="text/javascript" src="js/list.js"> </script>
  </head>
  <body>
    <header>
        <a href="/index.html">
            <amp-img src="logo.png" class="logo"  width="200" height="46"></amp-img>
        </a>
        <ul class="main-nav">
          <li>
            <a href="speakers.html">Speakers</a>
          </li>
          <li>
            <a href="contact.php">Contact</a>
          </li>
        </ul>
    </header>
    <div class="wrapper">
      <article>
        <div class="banner">
          <div class="banner-overlay"></div>
          <div class="banner-content">
            <h1>Knowledge Shared is <span>Power Multiplied</span></h1>
            <p>Breaking Echo Chambers through Free Knowledge Sharing</p>
          </div>
        </div>
      </article>
    </div>
    <div class="wrapper contact">
      <div class="container">
          <div class="content">
              <div class="contact-title">
                  <h2> Contact US</h2>
              </div>
              <div class="form-area" id="contact_form">
                  <div id="contact_results"></div>
                  <div id="contact_body">
                      <div class="form-group">
                          <input type="text" name="name" id="name" placeholder="Full Name" required="true" class="form-control"/>
                      </div>
                  <div class="form-group">
                      <input type="email" name="email" required="true" placeholder="Email" class="form-control"/>
                  </div>
                  <div class="form-group">
                      <input type="text" name="subject" placeholder="Subject" required="true" class="form-control"/>
                  </div>
                  <div class="form-group">
                      <textarea name="message" id="message" class="form-control textarea" required="true" placeholder="Message" maxlength="100" rows="5"></textarea>
                  </div>
                  <input type="submit" id="submit_btn" value="Submit" class="btn btn-primary form-btn" />
                  </div>
              </div>
          </div>
      </div> 
    </div>

    <footer>
      <div class="container">
        <div class="footer-widget">
          <h5>Who should attend? </h5>
          <ul>
            <li>Directors, CEOs & CTOs</li>
            <li>Entrepreneurs</li>
            <li>Data Scientists</li>
            <li>Machine Learning Scientists</li>
            <li>Developers</li>
            <li>Big Data Experts</li>
            <li>All genres of Technology Enthusiasts</li>
          </ul>
        </div>
        <div class="footer-widget">
          <h5>Contact Us </h5>
          <span>FAYA Corporation</span><br>
          <span>Email on <a href="mailto:info@fayausa.com">info@fayausa.com</a></span><br>
          <span>call - 866-686-5988</span>
        </div>
        <p class="copy-right-footer">Copyright ©
            <a href="http://fayausa.com">FAYA Corporation</a> 2017. 2330 S. Archibald Ave. Ontario, CA 91761
        </p>
      </div>
    </footer>
    
    <amp-install-serviceworker 
        src="/service-worker.js" 
        layout="nodisplay"
        data-iframe-src="/install-service-worker.html">
    </amp-install-serviceworker> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>

<script type="text/javascript">
$(document).ready(function() {
    $("#submit_btn").click(function() { 
       
        var proceed = true;
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields       
        $("#contact_form input[required=true], #contact_form textarea[required=true]").each(function(){
            $(this).css('border-color',''); 
            if(!$.trim($(this).val())){ //if this field is empty 
                $(this).css('border','1px solid red',); //change border color to red   
                proceed = false; //set do not proceed flag
            }
            //check invalid email
            var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
            if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                $(this).css('border-color','red'); //change border color to red   
                proceed = false; //set do not proceed flag              
            }   
        });
       
        if(proceed) //everything looks good! proceed...
        {
            //get input field values data to be sent to server
            post_data = {
                'user_name'     : $('input[name=name]').val(), 
                'user_email'    : $('input[name=email]').val(), 
                'msg'           : $('textarea[name=message]').val(),
                'subject'       : $('input[name=subject]').val()
            };
            
            //Ajax post data to server
            $.post('contact_me.php', post_data, function(response){  
                if(response.type == 'error'){ //load json data from server and output message     
                    output = '<div class="error">'+response.text+'</div>';
                }else{
                    output = '<div class="success">'+response.text+'</div>';
                    //reset values in all input fields
                    $("#contact_form  input[required=true], #contact_form textarea[required=true]").val(''); 
                    //$("#contact_form #contact_body").slideUp(); //hide form after success
                }
                $("#contact_form #contact_results").hide().html(output).slideDown();
            }, 'json');
        }
    });
    
    //reset previously set border colors and hide all message on .keyup()
    $("#contact_form  input[required=true], #contact_form textarea[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
        $("#result").slideUp();
    });
});
(jQuery);


</script> 
  </body>
</html>
