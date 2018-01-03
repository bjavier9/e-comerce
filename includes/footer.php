<footer class="text-center" id="footer">
  &copy; Copyright 2017-2018 zKIMOXZ
</footer>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js><\/script>')</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script>
jQuery(window).scroll(function(){
 var vscroll=jQuery(this).scrollTop();
 jQuery('#logotext').css({
   "transform":"translate(0px,"+vscroll/2+"px)"
 });
});
function modaldetails(id){
var data ={"id":id};
  jQuery.ajax({
    url :'/practica/includes/modaldetails.php',
    method:"post",
    data:data,
    success:function(data){
      jQuery('body').prepend(data);
      jQuery('#details-modal').modal('toggle');
    },
    error:function(){
      alert("Something went wrong!");
    }
  });
}


</script>
  </body>
</html>
