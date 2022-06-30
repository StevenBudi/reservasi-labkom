<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>

<center>
    <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel" data-mdb-interval="5000" style="width: 70%;">
        <!-- Inner -->
        <div class="carousel-inner">
            <!-- Single item -->
            <div class="carousel-item active">
                <img src="/images/lab1.jpg" class="d-block w-100" alt="Sunset Over the City" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Software Engineering Labs</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item">
                <img src="/images/lab2.jpg" class="d-block w-100" alt="Canyon at Nigh" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Computer Network and Instrumentation Labs</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item">
                <img src="/images/lab3.jpg" class="d-block w-100" alt="Cliff Above a Stormy Sea" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Multimedia Studio</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
        </div>
        <!-- Inner -->

    </div>
</center>
<div id="labkom-data"></div>
<script>
    $('#reser-button').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url('/reservation') ?>",
            // dataType : "json",
            success: function(response) {
                $('#reser-data').html(response.data).show();
                $('#reservation-modal').modal('show');
            }
        })
    })
</script>
<?= $this->endSection() ?>