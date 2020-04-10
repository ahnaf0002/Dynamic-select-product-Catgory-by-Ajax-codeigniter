<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section class="content">
    <form action="<?php echo base_url(); ?>admin/product/addProductForm" method="post">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="">Dynamic select box by Ajax & Codeigniter
                </h3>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6">

                <div class="form-group">
                    <label for="formGroupExampleInput2">Product Category</label>
                    <select class="custom-select form-control" id="product_category" name="product_category">
                        <option selected>Choose...</option>
                        <?php
                        foreach ($tbl_product_categories as $catdata) {
                        ?>
                            <option value="<?php echo $catdata->product_category_id; ?>"><?php echo $catdata->product_category; ?></option>
                        <?php } ?>

                    </select>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2">Product Subategory</label>
                    <select class="custom-select form-control" id="product_subcategory" name="product_subcategory">
                        <option selected>choose...</option>

                    </select>

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-success float-right">
                        </div>
                    </div>

                </div>

    </form>

</section>

<script type="text/javascript">
    $(document).ready(function() {
        $('#product_category').on('change', function() {

            var product_category_id = $(this).val();
            if (product_category_id == '') {
                $('#product_subcategory').prop('disabled', true);
            } else {
                $('#product_subcategory').prop('disabled', false);
                $.ajax({

                    url: '<?php echo base_url() ?>admin/product/getAllSubCategory',
                    type: 'POST',
                    data: {
                        product_category_id: product_category_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#product_subcategory').html(data);
                    },
                    error: function() {
                        alert('error...');
                    }

                })

            }

        });

    });
</script>