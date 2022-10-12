function seterror(id, error){
    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;
}
  function validateForm()
  {
    
       var name =
       document.forms.RegForm.name.value;
   var email =
       document.forms.RegForm.email.value;
   var phone =
       document.forms.RegForm.phone.value;
       var address =
       document.forms.RegForm.address.value;
       var book =
       document.forms.RegForm.book.value;

       var regemail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;  
       var regphone=/^\d{10}$/;                                       
       var regname = /\d+$/g;     
       var regbook = "^[a-zA-Z]+( [a-zA-Z]+)*$"; 
        if (name == "" || regname.test(name)) {
          window.alert("Please enter your name properly.");
          name.focus();
          return false;
      }
       
      if (email == "" || !regemail.test(email)) {
          window.alert("Please enter a valid e-mail address.");
          email.focus();
          return false;
      }
      if (phone == "" || !regphone.test(phone)) {
          window.alert("Please enter valid phone number.");
          phone.focus();
          return false;
      }
       if (address == "") {
          window.alert("Please enter your address.");
          address.focus();
          return false;
      }
      if (book == "" || !regbook.test(book)) {
         window.alert("Please enter valid word.");
          book.focus();
          return false;
      }
    
      window.alert("sucessfully register.");
      return true;
  }