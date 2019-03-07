	<style type="text/css">

    #printable { display: block; }

    @media print
    {
    	#non-printable { display: none; }
    	#printable { display: block; }
    }
</style>
<script>
    function autoResize(id){
        var newheight;
        var newwidth;

        if(document.getElementById){
            newheight=document.getElementById(id).contentWindow.document .body.scrollHeight;
            newwidth=document.getElementById(id).contentWindow.document .body.scrollWidth;
        }

        document.getElementById(id).height= (newheight) + "px";
        document.getElementById(id).width= (newwidth) + "px";
    }
</script>
	
	<!-- CONTENT 
	============================================= -->

	<?php $cid= $this->uri->segment(3);?>
    <?php $invoiceno= $this->uri->segment(4);?>
	
	 <div class="content shortcodes">
		<div class="layout">
			
					<IFRAME SRC="<?php echo base_url(); ?>apanel/printinvoice/<?php echo $cid; ?>/<?php echo $invoiceno; ?>" width="100%" height="200px" id="iframe1" style="border: 0px;" onLoad="autoResize('iframe1');"></iframe>
				
		</div>
	</div> 
	<!-- END CONTENT 
	============================================= -->
