// In your Javascript (external .js resource or <script> tag)

//tanpa modal (popup) sebagai alasnya
$(document).ready(function() {
  $('#select_2').select2({
      closeOnSelect: false,
      placeholder: 'Insert Product Name Here',
        ajax: {
              dataType: 'json',
              url: '/search/stock_id',
              delay: 300,
              data: function(params) {
                return {
                  q: params.term,
                  page : params.page
                };
              },
              processResults: function (data, params) {
                params.page = params.page || 1;

                return{
                  results : data.data,
                  pagination:{
                    more:(params.page * 10) < data.total
                  }
              }; 
            }
        },
        minimumInputLength : 3,
        templateResult : function (repo){
          if(repo.loading) return repo.name;

          var markup = "[ID:"+repo.id+"] &nbsp; "+ repo.name;

          return markup;
        },
        templateSelection : function(repo){
          return repo.name;
        },
        
        escapeMarkup : function(markup){ return markup;}
	});
});
