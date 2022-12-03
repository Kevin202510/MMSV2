$(document).ready(function(){
    $.ajax({
        url: 'api/mushroomvar',
        type: 'GET',
        dataType: 'json',
        success: function (data){
            var img = "{{ asset('landingpageassets/img/icon-1.png') }}";
            $.each(data,function(index,itemData){
                $("#mushroomvar").append('<div class="col-xl-3 col-lg-4 col-md-8 wow fadeInUp" data-wow-delay="0.7s">'+
                                            '<div class="product-item">'+
                                                '<div class="position-relative bg-light overflow-hidden">'+
                                                    '<img class="img-fluid" style="width:100%; height:200px;" src="landingpageassets/img/'+itemData.mushroom_image+'" alt="">'+
                                                    '<div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3"><span class="fw-bold m-0">MMS</span></div>'+
                                                '</div>'+
                                                '<div class="text-center p-4"  id="vari">'+
                                                    '<a class="d-block h5 mb-2" href="">'+itemData.configuration_name+'</a>'+
                                                    '<span class="text-primary me-1">'+itemData.description+'</span>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>');
            });
        }
    });
}); 