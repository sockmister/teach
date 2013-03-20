alert("hellowrld");

       if (!validateEmail(emailVar)){
         alert("lol");
                    if($("#email-error").length==0) {
                     
           $('#email').wrap('<div class="control-group error" id="email-error"></div>');
          $("#email").addClass("inputError").after('<span class="help-inline">email not valid</span>');
          
        }
        hasError = true;
        }
