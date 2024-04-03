$(function() {
    $('select[name=category]').change(function() {
    //alert('this is demo');
    var url = '/category/' + $(this).val() + '/subcategory/';
    
    //var url = '{{ url('category') }}' + $(this).val() + '/subcategory/';
    
    $.get(url, function(data) {
        console.log("vinay"
        );
    var select = $('form select[name= subcategory]');
    
    select.empty();
    
    $.each(data,function(key, value) {
    select.append('<option value=' + value.id + '>' + value.subc_name + '</option>');
    });
    });
    });
    });
    