 <!-- Bootstrap core JavaScript-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js" integrity="sha512-mULnawDVcCnsk9a4aG1QLZZ6rcce/jSzEGqUkeOLy0b6q0+T6syHrxlsAGH7ZVoqC93Pd0lBqd6WguPWih7VHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 <!-- datatable  -->
 <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js" integrity="sha256-vjFnliBY8DzX9jsgU/z1/mOuQxk7erhiP0Iw35fVhTU=" crossorigin="anonymous"></script>



 <!-- Core plugin JavaScript-->
 <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

 <!-- Custom scripts for all pages-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.js" integrity="sha512-M82XdXhPLLSki+Ld1MsafNzOgHQB3txZr8+SQlGXSwn6veeqtYhPLbQeAfk9Y/Q9/gXcfa1jWT4YYUeoei6Uow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 <script>
     $('.select2').select2({
         theme: 'bootstrap4'
     });

     const inputNumber = document.querySelectorAll('input[type="number"]')
     inputNumber.forEach(element => {
         element.addEventListener('keydown', (e) => {
             // Allow: backspace, delete, tab, escape, enter and .
             if ([46, 8, 9, 27, 13, 190].includes(e.keyCode) ||
                 // Allow: Ctrl+A
                 (e.keyCode == 65 && e.ctrlKey === true) ||
                 // Allow: home, end, left, right
                 (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
             }
             // Ensure that it is a number and stop the keypress
             if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode >
                     105)) {
                 e.preventDefault();
             }
         });
     });
 </script>