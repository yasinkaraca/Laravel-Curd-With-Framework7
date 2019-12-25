@extends('app')

@section('content')
    <div class = "statusbar-overlay"></div>  
    <div class = "panel-overlay"></div>  
        
    <div class = "panel panel-right panel-reveal">  
        <div class = "content-block">  
            Paragraph  
        </div>  
    </div>  
    
    <div class = "views">  
        <div class = "view view-main">  
            <div class = "navbar">  
                <div class = "navbar-inner">  
                    <div class = "center sliding">Sliding</div>  
                    <div class = "right">  
                        <a href = "#" class = "link icon-only open-panel">  
                            <i class = "icon icon-bars"></i>  
                        </a>  
                    </div>  
                </div>  
            </div>  
            
            <div class = "pages navbar-through toolbar-through">  
                <div data-page = "index" class = "page">  
                    <div class = "page-content">  
                        <p>Paragraph goes here...</p>  
                        <div class = "list-block">  
                            <ul>  
                                <li>  
                                    <a href = "#" class = "">  
                                        <div class = "item-content">  
                                            <div class = "item-inner">  
                                                <div class = "item-title">About</div>  
                                            </div>  
                                        </div>  
                                    </a>  
                                </li>  
                            </ul>  
                        </div>  
                    </div>  
                </div>  
            </div>  
            
            <div class = "toolbar">  
                <div class = "toolbar-inner">  
                    <a href = "#" class = "link">ichi</a>  
                    <a href = "#" class = "link">ni</a>  
                </div>  
            </div>  
        </div>  
    </div>  
        
        <script type = "text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/framework7/1.4.2/js/framework7.min.js"></script>  
        
        <script>  

         var myApp = new Framework7();  
  
         var $$ = Dom7;  
  
         var mainView = myApp.addView('.view-main', {  
              
            dynamicNavbar: true  
         });  
   
         $$(document).on('pageInit', function (e) {  
           
            var page = e.detail.page;  
  
            if (page.name === 'about')
               myApp.alert('Here its your About page');  
         });
      </script>  
@endsection