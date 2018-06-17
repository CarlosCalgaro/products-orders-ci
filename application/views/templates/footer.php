     <!-- FECHANDO CONTAINER -->
     </div>
      <footer class="page-footer">
         <div class="container">
            <div class="row">
               <div class="col l6 s12">
                  <h5 class="white-text">CRUD Simples</h5>
                     <p class="grey-text text-lighten-4">
                        Feito utilizando o code igniter e materialize :)
                     </p>
                     </div>
                     <div class="col l4 offset-l2 s12">
                     <h5 class="white-text">Links</h5>
                     <ul>
                              <li>
                                 <a class="grey-text text-lighten-3" href="<?php echo site_url('products/index'); ?>">
                                 Produtos
                                 </a>
                              </li>
                              <li>
                                    <a class="grey-text text-lighten-3" href="<?php echo site_url('orders/index'); ?>">
                                          Ordens
                                    </a>
                              </li>
                  
                     </ul>
                     </div>
                     </div>
                     </div>
                     <div class="footer-copyright">
                     <div class="container">
                     © Carlos Calgaro
               </div>
         </div>
      </footer>
      <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
      <script>
            $(document).ready(function(){
                  $('.datepicker').datepicker({
                        format:"yyyy-mm-dd"
                  });
            });
      </script>
   </body>
</html>