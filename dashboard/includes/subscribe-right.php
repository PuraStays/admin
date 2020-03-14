<form method="post" action="thank-you.php">
<h4 class="title">Subscribe Us</h4>
<h5 class="title">For latest update of AME CET 2018</h5>
<br />
  <div class="form-group">
    <input placeholder="Name" name="Name" id="Name" required class="form-control form-item" type="text" required="required">
  </div>
  <div class="form-group">
    <input placeholder="Mobile" name="Mobile" id="Mobile"  maxlength="13" onkeypress="return isNumberKey(event)" required class="form-control form-item" type="text" required="required">
  </div>
  <div class="form-group">
    <input placeholder="Email" type="email" name="Email" id="Email" required class="form-control form-item" type="text" required="required">
  </div>
  <div class="form-group">
    <input placeholder="City, State" name="City" id="City" required class="form-control form-item" type="text" required="required">
  </div>
  
  <input type="hidden" name="curr_url" value="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>">
  <input type="hidden" name="Query_Type" value="Subscribe Me" title="Subscribe Me" >
  <input type="hidden" name="referrerUrl" id="referrerurl" value="<?= $referrerurl; ?>"/>
  
  <button class="btn btn-1" type="submit"  onclick="javascript:return val();">Subscribe Me</button>
</form>

<script language="javascript" type="text/javascript">

        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }

        function val() {
            //date validation
            if (document.getElementById("Name").value == "") {
                alert("Please enter Name")

                document.getElementById("Name").focus();
                return false;
            }
            
            if (document.getElementById("Mobile").value == "") {
                alert("Please Enter Mobile number")

                document.getElementById("Mobile").focus();
                return false;
            }
                        if (document.getElementById("Email").value == "") {
                alert("Please enter your Email")

                document.getElementById("Email").focus();
                return false;
            }
            
            if (document.getElementById("City").value == "") {
                alert("Please enter City, State")

                document.getElementById("City").focus();
                return false;
            }

            if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("txtEmail").value))) {
                alert("Invalid Email-id! Please re-enter.")

                document.getElementById("Email").focus();
                return false;
            }
            
            if (document.getElementById("City").value == "") {
                alert("Please enter City, State")

                document.getElementById("City").focus();
                return false;
            }

            if (document.getElementById("Message").value == "") {
                alert("Please enter Message")

                document.getElementById("Message").focus();
                return false;
            }


            return true;

        }
</script>