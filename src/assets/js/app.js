import $ from 'jquery';
import whatInput from 'what-input';
import AOS from 'aos';

import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';

$(document).foundation();

AOS.init();

$(document).ready(function () {
    //Function to handle auto scrolling to .service-panel
    $("#scroll-button, #scroll-text").click(function (){

        $('html, body').animate({
            scrollTop: $("#scroll-button").offset().top
        }, 1000);

        $("#scroll-button").get()[0].scrollIntoView(true);
    });

    //Function to handle product filter
    $(".ajax-filter-select").change(function () {

        var ajaxurl = "/../wp-admin/admin-ajax.php";

        let form_data = $("#ajax-filter-form").serializeArray();

       //Deselects all options if 'any' is selected.
       if(form_data[0].value === ""){ //'Any' is always first object in array.
           $(this).find("option").prop("selected", false);
       }

       let data = {};
       let temp_name = null;

       for(let i = 0; i < form_data.length; i++){
           let name = form_data[i].name;
           if(temp_name === name){
               data[name].push(form_data[i].value);
           } else {
               temp_name = name;
               data[name] = [form_data[i].value]
           }
       }

       data.action = 'product_filter';

       $.ajax({
           url: ajaxurl,
           type: 'POST',
           dataType: 'json',
           data: data,
           cache: false,
           timeout: 30000,
           async: true,
           headers: {
               "cache-control": "no-cache"
           },
           beforeSend: function(){
               console.log(data);
               $("#active-filters").text("Processing...");
           } ,
           success: function(products){

               let filters = "";

               for(let i = 0; i < form_data.length; i++){
                   if(isNaN(form_data[i].value)) {
                       filters += form_data[i].value + ", ";
                   }
               }

               $("#products-container").load(" #products-container", products);

               if(filters !== ""){
                   filters = filters.slice(0, -2);
                   $("#active-filters").text("Showing up to " + products.query.posts_per_page + "  results for: " + filters);
               } else {
                   let posts_per_page = '';

                   if(products.query.posts_per_page === '1000'){
                       $("#active-filters").text("Showing all results");
                   } else{
                       posts_per_page = products.query.posts_per_page;
                       $("#active-filters").text("Showing up to " + posts_per_page + " results");
                   }
               }
           }
       });

    });

    $(".collection-link").click(function(){
        console.log($(this).attr('data-brand'));
    });
});