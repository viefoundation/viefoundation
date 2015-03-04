<html>
  <head>
    <link rel="stylesheet" href="giving-page-style.css" type="text/css" media="screen" />
    <meta name="viewport" content="width=device-width , initial-scale=1.0, maximum-scale=1.0">
  </head>
  <body class="form_page">
      <p class="topblurb">Your 1 year commitment is managed by VIE, we are able to adjust or cancel at anytime. Email us any of your needs - <a href="mailto:info@viefoundation.org"><strong>info@viefoundation.org</strong></a> - You are in good hands!</p>

      <form action="customer.php" method="POST" id="braintree-payment-form" class="form_style">
        <p>
          <label>Name</label>
          <input tabindex=1 type="text" name="first_name" id="first_name" value="Name" onfocus="if (this.value=='Name') this.value='';" placeholder="Name"></input>
        </p>
        <p>
          <label for="mailing_address">Mailing Address</label>
          <input tabindex=7 placeholder="Mailing Address" type="text" name="mailing_address" id="mailing_address" value="Mailing Address" onfocus="if (this.value=='Mailing Address') this.value='';"></input>
        </p>
        <p>
          <label for="email_address">Email Address</label>
          <input tabindex=2 placeholder="Email" type="text" name="email_address" id="email_address" value="Email" onfocus="if (this.value=='Email Address') this.value='';"></input>
        </p>
        <p>
          <label for="city">City</label>
          <input tabindex=8 placeholder="City" type="text" name="city" id="city" value="City" onfocus="if (this.value=='City') this.value='';"></input>
        </p>
        <p>
          <label for="state">State</label>
          <input tabindex=9 placeholder="State"type="text" name="state" id="state" value="State" onfocus="if (this.value=='State') this.value='';"></input>
        </p>
        <p>
          <label>Card Number</label>
          <input tabindex=3 placeholder="Credit Card Number" type="text" size="20" id="card_number" autocomplete="off" data-encrypted-name="number" value="Credit Card Number" onfocus="if (this.value=='Credit Card Number') this.value='';"/>
        </p>
        <p>
          <label for="postal_code">Postal Code</label>
          <input tabindex=10 placeholder="Zip" type="text" name="postal_code" id="postal_code" value="Zip" onfocus="if (this.value=='Zip') this.value='';"></input>
        </p>
        <p>
          <label id="exp">Expires</label>
          <input tabindex=4 placeholder="MM" type="text" size="2" id="expiration_month" data-encrypted-name="month" value="MM" onfocus="if (this.value=='00') this.value='';"/> / <input tabindex=5 placeholder="YYYY" type="text" size="4" data-encrypted-name="year"  id="expiration_year" value="YYYY" onfocus="if (this.value=='00') this.value='';"/>
        </p>
        <p>
          <label>CVV</label>
          <input tabindex=6 placeholder="CVV" type="text" size="4" id="cvv" autocomplete="off" data-encrypted-name="cvv" value="CVV" onfocus="if (this.value=='CCV') this.value='';"/>
        </p>
        <p id="amount">
          <select id="selector" name="selector">
            <option selected="selected">
              $5
            </option>
            <option>
              $10
            </option>
            <option>
              $20
            </option>
          </select>
          <span>(Tap to Adjust)</span> - A WEEK
        </p>
        <a id="one-time" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3ZGCWQKXS7ATQ">Click here for one time donation.</a>

        <input class="submit-button" type="submit" id="submit_button" value="Contribute"/>

        <p id="amount_text">Debited from account on the 1st of each month hereafter.</p>
        <p id="address_text">Address collected is for mailing Year End Statement.</p>
        <p id="contribute_text">VIE is a 501(c)(3) Non Profit Public Benefit Organization <br> All Contributions are tax deductible.</p>
    </form>
    



    <script type="text/javascript" src="https://js.braintreegateway.com/v1/braintree.js"></script>
    <script type="text/javascript">
      var braintree = Braintree.create("MIIBCgKCAQEAs/ylP/RAO0R0zAZOf2tY0pPSTvGlyAeRaHNANFHdHBYzCTZsvWeTJbsgdUnOoCGR7CkXDpndwEHXKYHFF/4SwcIEeIxj5g4vgTpbANOB1Qlf8xwjYj1Ec/3/YT6HIn4r/s9mGrlu7RF5RK69A+oRBLY9Too7o0veIBKKHwt79g6siNHArb0zHfsp4XV77+F5hE9APNyB1MaAr4mmr7KY/VU+5kqXiC2J6TjT8gn/hrK9HUrl6c5WIceWARLL6vk365Izh2v7rk9hrp1zI3gQhO6h7Wx8LkfCeKoMcewQ3ygsKQ7D3jtqge8S2Ks6jH1bes6Ws9n1hXw771k+ptojCQIDAQAB");
      braintree.onSubmitEncryptForm('braintree-payment-form');
    </script>
  </body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script> 
    var formDefaulter=function(){
    //Class to hold each form element
    var FormElement=function(element){
        var that=this;
        this.element=element;

        var initialVal=this.element.val();
        var isEdited=false;

        this.element.focus(function(){clearBox()});
        this.element.blur(function(){fillBox()});

        var clearBox=function(){
            if(!isEdited){
                that.element.val("");
                isEdited=true;
            }
        }
        var fillBox=function(){
            if(that.element.val()==""){
                that.element.val(initialVal);
                isEdited=false;
            }
        }
    }

    var add=function(elementId){
        new FormElement($('#'+elementId));
    }

    return{
        add:add
    }
    }();

    $(function(){
    formDefaulter.add('first_name');
    formDefaulter.add('email_address');
    formDefaulter.add('mailing_address');
    formDefaulter.add('city');
    formDefaulter.add('state');
    formDefaulter.add('postal_code');
    formDefaulter.add('card_number');
    formDefaulter.add('cvv');
    formDefaulter.add('expiration_month');
    formDefaulter.add('expiration_year');
    });

  </script>
</html>



