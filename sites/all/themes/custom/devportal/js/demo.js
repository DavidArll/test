(function($){
    $(document).ready(function(){
        $('#getHelp').click(function(e){
            e.preventDefault();
            var pathName = window.location.pathname;
      
            if (pathName == '/'){
                introJs().setOptions({'showStepNumbers': false, 'doneLabel': 'Exit', 'overlayOpacity' : '0.2', 'scrollToElement': true}).addSteps([
                  {
                    element: document.querySelectorAll('.primary-nav li')[0],
                    intro: "In the APIs menu you will find documentation of all of the APIs available to use in your Apps as well as its methods.",
                    position: 'bottom'
                  },
                  {
                    element: document.querySelectorAll('.primary-nav li')[1],
                    intro: "In the My Apps menu you can generate new API keys to use in a new app.",
                    position: 'bottom'
                  },
                  {
                    element: document.querySelectorAll('.primary-nav li')[2],
                    intro: "In the Resources menu you will find further documentation, application examples, etc., available to download.",
                    position: 'bottom'
                  },
                  {
                    element: document.querySelectorAll('.primary-nav li')[3],
                    intro: "In the Blog menu you will find articles about various topics.",
                    position: 'bottom'
                  },
                  {
                    element: document.querySelectorAll('.primary-nav li')[4],
                    intro: "In the FAQ menu you will find the most common questions and you can report issues to us.",
                    position: 'bottom'
                  },
                  {
                    element: document.querySelectorAll('.primary-nav li')[5],
                    intro: "The Contact Us menu is the most direct way to address any issues you may encounter while using all APIs.",
                    position: 'bottom'
                  },
                  {
                    element: document.querySelectorAll('.master-stepper')[0],
                    intro: "These are the steps you will need to follow to create a new App.",
                    position: 'auto'
                  },
                  {
                    element: document.querySelectorAll('#block-views-smartdocs-models-category-block')[0],
                    intro: "These are the list of platforms available.",
                    position: 'auto'
                  },
                  {
                    element: document.querySelectorAll('#block-views-blog-home-block')[0],
                    intro: "In this area you will find the latest entries added to our Blog.",
                    position: 'auto'
                  },
                ]).start().oncomplete(function() {
                  $('#backtotop').trigger('click');
                });
            }
            if (pathName == '/user/me/apps'){
              if ($('#my-apps-accordion').length) {
                $('#my-apps-accordion .panel:first-child').find('a.panel-link').trigger('click');
      
                introJs().setOptions({'showStepNumbers': false, 'doneLabel': 'Exit', 'overlayOpacity' : '0.2', 'scrollToElement': true}).addSteps([
                  {
                    element: document.querySelectorAll('.add-app-button .add-app')[0],
                    intro: "Click on the Add a new App button to generate a set of Keys.",
                    position: 'auto'
                  },
                  {
                    element: document.querySelectorAll('#my-apps-accordion .panel')[0],
                    intro: "You will find all of your previously created Apps in this area.",
                    position: 'auto'
                  },
                  {
                    element: document.querySelectorAll('.keys-panel')[0],
                    intro: "Inside each App you can find its keys...",
                    position: 'auto'
                  },
                  {
                    element: document.querySelectorAll('.my-apps-panels ul.nav li')[1],
                    intro: "... the Products it includes...",
                    position: 'auto'
                  },
                  {
                    element: document.querySelectorAll('.my-apps-panels ul.nav li')[2],
                    intro: "... and other details of the App.",
                    position: 'auto'
                  },
                  {
                    element: document.querySelectorAll('.my-apps-panels ul.nav li')[3],
                    intro: "You can also access the analytics of usage of this app.",
                    position: 'auto'
                  },
                  {
                    element: document.querySelectorAll('.my-apps-panels ul.nav li')[4],
                    intro: "In the Edit option you can chage the name, callback URL and products used for this App.",
                    position: 'auto'
                  },
                  {
                    element: document.querySelectorAll('.my-apps-panels ul.nav li.apigee-modal-link-delete')[0],
                    intro: "You can also delete your App if you're not using it anymore.",
                    position: 'auto'
                  },
                ]).start().oncomplete(function() {
                  $('#my-apps-accordion .panel:first-child').find('a.panel-link').trigger('click');
                  $('#backtotop').trigger('click');
                });  
              } else {
                introJs().setOptions({'showStepNumbers': false, 'doneLabel': 'Exit', 'overlayOpacity' : '0.2', 'scrollToElement': true}).addSteps([
                  {
                    element: document.querySelectorAll('.add-app-button .add-app')[0],
                    intro: "Click on the Add a new App button to generate a set of Keys.",
                    position: 'auto'
                  }
                ]).start();
              }
            }
      
            if(RegExp('add').test(window.location.pathname)) {
              introJs().setOptions({'showStepNumbers': false, 'doneLabel': 'Exit', 'overlayOpacity' : '0.2', 'scrollToElement': true}).addSteps([
                {
                  element: document.querySelectorAll('.form-item-human')[0],
                  intro: "Fill out the App Name field",
                  position: 'top'
                },
                {
                  element: document.querySelectorAll('.form-item-callback-url')[0],
                  intro: "Add your callback URL",
                  position: 'top'
                },
                {
                  intro: "Next you need to select the Product to which the API you want to use belongs. You can do this using two methods....",
                },
                {
                  element: document.querySelectorAll('#block-views-methods-list-block-1')[0],
                  intro: "You can browse the APIs listed on the sidebar and use the <strong>Select</strong> button...",
                  position: 'left'
                },
                {
                  element: document.querySelectorAll('#added-products')[0],
                  intro: "...and the product will appear in the <strong>Added products</strong> area.",
                  position: 'left'
                },
                {
                  element: document.querySelectorAll('.form-item-product-search')[0],
                  intro: "You can also search the product directly by API name in this field.",
                  position: 'top'
                },
                {
                  intro: 'Once the Product is selected...',
                },
                {
                  intro: '... all you need is to click on the <strong>Create App</strong> button.',
                }
              ]).start().oncomplete(function() {
                $('#backtotop').trigger('click');
              }); 
            }
      
            if(pathName == '/apis'){
              introJs().setOptions({'showStepNumbers': false, 'doneLabel': 'Exit', 'overlayOpacity' : '0.2', 'scrollToElement': true}).addSteps([
                {
                  element: document.querySelectorAll('#views-exposed-form-smartdocs-models-page')[0],
                  intro: "Select from the list the Platform you need.",
                  position: 'right'
                },
                {
                  element: document.querySelectorAll('.api-logical-platforms')[0],
                  intro: "Read the documentation of all methods contained in the platform you need."
                }
              ]).start().oncomplete(function() {
                $('#backtotop').trigger('click');
              }); 
            }
      
            if (RegExp('list').test(window.location.pathname)){
              $('.view-methods-list .panel-group:first-child').find('a.panel-smartdocs').trigger('click');
              introJs().setOptions({'showStepNumbers': false, 'doneLabel': 'Exit', 'overlayOpacity' : '0.2', 'scrollToElement': true}).addSteps([
                {
                  element: document.querySelectorAll('.view-methods-list')[0],
                  intro: "Select an API and read the documentation of the methods it includes.",
                  position: 'auto'
                },
                {
                  element: document.querySelectorAll('.method_details')[1],
                  intro: "Each method has its own documentation and request test that allows you to view the response.",
                  position: 'auto'
                },
                {
                  element:document.querySelectorAll('.btn-product')[0],
                  intro: "You can also use the Add Product as a shortcut to create an App using this API.",
                  position: 'auto'
                }
              ]).start().oncomplete(function() {
                $('#backtotop').trigger('click');
              });  
            }
      
            if(pathName == '/resources'){
              introJs().setOptions({'showStepNumbers': false, 'doneLabel': 'Exit', 'overlayOpacity' : '0.2', 'scrollToElement': true}).addSteps([
                {
                  intro: "This section provides a space to share information establishing a collaborative community among those who use this Dev Portal site.",
                },
                {
                  element: document.querySelectorAll('#views-exposed-form-resources-page')[0],
                  intro: "Use the filters to choose category, language and/or file type.",
                  position: 'right'
                },
                {
                  element: document.querySelectorAll('.api-logical-platforms')[0],
                  intro: "Here you will find the available resources. Click on the title to see the content.",
                  position:'top'
                }
              ]).start().oncomplete(function() {
                $('#backtotop').trigger('click');
              });  
            }
      
            if (RegExp('content').test(window.location.pathname)){ 
              introJs().setOptions({'showStepNumbers': false, 'doneLabel': 'Exit', 'overlayOpacity' : '0.2', 'scrollToElement': true}).addSteps([
                {
                  element: document.querySelectorAll('#block-views-resources-resource-detail')[0],
                  intro: "In this block you will find general information of the resource.",
                  position: 'left'
                },
                {
                  element: document.querySelectorAll('.views-field-field-rating')[0],
                  intro: "Rate a resource by using the stars rating option. Rate goes from 1 star being the lowest, to 5 stars as the highest.",
                  position: 'left'
                },
                {
                  element: document.querySelectorAll('.download-button')[0],
                  intro: "Click on this button to download a resource.",
                  position: 'left'
                },
                {
                  element: document.querySelectorAll('#block-views-resources-related-resources')[0],
                  intro: "In this block you will find resources related to the current document.",
                  position: 'left'
                },
                {
                  element: document.querySelectorAll('#comment-form')[0],
                  intro: "Use this section to add a comment."
                }
              ]).start().oncomplete(function() {
                $('#backtotop').trigger('click');
              });  
            }
      
            if(pathName == '/blog'){
              introJs().setOptions({'showStepNumbers': false, 'doneLabel': 'Exit', 'overlayOpacity' : '0.2', 'scrollToElement': true}).addSteps([
                {
                  intro: "In this section users are able to share information with others. Entries are displayed in the reverse chronological order with the latest entries shown first.",
                },
                {
                  element: document.querySelectorAll('#views-exposed-form-devconnect-blog-page')[0],
                  intro: "Select from the list the Category you are looking for.",
                  position: 'right'
                },
                {
                  //element: document.querySelectorAll('.api-logical-platforms')[0],
                  intro: "Choose the blog entry you want to read and click on the title or the Read more tag."
                }
              ]).start().oncomplete(function() {
                $('#backtotop').trigger('click');
              });   
            } else if(RegExp('blog/*').test(window.location.pathname)) {
              introJs().setOptions({'showStepNumbers': false, 'doneLabel': 'Exit', 'overlayOpacity' : '0.2', 'scrollToElement': true}).addSteps([
                {
                  element: document.querySelectorAll('#block-views-blog-home-block-1')[0],
                  intro: "In this block you will find the 5 latest entries",
                  position: 'left'
                },
                {
                  element: document.querySelectorAll('#block-views-blog-home-block-2')[0],
                  intro: "In this block you will find entries related to the current entry",
                  position: 'left'
                }
              ]).start().oncomplete(function() {
                $('#backtotop').trigger('click');
              });
            }
      
            if(pathName == '/faq-page'){
              introJs().setOptions({'showStepNumbers': false, 'doneLabel': 'Exit', 'overlayOpacity' : '0.2', 'scrollToElement': true}).addSteps([
                {
                  intro: "This section contains a list of common questions and general information.",
                  position: 'top'
                },
                {
                  element: document.querySelectorAll('.contact-form')[0],
                  intro: "Use the contact block to report issues and address specific questions to P&G.",
                  position: 'left'
                },
                {
                  element: document.querySelectorAll('.panel-default')[0],
                  intro: "Select a question from the list, and the page will scroll down to the answer.",
                  position: 'right'
                }
              ]).start().oncomplete(function() {
                $('#backtotop').trigger('click');
              });  
            }
      
          });

    });
})(jQuery);