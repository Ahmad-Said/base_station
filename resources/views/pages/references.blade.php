﻿﻿
      <style>
         body { font-family:helvetica,arial,sans-serif; font-size:13px; }
         h2 { color:hsl(0, 0%, 40%); background:#eee; margin:20px 10px 0; padding:10px; border-radius:2px; font-weight:normal; font-size:17px; }
         h2 { color:hsl(0,0%,33%); margin-left:25px; margin-top:20px; font-weight:normal; font-size:15px; }
         ul { list-style-type:none; }
         li { white-space:nowrap; padding:3px 0; }
         a { text-decoration:none; vertical-align:middle; color:black; }
         a:hover { text-decoration:underline; }
         .sb-favicon { height:16px; width:16px; margin-right:12px; vertical-align:middle; }
      </style>



         @extends('layouts.style')
         @section('bodysection')
         <div class="text-center">
               <h2 style="float:center;" > Click on Title to expand</h2>
            <a href={{ URL::previous() }}>
               
            <button style="float: right;" class="bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg">
                Go Back
            </button>
        </a>
         </div>
         <div class='container'>
        
      <ul class="list-group">
            <button class="list-group-item" data-toggle="collapse" data-target="#demo1">
                     <li class="list-group-item">
                                                                                             <h2>Youtube Laravel series</h2>
                                                                           </li></button>
                  <div id="demo1" class="collapse">
                      <a href="https://www.youtube.com/playlist?list=PLillGF-RfqbYhQsN5WMXy6VsDMKGadrJ-" target="_blank"><li class="list-group-item"><img class="sb-favicon" src="https://s.ytimg.com/yts/img/favicon_32-vflOogEID.png">Laravel&nbsp;From&nbsp;Scratch&nbsp;-&nbsp;YouTube</li></a>
            
            
            <?php 
                  $filename = "zindex+ General_notes.txt";
                          $path = storage_path($filename);
                  ?>
            
            <a href="{{"showfile/".$filename}}" target="_blank">
            <li class="list-group-item">
                  
              <img class="sb-favicon" src="https://sessionbuddy.com/images/retina/default.png">
               
                       
                           Index + Generale notes</li>
                        </a>
               

                        <?php 
                     $filename = "Quick Guide About Transfering a project.txt";
                             $path = storage_path($filename);
                     ?>

                     <a href="{{"showfile/".$filename}}" target="_blank">
               <li class="list-group-item">
                     
                 <img class="sb-favicon" src="https://sessionbuddy.com/images/retina/default.png">
                  
                           
                              Quick Guide About Transfering a project</li>
                           </a>
                  </div>

         </ul>
         </div>
         <br>
         <div class='container'>
              
                       
         <ul class="list-group">
               <button class="list-group-item" data-toggle="collapse" data-target="#demo2">
                     <li class="list-group-item">
                                                                                                <h2>Our Project</h2>
                                                                           </li></button>
                  <div id="demo2" class="collapse">   
                  


                     <?php 
                     $filename = "I3302.pdf";
                             $path = storage_path($filename);
                     ?>  
                     <a href="{{"showfile/".$filename}}" target="_blank">
                        <li class="list-group-item">
                              
                          <img class="sb-favicon" src="http://cwidaho.cc/sites/all/themes/omega_cwi/images/icons/adobe-pdf-icon.png">
                           
                                   
                                       Project Assigement</li></a>




                  <?php 
                     $filename = "our_code_sequence.txt";
                             $path = storage_path($filename);
                     ?>

                     <a href="{{"showfile/".$filename}}" target="_blank">
               <li class="list-group-item">
                     
                 <img class="sb-favicon" src="https://sessionbuddy.com/images/retina/default.png">
                  
                           
                              Our Code Sequences</li></a>
                  
                  
                        <?php 
                        $filename = "first build notes.txt";
                                $path = storage_path($filename);
                        ?>
                        <a href="{{"showfile/".$filename}}" target="_blank">
                  <li class="list-group-item">
                       
                    <img class="sb-favicon" src="https://sessionbuddy.com/images/retina/default.png">
                     
                              
                                 First build notes</li></a>
                     

                               <?php 
                           $filename = "second build notes.txt";
                                   $path = storage_path($filename);
                           ?>  
 <a href="{{"showfile/".$filename}}" target="_blank">
                     <li class="list-group-item">
                           
                       <img class="sb-favicon" src="https://sessionbuddy.com/images/retina/default.png">
                        
                                
                                    Second Build note</li></a>

                                 
          
                        
                        
         </ul>
         
         </div>
      </div>
      <br>
      <div class='container'>
         <ul class="list-group">
               <button class="list-group-item" data-toggle="collapse" data-target="#demo3">
                     <li class="list-group-item">
                           <h2>pChart</h2>      
                                                                           </li></button>
                  <div id="demo3" class="collapse">   
                  
             
             
                                           
             
         <a href="https://github.com/bozhinov/pChart2.0-for-PHP7" target="_blank">
               <li class="list-group-item"><img class="sb-favicon" src="https://github.githubassets.com/favicon.ico">
                  bozhinov/pChart2.0-for-PHP7:&nbsp;Fork&nbsp;of&nbsp;pChart&nbsp;compatible&nbsp;with&nbsp;PHP&nbsp;7</li></a>
               <a href="https://github.com/bozhinov/pChart2.0-for-PHP7/issues/25" target="_blank">
                  <li class="list-group-item"><img class="sb-favicon" src="https://github.githubassets.com/favicon.ico">
                  Laravel&nbsp;include&nbsp;·&nbsp;Issue&nbsp;#25&nbsp;·&nbsp;bozhinov/pChart2.0-for-PHP7</li></a>
               <a href="http://wiki.pchart.net/" target="_blank">
                  <li class="list-group-item"><img class="sb-favicon" src="http://wiki.pchart.net/favicon.ico">          
                  pChart&nbsp;2.0&nbsp;online&nbsp;documentation</li></a>
           
               
         </ul>
      </div>
      </div>
      <br>
      <div class='container'>
            <ul class="list-group">
            <button class="list-group-item" data-toggle="collapse" data-target="#demo"><h2>jtree check-Boxes trees </h2></button>

               <div id="demo" class="collapse">
               
               
               <li class="list-group-item">Install using: composer require vakata/jstree <br> Check views/pages/test.blade.php for simple use</li>
               <a href="https://www.jstree.com/" target="_blank">
               <li class="list-group-item"><img class="sb-favicon" src="https://static.jstree.com/3.3.7/assets/favicon.ico">
                  jsTree</li></a>
               <a href="https://www.jstree.com/docs/html/" target="_blank"><li class="list-group-item"><img class="sb-favicon" src="https://static.jstree.com/3.3.7/assets/favicon.ico">jsTree parameter within html</li></a>
               <a href="https://github.com/vakata/jstree#populating-a-tree-using-html" target="_blank">
               <li class="list-group-item"><img class="sb-favicon" src="https://github.githubassets.com/favicon.ico">
                  jstree usage</li></a>
            </div>   
               </ul>
               
         </div>
         <br>
      <div class='container'>
     
      <ul class="list-group">
            <button class="list-group-item" data-toggle="collapse" data-target="#demo6">
                  <li class="list-group-item">
                                                                                     <h2>My visual code Extention </h2>   
                                                                        </li></button>
               <div id="demo6" class="collapse">   
                   
     
                     <a href="https://marketplace.visualstudio.com/items?itemName=chunsen.bracket-select" target="_blank">
                        <li class="list-group-item"><img class="sb-favicon" src="https://marketplace.visualstudio.com/favicon.ico">
                        Bracket&nbsp;Select&nbsp;-&nbsp;Visual&nbsp;Studio&nbsp;Marketplace</li></a>
                     <a href="https://marketplace.visualstudio.com/items?itemName=mikestead.dotenv" target="_blank"><li class="list-group-item"><img class="sb-favicon" src="https://marketplace.visualstudio.com/favicon.ico">
                        DotENV&nbsp;-&nbsp;Visual&nbsp;Studio&nbsp;Marketplace</li></a>
                        <a href="https://marketplace.visualstudio.com/items?itemName=onecentlin.laravel5-snippets" target="_blank">
                     <li class="list-group-item"><img class="sb-favicon" src="https://marketplace.visualstudio.com/favicon.ico">
                        Laravel&nbsp;5&nbsp;Snippets&nbsp;-&nbsp;Visual&nbsp;Studio&nbsp;Marketplace</li></a>
                     <a href="https://marketplace.visualstudio.com/items?itemName=onecentlin.laravel-blade" target="_blank"><li class="list-group-item"><img class="sb-favicon" src="https://marketplace.visualstudio.com/favicon.ico">
                        Laravel&nbsp;Blade&nbsp;Snippets&nbsp;-&nbsp;Visual&nbsp;Studio&nbsp;Marketplace</li></a>
                     <a href="https://marketplace.visualstudio.com/items?itemName=codingyu.laravel-goto-view" target="_blank"><li class="list-group-item"><img class="sb-favicon" src="https://marketplace.visualstudio.com/favicon.ico">
                        Laravel&nbsp;goto&nbsp;view&nbsp;-&nbsp;Visual&nbsp;Studio&nbsp;Marketplace</li></a>
                        <a href="https://marketplace.visualstudio.com/items?itemName=stef-k.laravel-goto-controller" target="_blank">
                        <li class="list-group-item"><img class="sb-favicon" src="https://marketplace.visualstudio.com/favicon.ico">
                        laravel-goto-controller&nbsp;-&nbsp;Visual&nbsp;Studio&nbsp;Marketplace</li></a>
                        <a href="https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-debug" target="_blank">
                        <li class="list-group-item"><img class="sb-favicon" src="https://marketplace.visualstudio.com/favicon.ico">
                        PHP&nbsp;Debug&nbsp;-&nbsp;Visual&nbsp;Studio&nbsp;Marketplace</li></a>
                        <a href="https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-intellisense" target="_blank">
                        <li class="list-group-item"><img class="sb-favicon" src="https://marketplace.visualstudio.com/favicon.ico">
                        PHP&nbsp;IntelliSense&nbsp;-&nbsp;Visual&nbsp;Studio&nbsp;Marketplace</li></a>
                        <a href="https://marketplace.visualstudio.com/items?itemName=dbankier.vscode-quick-select" target="_blank">
                        <li class="list-group-item"><img class="sb-favicon" src="https://marketplace.visualstudio.com/favicon.ico">
                        Quick&nbsp;and&nbsp;Simple&nbsp;Text&nbsp;Selection&nbsp;-&nbsp;Visual&nbsp;Studio&nbsp;Marketplace</li></a>
                        <a href="https://marketplace.visualstudio.com/items?itemName=mlewand.select-part-of-word" target="_blank">
                        <li class="list-group-item"><img class="sb-favicon" src="https://marketplace.visualstudio.com/favicon.ico">
                       Select&nbsp;part&nbsp;of&nbsp;word&nbsp;-&nbsp;Visual&nbsp;Studio&nbsp;Marketplace</li></a>
                       <a href="https://marketplace.visualstudio.com/items?itemName=albert.TabOut" target="_blank">
                       <li class="list-group-item"><img class="sb-favicon" src="https://marketplace.visualstudio.com/favicon.ico">
                       TabOut&nbsp;-&nbsp;Visual&nbsp;Studio&nbsp;Marketplace</li></a>
      </ul>
      </div>
   </div>
   <br>


   <div class='container'>
     
         <ul class="list-group">
               <button class="list-group-item" data-toggle="collapse" data-target="#demo5">
                     <li class="list-group-item">
                                                                                      <h2>Misc </h2>     
                                                                           </li></button>
                  <div id="demo5" class="collapse">   
         
                                
      
         

         <li class="list-group-item"><img class="sb-favicon" src="https://getbootstrap.com/favicon.ico"><a href="https://getbootstrap.com/docs/4.0/content/tables/" target="_blank">Tables&nbsp;·&nbsp;Bootstrap</a></li>
         <li class="list-group-item"><img class="sb-favicon" src="https://cdn.sstatic.net/Sites/stackoverflow/img/favicon.ico?v=4f32ecc8f43d"><a href="https://stackoverflow.com/questions/30287896/rollback-one-specific-migration-in-laravel" target="_blank">Rollback&nbsp;one&nbsp;specific&nbsp;migration&nbsp;in&nbsp;Laravel&nbsp;-&nbsp;Stack&nbsp;Overflow</a></li>
         <li class="list-group-item"><img class="sb-favicon" src="https://www.formget.com/wp-content/themes/formget/assets/imgs/favicon.png"><a href="https://www.formget.com/multi-page-form-php/" target="_blank">PHP&nbsp;Multi&nbsp;Page&nbsp;Form&nbsp;|&nbsp;FormGet</a></li>
         <li class="list-group-item"><img class="sb-favicon" src="https://cdn.sstatic.net/Sites/stackoverflow/img/favicon.ico?v=4f32ecc8f43d"><a href="https://stackoverflow.com/questions/43226145/laravel-5-4-disable-auto-login-after-registration/43226585" target="_blank">php&nbsp;-&nbsp;Laravel&nbsp;5.4&nbsp;-&nbsp;Disable&nbsp;auto&nbsp;login&nbsp;after&nbsp;registration&nbsp;-&nbsp;Stack&nbsp;Overflow</a></li>
         <li class="list-group-item"><img class="sb-favicon" src="https://cdn.sstatic.net/Sites/stackoverflow/img/favicon.ico?v=4f32ecc8f43d"><a href="https://stackoverflow.com/questions/7826358/how-to-filter-an-array-of-object" target="_blank">php&nbsp;-&nbsp;How&nbsp;to&nbsp;filter&nbsp;an&nbsp;array&nbsp;of&nbsp;object?&nbsp;-&nbsp;Stack&nbsp;Overflow</a></li>
         <li class="list-group-item"><img class="sb-favicon" src="https://cdn.sstatic.net/Sites/stackoverflow/img/favicon.ico?v=4f32ecc8f43d"><a href="https://stackoverflow.com/questions/44992546/add-column-to-laravel-user-model-and-keep-the-auth-register-behavior" target="_blank">php&nbsp;-&nbsp;Add&nbsp;column&nbsp;to&nbsp;laravel&nbsp;user&nbsp;model&nbsp;and&nbsp;keep&nbsp;the&nbsp;auth&nbsp;register&nbsp;behavior&nbsp;-&nbsp;Stack&nbsp;Overflow</a></li>
         <li class="list-group-item"><img class="sb-favicon" src="https://cdn.sstatic.net/Sites/stackoverflow/img/favicon.ico?v=4f32ecc8f43d"><a href="https://stackoverflow.com/questions/37662955/laravel-migration-default-value" target="_blank">Laravel&nbsp;migration&nbsp;default&nbsp;value&nbsp;-&nbsp;Stack&nbsp;Overflow</a></li>
         <li class="list-group-item"><img class="sb-favicon" src="https://cdn.sstatic.net/Sites/stackoverflow/img/favicon.ico?v=4f32ecc8f43d"><a href="https://stackoverflow.com/questions/32997432/laravel-5-where-clause-with-multiple-values" target="_blank">laravel&nbsp;5,&nbsp;where&nbsp;clause&nbsp;with&nbsp;multiple&nbsp;values&nbsp;-&nbsp;Stack&nbsp;Overflow</a></li>
         <li class="list-group-item"><img class="sb-favicon" src="https://cdn.sstatic.net/Sites/stackoverflow/img/favicon.ico?v=4f32ecc8f43d"><a href="https://stackoverflow.com/questions/25960729/change-form-action-on-select-option" target="_blank">javascript&nbsp;-&nbsp;Change&nbsp;form&nbsp;action&nbsp;on&nbsp;select&nbsp;option&nbsp;-&nbsp;Stack&nbsp;Overflow</a></li>
         <li class="list-group-item"><img class="sb-favicon" src="https://www.google.com/favicon.ico"><a href="https://www.google.com/search?q=id+and+name+attribute+in+html&oq=id+and+name+attru&aqs=chrome.1.69i57j0l4.4695j0j7&sourceid=chrome&ie=UTF-8" target="_blank">id&nbsp;and&nbsp;name&nbsp;attribute&nbsp;in&nbsp;html&nbsp;-&nbsp;Google&nbsp;Search</a></li>
         <li class="list-group-item"><img class="sb-favicon" src="https://cdn.sstatic.net/Sites/stackoverflow/img/favicon.ico?v=4f32ecc8f43d"><a href="https://stackoverflow.com/questions/39114249/call-to-undefined-method-illuminate-database-query-builderlists-when-seeding" target="_blank">php&nbsp;-&nbsp;Call&nbsp;to&nbsp;undefined&nbsp;method&nbsp;Illuminate\Database\Query\Builder::lists()&nbsp;when&nbsp;seeding&nbsp;after&nbsp;updating&nbsp;to&nbsp;Laravel&nbsp;5.3&nbsp;-&nbsp;Stack&nbsp;Overflow</a></li>
         <li class="list-group-item"><img class="sb-favicon" src="https://laravel-news.com/favicon-32x32.png"><a href="https://laravel-news.com/laravel-5-4-key-too-long-error" target="_blank">Laravel&nbsp;5.4:&nbsp;Specified&nbsp;key&nbsp;was&nbsp;too&nbsp;long&nbsp;error&nbsp;-&nbsp;Laravel&nbsp;News</a></li>
         <li class="list-group-item"><img class="sb-favicon" src="https://laravel.com/favicon.ico"><a href="https://laravel.com/docs/5.7/eloquent-relationships#many-to-many" target="_blank">Eloquent:&nbsp;Relationships&nbsp;-&nbsp;Laravel&nbsp;-&nbsp;The&nbsp;PHP&nbsp;Framework&nbsp;For&nbsp;Web&nbsp;Artisans</a></li>
         <li class="list-group-item"><img class="sb-favicon" src="https://cdn.sstatic.net/Sites/stackoverflow/img/favicon.ico?v=4f32ecc8f43d"><a href="https://stackoverflow.com/questions/14174070/automatically-deleting-related-rows-in-laravel-eloquent-orm" target="_blank">php&nbsp;-&nbsp;Automatically&nbsp;deleting&nbsp;related&nbsp;rows&nbsp;in&nbsp;Laravel&nbsp;(Eloquent&nbsp;ORM)&nbsp;-&nbsp;Stack&nbsp;Overflow</a></li>
         
         <li class="list-group-item"><img class="sb-favicon" src="https://www.w3schools.com/favicon.ico"><a href="https://www.w3schools.com/bootstrap/bootstrap_grid_examples.asp" target="_blank">Bootstrap&nbsp;Grid&nbsp;Examples</a></li>
         <li class="list-group-item"><img class="sb-favicon" src="https://cdn.sstatic.net/Sites/stackoverflow/img/favicon.ico?v=4f32ecc8f43d"><a href="https://stackoverflow.com/questions/38230814/need-to-define-foreign-key-when-migrate-in-laravel-5-2" target="_blank">eloquent&nbsp;-&nbsp;Need&nbsp;to&nbsp;define&nbsp;foreign&nbsp;key&nbsp;when&nbsp;migrate&nbsp;in&nbsp;laravel&nbsp;5.2?&nbsp;-&nbsp;Stack&nbsp;Overflow</a></li>


</ul>
   </div>
</div>
<br>
   
   </div>
      @endsection