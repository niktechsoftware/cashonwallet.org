<section class="section-b-space">
    <div class="container">
        <div class="row">
            <?php $this->load->view("dashboardmenu");?>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="card">
                        <div class="card-content">
                            <h4 class="leftdownline">My Position</h4>
                            <table class=" table table-hover ">
                                <tr>
                                    <td class="table-primary table-bordered "> Level </td>
                                    <td class="table-bordered" >  <?php if (!$data->position)
                                    {
                                               echo "position not selected yet";
                                    }else{
                                        echo $data->position;
                                    }
                                    ?> 
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->