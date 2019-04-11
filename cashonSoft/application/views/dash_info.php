
<div class="modal fade" id="myModal2" role="dialog">
           <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body dash-info">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                    data-dismiss="modal">Close</button>
            </div>
        </div>
        
    </div>
</div>
<!--<script>-->
<!--$('.trigger-modal').on('click',function(){-->
    
<!--    var title = $(this).find(".category").text();-->
    
<!--      $.post('<?php //echo site_url("dashboard/getCountDetails"); ?>',{-->
<!--        title : title-->
<!--      },function(data){-->
<!--        $('.dash-info').load('content.html',function(){-->
<!--            response = jQuery.parseJSON(data);-->
<!--            table = `<div><table class='table table-responsive table-bordered'>`;-->
<!--            if( response.status_code == "200"&&response.result!=null&&response.result.length > 0 ){-->
<!--                table += `<caption class='thead-dark' style='caption-side: top;'>${title}</caption>`;-->
<!--                keys = Object.keys(response.result[0]);-->
<!--                table += `<thead class='thead-dark'><tr>`;-->
<!--                $.each(keys,function(index,key){-->
<!--                    table += `<th>${key}</th>`;-->
<!--                });-->
<!--                table += `</tr></thead><tbody>`;-->
<!--                $.each(response.result,function(index,value){-->
<!--                    table += `<tr>`;-->
<!--                    $.each(keys,function(index,key){-->
<!--                        table += `<td>${value[key]}</td>`;-->
<!--                    });-->
<!--                    table += `</tr>`;-->
<!--                });-->
<!--                table += `</tbody>`;-->
<!--            }else{-->
<!--                table += `<tr>Records Not Found</tr>`;-->
<!--            }-->
<!--            table += `</table></div>`;-->
<!--            $(this).html(table);-->
<!--            $('#myModal2').modal({show:true});-->
<!--        });-->
<!--      });-->
    
<!--});-->
<!--</script>-->